<?php

namespace Minery\Sift\Adapter;

use Minery\Dig\Contracts\iResultSet;
use Minery\Sift\Contracts\iReportResultAdapter;

/**
 * Class TableAdapter
 * @package Minery\Sift\Adapter
 */
class TableAdapter implements iReportResultAdapter
{

    /**
     * @var
     */
    protected $result;

    /**
     * TableAdapter constructor.
     * @param iResultSet $result
     */
    public function __construct(iResultSet $result)
    {
        $this->data = $result;
        $this->convert();
    }


    /**
     * Convert the ResultSet into the format needed by whatever is using this adapter.
     * @return mixed
     */
    protected function convert()
    {

    }

    /**
     * Grab a formatted array for PHP
     * @return mixed
     */
    public function toArray()
    {
        // TODO: Implement toArray() method.
    }

    /**
     * Grab JSON to report down to the JS module
     * @return mixed
     */
    public function toJSON()
    {
        // TODO: Implement toJSON() method.
    }

} 