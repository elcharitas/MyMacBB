<?php

namespace App\Support;

use \Arr, \Str;
use App\BoardData;
use Illuminate\Support\{Collection, Enumerable};

class Model extends Collection {
    
    protected $table;
    
    protected $query;
    
    protected $callable = [];
    
    protected $relationship = [];
    
    protected $key;
    
    public $name;
    
    public function __construct($table, ?BoardData $query=null, $records=null){
        if($table && is_string($table)){
            $this->name = $table;
        }
        $data = [];
        if($query && $query instanceof BoardData){
            $this->query = $query;
            $this->table = $query->table;
            $this->schema = collect($query->schema);
            $data = toArray($records ? collect($query->data)->only($records): $query->data);
            $this->relate($query->relationship);
            $this->callable = array_merge($this->callable, $query->callable ?: []);
        }
        parent::__construct(!is_array($table) ? $data : $table);
    }

    public function __get($key){
        $prop = trim(str($key)->studly()->start('get')->finish('Attribute'));
        return $this->__call($key) ?: $this->get($key) ?: (method_exists($this, $prop) ? $this->{$prop}(): null);
    }
    
    public function __call($key, $args=[]){
        $relationship = $this->relationship[$key] ?? NULL;
        $handle = $this->callable[$key] ?? NULL;
        return $relationship ? $relationship($this): ($handle ? $handle($args): $handle);
    }
    
    public function __isset($key){
        return true;
    }
    
    public function getCreatedAttribute(){
        return $this->key;
    }
    
    public function define($key, $val, $path=null){
        return $this->callable[$key] = (function($arg) use ($key, $val, $path){
            $twig = bb_env();
            $args = json_encode($arg);
            $id = $key.'.'.str()->random(3);
            $load = bb("objects.Mac");
            $path ? $load->branch(): $load->burst();
            $tpl = $twig->createTemplate(sprintf('{%% from "%s" import %s %%}{{ %s(self, %s) }}', $val, $key, $key, gtrim($args, '\[\]')), $id)->display(['self' => $this]);
            return $load->burst() ? $tpl: null;
        }) && true;
    }
    
    public function find($id, $col=null){
        if(!$col){
            $col = $this->schema->reject(function($item){
                return !in_array('primary', $item);
            })->keys()->first() ?: 'id';
        }
        return $this->where($col, $id)->first();
    }
    
    public function first(?callable $callback=null, $default=null){
        $data = parent::first();
        if($data && is_array($data)){
            $this->key = $this->keys()->first();
            $this->items = $data;
            return $this;
        }
        return $data;
    }

    public function last(?callable $callback=null, $default=null){
        $data = parent::last();
        if($data && is_array($data)){
            $this->key = $this->keys()->last();
            $this->items = $data;
            return $this;
        }
        return $data;
    }
    
    public function get($loc = 0, $default = null){
        if($this->count() > 1 && $loc === 0){
            return $this->collect();
        }
        $val = parent::get($loc);
        if(!$this->key && is_array($val)){
            $this->key = $loc;
            $this->items = $val;
            return $this;
        } else {
            $val = rescue(function() use ($val){
                return json_decode($val, true);
            }) ?: $val;
        }
        return $val ?: $default ?: false;
    }
    
    public function create(array $records){
        return $this->put(0, $records);
    }
    
    public function insert(array $records){
        return $this->count() < ($this->put(0, $records)?:$this)->count();
    }
    
    public function update(array $records){
        $records = array_merge(['*updated' => microtime(true)], $records);
        if($this->key){
            $data = array_merge($this->items, $records);
            $this->items = [$this->key => $data];
            return $this->save($this) ? ($this->items = $data) && true: false;
        }
        foreach($this->all() as $col => $value){
            $value = array_merge(collect($value)->toArray(), $records);
            $this->items[$col] = $value;
        }
        return $this->save($this);
    }
    
    public function put($loc, $data=[]){
        if(($this->key && $loc != $this->key) || (!is_array($data) && !is_null($data))){
            return false;
        } else if(is_null($data)){
            return $this->save(parent::put($loc, $data));
        }
        $loc = $loc == 0 ? microtime(true)+($this->count()/1000): $loc;
        $data = arr_only($data, $this->schema->keys());
        $valid = $this->validate($data, $this->schema->toArray());
        return $valid ? $this->save(parent::put("$loc", $valid)): false;
    }
    
    public function clear(int $start = 1, int $end = 0){
        $keys = $this->keys();
        $res = true;
        $end = $end > 0 ? $end: $this->count();
        foreach($keys as $i){
            if($start <= $end){
                $res = ($cur = $this->get($i)) && is_null($cur) || $cur ? $res && $this->put($i, null): true;
                $start++;
            }
        }
        return $res;
    }
    
