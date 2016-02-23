<?php

namespace Minery\Persistence\Contracts;

/**
 * Interface LoaderInterface
 * @package Minery\Persistence\Contracts
 */
interface LoaderInterface
{
    /**
     * Loads a report from a persisted store.
     * @return mixed
     */
    public function load();
} 