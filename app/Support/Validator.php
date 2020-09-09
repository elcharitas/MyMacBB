<?php

namespace App\Support;

use \Arr, \Str;

class Validator {
    
    protected $nullesce = [
        'validatePrimary',
        'validateJson',
        'validateDefault',
        'validateUnique',
        'validateRequired'
    ];
    
    protected $blank = "";

    public function make(array $data, ?array $schema=[], Model $model){
        $result = true;
        foreach($data as $key => $val){
            $rules = $schema[$key]?:[];
            foreach($rules as $rule){
                $handle = str(trim($rule))->split('/:/');
                if($handle->count() <= 2){
                    $bash = trim(str($handle->first())->studly()->start('validate'));
                    $args = json_decode("[{$handle->last()}]");
                    $bash = method_exists($this, $bash) ? $this->{$bash}($key, $data[$key], $args, $model): $this->blank;
                    $bash !== $this->blank ? $data[$key] = $bash: false;
                    $result = $result && $bash !== $this->blank;
                    dump($result === true);
                }
            }
            if(is_array($data[$key]) || is_object($data[$key])){
                $data[$key] = json_encode($data[$key]);
            }
        }
        return $result === true ? $data : false;
    }

    protected function validateDefault($attr, $val, $args){
        return $val ?: ($args[0] ?? null);
    }

    protected function validatePrimary($attr, $val, $args, $model){
        $last = Arr::last($model->all());
        $last = $last[$attr] ?? 0;
        return $val && is_int($val) ? $val : ($last + 1);
    }

    protected function validateNullable($attr, $val){
        return !$val && !is_bool($val) && !is_int($val) ? null: $val;
    }

    protected function validateRequired($attr, $val){
        return (!is_null($val) && !empty($val)) ? $val: $this->blank;
    }

    protected function validateString($attr, $val){
        if(is_null($val)){
            return $val;
        }
        return (is_string($val) && strlen($val) <= 2**20) ? $val: $this->blank;
    }

    protected function validateText($attr, $val){
        return (is_string($val) && strlen($val) <= 2**30) ? $val: $this->blank;
    }

    protected function validateLongText($attr, $val){
        return is_string($val) ? $val: $this->blank;
    }

    protected function validateEmail($attr, $val){
        return is_string($val) ? $val: $this->blank;
    }

    protected function validateHashed($attr, $val){
        return is_string($val) ? $val: $this->blank;
    }

    protected function validateMin($attr, $val, $args){
        return (is_numeric($val) && $val > $args[0])||(is_string($val) && strlen($val) >= $args[0]) || (is_array($val) && count($val) >= $args[0]) ? $val: $this->blank;
    }

    protected function validateMax($attr, $val, $args){
        return (is_string($val) && strlen($val) <= $args[0]) || (is_array($val) && count($val) <= $args[0]) ? $val: $this->blank;
    }

    protected function validateDate($attr, $val){

    }

    protected function validateDateTime($attr, $val){

    }

    protected function validateBoolean($attr, $val){
        return is_bool($val) || (is_int($val) && $val <= 1 && $val >= 0) ? ($val ? 1: 0): false;
    }

    protected function validateFloat($attr, $val){
        return is_float($val) ? $val: $this->blank;
    }

    protected function validateInteger($attr, $val){
        return is_int($val) ? $val: $this->blank;
    }

    protected function validateNumber($attr, $val){
        return is_numeric($val) ? $val: $this->blank;
    }

    protected function validateUnique($attr, $val){

    }

    protected function validateArray($attr, $val){

    }

    protected function validateJson($attr, $val){

    }

    protected function validateCast($attr, $val, $args){
        return in_array($args[0], ['array', 'object', 'json']) ? $val : false;
    }

    protected function validateSize($attr, $val, $args){
        return (is_string($val) && strlen($val) == $args[0]) || count($str) == $args[0] ? $val: $this->blank;
    }
}