    public function delete(?int $loc=null){
        if($this->name && !$loc){
            $this->query->delete();
        } else {
            return $this->clear();
            if(!$this->name && $loc = true){
                for($i = $this->keys()->first(); $i <= $this->keys()->last(); $i++){
                    $loc = $this->get($i) ? $loc && $this->put($i, null): true;
                }
                return $loc;
                
                return $loc ? $this->save($this): false;
            }
            return $this->save($this->forget($loc));
        }
    }
    
    public function collect(){
        $data = [];
        foreach($this->all() as $key => $val){
            $handle = (new static($val, $this->query));
            $handle->key = $key;
            $data[$key] = $handle;
        }
        return !$this->key ? new static($data, $this->query): null;
    }
    
    public function except($keys)
    {
        if ($keys instanceof Enumerable) {
            $keys = $keys->all();
        } elseif (! is_array($keys)) {
            $keys = func_get_args();
        }

        return new static(Arr::except($this->items, $keys), $this->query);
    }

    public function filter(callable $callback = null)
    {
        if ($callback) {
            return new static(Arr::where($this->items, $callback), $this->query);
        }

        return new static(array_filter($this->items), $this->query);
    }
    
    public function only($keys=null)
    {
        if (is_null($keys)) {
            return new static($this->items, $this->query);
        }

        if ($keys instanceof Enumerable) {
            $keys = $keys->all();
        }

        $keys = is_array($keys) ? $keys : func_get_args();

        return new static(arr_only($this->items, $keys), $this->query);
    }

    /**
     * Get the values of a given key.
     *
     * @param  string|array  $value
     * @param  string|null  $key
     * @return static
     */
    public function pluck($value, $key = null)
    {
        return new static(Arr::pluck($this->items, $value, $key), $this->query);
    }

    /**
     * Run a map over each of the items.
     *
     * @param  callable  $callback
     * @return static
     */
    public function map(callable $callback)
    {
        $keys = array_keys($this->items);

        $items = array_map($callback, $this->items, $keys);

        return new static(array_combine($keys, $items), $this->query);
    }

    /**
     * Get the keys of the collection items.
     *
     * @return static
     */
    public function keys()
    {
        return new static(array_keys($this->items), $this->query);
    }

    /**
     * Merge the collection with the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function merge($items)
    {
        return new static(array_merge($this->items, $this->getArrayableItems($items)), $this->query);
    }

    /**
     * Recursively merge the collection with the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function mergeRecursive($items)
    {
        return new static(array_merge_recursive($this->items, $this->getArrayableItems($items)), $this->query);
    }

    /**
     * Create a collection by using this collection for keys and another for its values.
     *
     * @param  mixed  $values
     * @return static
     */
    public function combine($values)
    {
        return new static(array_combine($this->all(), $this->getArrayableItems($values)), $this->query);
    }

    /**
     * Union the collection with the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function union($items)
    {
        return new static($this->items + $this->getArrayableItems($items), $this->query);
    }

    /**
     * Create a new collection consisting of every n-th element.
     *
     * @param  int  $step
     * @param  int  $offset
     * @return static
     */
    public function nth($step, $offset = 0)
    {
        $new = [];

        $position = 0;

        foreach ($this->items as $item) {
            if ($position % $step === $offset) {
                $new[] = $item;
            }

            $position++;
        }

        return new static($new, $this->query);
    }

    /**
     * Get one or a specified number of items randomly from the collection.
     *
     * @param  int|null  $number
     * @return static|mixed
     *
     * @throws \InvalidArgumentException
     */
    public function random($number = null)
    {
        if (is_null($number)) {
            return Arr::random($this->items);
        }

        return new static(Arr::random($this->items, $number), $this->query);
    }

    /**
     * Reverse items order.
     *
     * @return static
     */
    public function reverse()
    {
        return new static(array_reverse($this->items, true), $this->query);
    }

    /**
     * Shuffle the items in the collection.
     *
     * @param  int|null  $seed
     * @return static
     */
    public function shuffle($seed = null)
    {
        return new static(Arr::shuffle($this->items, $seed), $this->query);
    }

    /**
     * Slice the underlying collection array.
     *
     * @param  int  $offset
     * @param  int|null  $length
     * @return static
     */
    public function slice($offset, $length = null)
    {
        return new static(array_slice($this->items, $offset, $length, true), $this->query);
    }

    /**
     * Split a collection into a certain number of groups.
     *
     * @param  int  $numberOfGroups
     * @return static
     */
    public function split($numberOfGroups=2)
    {
        if ($this->isEmpty()) {
            return new static([], $this->query);
        }

        $groups = new static([], $this->query);

        $groupSize = floor($this->count() / $numberOfGroups);

        $remain = $this->count() % $numberOfGroups;

        $start = 0;

        for ($i = 0; $i < $numberOfGroups; $i++) {
            $size = $groupSize;

            if ($i < $remain) {
                $size++;
            }

            if ($size) {
                $groups->push(new static(array_slice($this->items, $start, $size)), $this->query);

                $start += $size;
            }
        }

        return $groups;
    }

