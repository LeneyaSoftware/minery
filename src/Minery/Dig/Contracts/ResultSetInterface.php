<?php

namespace Minery\Dig\Contracts;

/**
 * Interface ResultSetInterface
 * @package Minery\Dig\Contracts
 */
interface ResultSetInterface
{

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