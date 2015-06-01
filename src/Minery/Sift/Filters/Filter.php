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


use Minery\Dig\Contracts\Arrayable;
use Minery\Exception\ReportNotPersistableException;

abstract class Filter implements Arrayable{

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

    public function toArray(){
        return [
            'class'=>get_class($this),
            'field'=>$this->field,
            'value'=>$this->value
        ];
    }

    public function fromArray($array){
        if(!array_key_exists('field',$array) || !array_key_exists('value',$array) )
            throw new ReportNotPersistableException('The file you are attempting to load is not formatted correctly');
        $this->field = $array['field'];
        $this->value = $array['value'];
    }
} 