    /**
     * Chunk the collection into chunks of the given size.
     *
     * @param  int  $size
     * @return static
     */
    public function chunk($size)
    {
        if ($size <= 0) {
            return new static([], $this->query);
        }

        $chunks = [];

        foreach (array_chunk($this->items, $size, true) as $chunk) {
            $chunks[] = new static($chunk, $this->query);
        }

        return new static($chunks, $this->query);
    }

    /**
     * Sort through each item with a callback.
     *
     * @param  callable|int|null  $callback
     * @return static
     */
    public function sort($callback = null)
    {
        $items = $this->items;

        $callback && is_callable($callback)
            ? uasort($items, $callback)
            : asort($items, $callback);

        return new static($items, $this->query);
    }

    /**
     * Sort items in descending order.
     *
     * @param  int  $options
     * @return static
     */
    public function sortDesc($options = SORT_REGULAR)
    {
        $items = $this->items;

        arsort($items, $options);

        return new static($items, $this->query);
    }

    /**
     * Sort the collection using the given callback.
     *
     * @param  callable|string  $callback
     * @param  int  $options
     * @param  bool  $descending
     * @return static
     */
    public function sortBy($callback, $options = SORT_REGULAR, $descending = false)
    {
        $results = [];

        $callback = $this->valueRetriever($callback);

        // First we will loop through the items and get the comparator from a callback
        // function which we were given. Then, we will sort the returned values and
        // and grab the corresponding values for the sorted keys from this array.
        foreach ($this->items as $key => $value) {
            $results[$key] = $callback($value, $key);
        }

        $descending ? arsort($results, $options)
            : asort($results, $options);

        // Once we have sorted all of the keys in the array, we will loop through them
        // and grab the corresponding model so we can set the underlying items list
        // to the sorted version. Then we'll just return the collection instance.
        foreach (array_keys($results) as $key) {
            $results[$key] = $this->items[$key];
        }

        return new static($results, $this->query);
    }

    /**
     * Sort the collection in descending order using the given callback.
     *
     * @param  callable|string  $callback
     * @param  int  $options
     * @return static
     */
    public function sortByDesc($callback, $options = SORT_REGULAR)
    {
        return $this->sortBy($callback, $options, true);
    }

    /**
     * Sort the collection keys.
     *
     * @param  int  $options
     * @param  bool  $descending
     * @return static
     */
    public function sortKeys($options = SORT_REGULAR, $descending = false)
    {
        $items = $this->items;

        $descending ? krsort($items, $options) : ksort($items, $options);

        return new static($items, $this->query);
    }

    /**
     * Sort the collection keys in descending order.
     *
     * @param  int  $options
     * @return static
     */
    public function sortKeysDesc($options = SORT_REGULAR)
    {
        return $this->sortKeys($options, true);
    }

    /**
     * Splice a portion of the underlying collection array.
     *
     * @param  int  $offset
     * @param  int|null  $length
     * @param  mixed  $replacement
     * @return static
     */
    public function splice($offset, $length = null, $replacement = [])
    {
        if (func_num_args() === 1) {
            return new static(array_splice($this->items, $offset));
        }

        return new static(array_splice($this->items, $offset, $length, $replacement), $this->query);
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    public function values()
    {
        return new static(array_values($this->items), $this->query);
    }

    public function __toString(){
        return 'BB.Database.'.trim(str($this->name?:' ')->studly()).'Model{}';
    }
    
    public function hasColumn($key){
        return $this->schema->has($key);
    }
    
    public function column($key, $val=null){
        return is_null($val) ? $this->schema->get($key): ( ($val ? $this->schema->put($key, $val): $this->schema->forget($key)) && $this->save($this)); 
    }

    protected function relate($arr){
        foreach($arr as $key => $val){
            $this->relationship[$key] = (function($data) use ($key, $val){
                list($table, $col, $foreign, $many) = arr_only(toArray($val), [0,1,2,3]);
                $db = bb_db()->select($table)->where($foreign?:$key, $data->get($col?:$key));
                return ($many ? $db: $db->first());
            });
        }
        return count($arr) > 0 ? true: false;
    }
    
    protected function save(Model $data){
        if(!$this->query){
            return false;
        }
        $raw = collect(toArray($this->query->data));
        $data = collect($data->all());
        $data->reject(function($val, $key) use ($raw){
            if(!is_null($val)){
                $raw->put($key, $val);
            } else {
                $raw->forget($key);
            }
            return is_null($val);
        });
        
        $this->query->data = json_encode($raw->toArray());
        $this->query->schema = $this->schema->toJson();
        unset($this->query->relationship);
        return  $this->query->save() ? $data : false;
    }

    protected function validate($data, $schema){
        $validator = new Validator;
        return $validator->make($data, $schema, $this);
    }
}