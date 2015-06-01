<?php
/**
 * Class RangeFilter
 *
 * Enter Class Description Here
 *
 * @author Joshua Walker
 * @version 6/1/15
 */



namespace Minery\Sift\Filters\Range;


use Minery\Dig\Contracts\Arrayable;
use Minery\Exception\MalformedPersistenceFileException;
use Minery\Exception\ReportNotPersistableException;
use Minery\Sift\Contracts\iFilter;

class RangeFilter implements iFilter,Arrayable{

    public function __construct($field,$lower,$upper){
        $this->field = $field;
        $this->lower = $lower;
        $this->upper = $upper;
    }

    /**
     * Generates the filter
     * @param bool $negate - negate the filter.
     * @return mixed
     */
    public function generate($negate = false)
    {
        if($negate)
            return "{$this->field} <= {$this->lower} AND {$this->field} >= {$this->upper}";

        return "{$this->field} >= {$this->lower} AND {$this->field} <= {$this->upper}";
    }

    /**
     * Sets the field that this filter applies to in your database.
     * @param $field
     * @return mixed
     */
    public function setField($field)
    {
        $this->field = $field;
    }

    public function setUpper($upper){
        $this->upper = $upper;
    }

    public function setLower($lower){
        $this->lower = $lower;
    }

    public function toArray(){
        return [
            'class' => get_class($this),
            'field' => $this->field,
            'lower' => $this->lower,
            'upper' => $this->upper
        ];
    }

    public function fromArray($array){
        if(!array_key_exists('field',$array) || !array_key_exists('lower',$array) || !array_key_exists('upper',$array))
            throw new MalformedPersistenceFileException('The file you are trying to load does not fit into the
                acceptable file formats to load this report');

        $this->field = $array['field'];
        $this->lower = $array['lower'];
        $this->upper = $array['upper'];
    }
} 