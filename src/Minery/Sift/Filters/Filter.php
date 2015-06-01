<?php
/**
 * Class Filter
 *
 * Enter Class Description Here
 *
 * @author Joshua Walker
 * @version 6/1/15
 */



namespace Minery\Sift\Filters;


abstract class Filter {

    protected $field;
    protected $value;

    public function __construct($field,$value){
        $this->field = $field;
        $this->value = $value;
    }

    public abstract function generate($negate=false);

    public function setField($field){
        $this->field = $field;
    }
} 