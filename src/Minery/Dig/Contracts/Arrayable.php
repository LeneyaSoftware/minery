<?php
/**
 * Interface Arrayable
 *
 * Enter Interface Description Here
 *
 * @author Joshua Walker
 * @version 6/1/15
 */


namespace Minery\Dig\Contracts;


interface Arrayable {

    /**
     * Converts a class into an array representation
     * @return mixed
     */
    public function toArray();

    /**
     * Converts an array into an object
     * @param $array
     * @return mixed
     */
    public function fromArray($array);
} 