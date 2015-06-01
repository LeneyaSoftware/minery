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


use Minery\Sift\Contracts\iFilter;

class RangeFilter implements iFilter{

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
} 