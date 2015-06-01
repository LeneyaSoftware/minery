<?php
/**
 * Class BeginsWithFilter
 *
 * Enter Class Description Here
 *
 * @author Joshua Walker
 * @version 6/1/15
 */



namespace Minery\Sift\Filters\Fuzzy;


class BeginsWithFilter extends Filter{


    public function generate($negate = false){
        if($negate)
            return " {$this->field} NOT LIKE '{$this->value}%' ";

        return " {$this->field} LIKE '{$this->value}%' ";
    }

} 