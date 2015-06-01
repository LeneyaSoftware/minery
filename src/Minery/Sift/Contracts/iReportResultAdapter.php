<?php
/**
 * Interface iReportResultAdapter
 *
 * Enter Interface Description Here
 *
 * @author Joshua Walker
 * @version 5/27/15
 */


namespace Minery\Sift\Contracts;


use Minery\Dig\Contracts\iResultSet;

interface iReportResultAdapter {

    public function __construct(iResultSet $results);

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