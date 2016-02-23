<?php

namespace Minery\Sift\Contracts;

use Minery\Dig\Contracts\ResultSetInterface;

/**
 * Interface iReportResultAdapter
 * @package Minery\Sift\Contracts
 */
interface ReportResultAdapterInterface
{

    public function __construct(ResultSetInterface $results);

    /**
     * Convert the ResultSet into the format needed by whatever is using this adapter.
     * @return mixed
     */
    public function convert();

    /**
     * Grab a formatted array for PHP
     * @return mixed
     */
    public function toArray();

    /**
     * Grab JSON to report down to the JS module
     * @return mixed
     */
    public function toJSON();
} 