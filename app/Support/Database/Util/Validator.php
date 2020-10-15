<?php

namespace App\Support\Database\Util;

use Arr, Str;
use App\Support\Database\Model;

class Validator {
    
    protected $nullesce = [
        'validatePrimary',
        'validateJson',
        'validateDefault',
        'validateUnique',
        'validateRequired'
    ];
    
    protected $blank = "";

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    public function make(array $data, ?array $schema=[], Model $model){
        $result = true;
        foreach($data as $key => $val){
            $rules = $schema[$key]?:[];
            foreach($rules as $rule){
                $handle = str(trim($rule))->split('/:/');
                if($handle->count() <= 2){
                    $bash = trim(str($handle->first())->studly()->start('validate'));
                    $args = json_decode("[{$handle->last()}]");
                    if(is_null($data[$key]) && in_array('nullable', $rules)){
                        $bash = NULL;
                    } else {
                        $bash = method_exists($this, $bash) ? $this->{$bash}($key, $data[$key], $args, $model): $this->blank;
                    }
                    $bash !== $this->blank ? $data[$key] = $bash: false;
                    $result = $result && $bash !== $this->blank;
                }
            }
            if(is_array($data[$key]) || is_object($data[$key])){
                $data[$key] = json_encode($data[$key]);
            }
        }
        return $result === true ? $data : false;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateDefault($attr, $val, $args){
        return $val ?: ($args[0] ?? null);
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validatePrimary($attr, $val, $args, $model){
        $last = Arr::last($model->all());
        $last = $last[$attr] ?? 0;
        return $val && is_int($val) ? $val : ($last + 1);
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateNullable($attr, $val){
        return !$val && !is_bool($val) && !is_int($val) ? null: $val;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateRequired($attr, $val){
        return (!is_null($val) && !empty($val)) ? $val: $this->blank;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateString($attr, $val){
        return (is_string($val) && strlen($val) <= 2**20) ? $val: $this->blank;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateText($attr, $val){
        return (is_string($val) && strlen($val) <= 2**30) ? $val: $this->blank;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateLongText($attr, $val){
        return is_string($val) ? $val: $this->blank;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateEmail($attr, $val){
        return is_string($val) ? $val: $this->blank;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateUuid($attr, $val){
        return Str::isUuid($val) ? $val: $this->blank;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateMin($attr, $val, $args){
        return (is_numeric($val) && $val > $args[0])||(is_string($val) && strlen($val) >= $args[0]) || (is_array($val) && count($val) >= $args[0]) ? $val: $this->blank;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateMax($attr, $val, $args){
        return (is_string($val) && strlen($val) <= $args[0]) || (is_array($val) && count($val) <= $args[0]) ? $val: $this->blank;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateDate($attr, $val){

    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateTimestamp($attr, $val){
        return is_numeric($val)? $val: $this->blank;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateBoolean($attr, $val){
        return is_bool($val) || (is_int($val) && $val <= 1 && $val >= 0) ? ($val ? 1: 0): false;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateFloat($attr, $val){
        return is_float($val) ? $val: $this->blank;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateInteger($attr, $val){
        return is_int($val) ? $val: $this->blank;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateNumber($attr, $val){
        return is_numeric($val) ? $val: $this->blank;
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateUnique($attr, $val){

    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    protected function validateArray($attr, $val){
        return is_array($val) ? $val: $this->blank;
    }

    /**
     * Checks to see if JSON is valid.
     *
     * @return string(JSON)
     */
    protected function validateJson($attr, $val){
        return rescue(function() use ($val){
            return json_decode($val);
        }, null, false) ?: $this->blank;
    }

    /**
     * Casts data into desired type.
     *
     * @return
     */
    protected function validateCast($attr, $val, $args){
        switch($args[0]){
            case 'array':
                return toArray($val, true);
            break;
            case 'object':
                return (object) toArray($val, true);
            break;
            case 'string':
                return $val;
            break;
            case 'number':
                return intval($val);
            break;
            case 'float':
                return floatval($val);
            break;
        }
        return $this->blank;
    }

    protected function validateSize($attr, $val, $args){
        return (is_string($val) && strlen($val) == $args[0]) || count($str) == $args[0] ? $val: $this->blank;
    }
}