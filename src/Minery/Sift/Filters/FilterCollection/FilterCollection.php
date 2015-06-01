<?php
/**
 * Class FilterCollection
 *
 * Enter Class Description Here
 *
 * @author Joshua Walker
 * @version 6/1/15
 */



namespace Minery\Sift\Filters\FilterCollection;


use Minery\Sift\Contracts\iFilter;

class FilterCollection {

    protected $filters;
    protected $filterString;

    public function __construct(){
        $this->filters = [];
    }

    /**
     * Adds a filter to the filter collection. Use the condition to add an (AND - OR) when generating the total
     * filter from the collection.
     *
     * @param $name -- The name of the filter.
     * @param iFilter $filter
     * @param null $condition
     *
     * @return array
     */
    public function addFilter($name,iFilter $filter,$condition=NULL){

        $this->filters[$name] = [
            'filter' => $filter,
            'condition'=>$condition
        ];

        return $this->filters;
    }

    /**
     * Removes a filter from the filter collection by it's name
     * @param $name
     */
    public function removeFilter($name){
        unset($this->filters[$name]);
    }

    /**
     * Generates the actual string for the filters in the collection.
     */
    public function generate(){

        //loop through filters and append to the filter string.
        foreach($this->filters as $filterParams){
            $condition = $filterParams['condition'];
            $filter = $filterParams['filter'];

            //make sure that the condition passed into the array is valid.
            if($this->validCondition($condition))
                $this->filterString .= $condition;

            $this->filterString .= $filter->generate();
        }

        return $this->filterString;
    }

    /**
     * Returns the current Filter string. Will be null until generate is called.
     * @return mixed
     */
    public function getFilterString(){
        return $this->filterString;
    }

    /**
     * Sets the filter string. Really only here to allow you to override the filter string that has been generated
     * if need be.
     *
     * @param $string
     */
    public function setFilterString($string){
        $this->filterString = $string;
    }

    /**
     * Checks to see if the condition passed in to add to the filter string is a proper condition.
     * @param $condition
     * @return bool
     */
    protected function validCondition($condition){
        $allowedConditions = ['AND','OR'];

        return in_array($condition,$allowedConditions);
    }
} 