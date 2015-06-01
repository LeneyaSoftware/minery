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
     * Converts a class from an array into a class.
     * @return mixed
     */
    public function fromArray();
} 