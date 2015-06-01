<?php
/**
 * Class EndsWithFilter
 *
 * Enter Class Description Here
 *
 * @author Joshua Walker
 * @version 6/1/15
 */



namespace Minery\Sift\Filters\Fuzzy;


use Minery\Sift\Contracts\iFilter;

class EndsWithFilter extends Filter{
    public function generate($negate = false){
        if($negate)
            return " {$this->field} NOT LIKE '%{$this->value}' ";

        return " {$this->field} LIKE '%{$this->value}' ";
    }
} 