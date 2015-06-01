<?php
/**
 * Interface ResultSetContract
 *
 * Creates a contract that all valid result sets must implement.
 *
 * @author Joshua Walker
 * @version 5/27/15
 */


namespace Minery\Dig\Contracts;


interface iResultSet {

    /**
     * Creates a result set from an array.
     * @param array $reportResult
     * @return mixed
     */
    public function fromArray(array $reportResult);

    /**
     * Takes a result set and converts it to an array.
     * @return array
     */
    public function toArray();

    /**
     * Converts the result set into a JSON result.
     * @return string
     */
    public function toJSON();
} 