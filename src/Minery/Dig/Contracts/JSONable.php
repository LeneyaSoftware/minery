<?php
/**
 * Interface iJSONABLE
 *
 * Enter Interface Description Here
 *
 * @author Joshua Walker
 * @version 6/1/15
 */


namespace Minery\Dig\Contracts;

interface JSONable{

    /**
     * Converts this to a JSON representation.
     * @return mixed
     */
    public function toJSON();

    /**
     * Convert a JSON object to a PHP representation.
     * @return mixed
     */
    public function fromJSON();
} 