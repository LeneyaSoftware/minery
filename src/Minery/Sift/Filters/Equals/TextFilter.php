<?php
/**
 * Class TextFilter
 *
 * Enter Class Description Here
 *
 * @author Joshua Walker
 * @version 6/1/15
 */



namespace Minery\Sift\Filters\Equals;


use Minery\Sift\Filters\Filter;

class TextFilter extends Filter{

    protected $field;
    protected $value;

    public function generate($negate = false){
        if($negate)
            return "{$this->field} NOT LIKE {$this->value}";

        return "{$this->field} LIKE {$this->value}";
    }

} 