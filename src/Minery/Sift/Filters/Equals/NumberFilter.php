<?php
/**
 * Class NumberFilter
 *
 * Enter Class Description Here
 *
 * @author Joshua Walker
 * @version 6/1/15
 */



namespace Minery\Sift\Filters\Equals;
use Minery\Exception\InvalidTypeException;
use Minery\Sift\Filters\Filter;

class NumberFilter extends Filter{

    public function generate($negate = false){
        if(!is_numeric($this->value))
            throw new InvalidTypeException('Arguments passed into the NumberFilter must be numbers. Passed in: '.$this->value);

        if($negate)
            return "{$this->field} != {$this->value}";

        return "{$this->field} = {$this->value}";
    }
} 