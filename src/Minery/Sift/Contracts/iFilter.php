<?php
namespace Minery\Sift\Contracts;

/**
 * Creates a filter for a SQL query. Can be extended to do whatever you want.
 * Class iFilter
 * @package Minery\Sift\Contracts
 */
interface iFilter {

    /**
     * Generates the filter
     * @param bool $negate - negate the filter.
     * @return mixed
     */
    public function generate($negate = false);

    /**
     * Sets the field that this filter applies to in your database.
     * @param $field
     * @return mixed
     */
    public function setField($field);
} 