<?php

namespace Minery\Dig\Contracts;

/**
 * Interface ArrayableInterface
 * @package Minery\Dig\Contracts
 */
interface ArrayableInterface
{

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