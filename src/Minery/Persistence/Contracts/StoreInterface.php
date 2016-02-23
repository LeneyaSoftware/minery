<?php

namespace Minery\Persistence\Contracts;

/**
 * Interface StoreInterface
 * @package Minery\Persistence\Contracts
 */
interface StoreInterface
{

    /**
     * Creates a persisted store for a report.
     * @return mixed
     */
    public function store();
} 