<?php

namespace Minery\Dig\Contracts;

/**
 * Interface JSONableInterface
 * @package Minery\Dig\Contracts
 */
interface JSONableInterface
{

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