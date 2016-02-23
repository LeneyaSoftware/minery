<?php

namespace Minery\Sift\Adapter;

use Minery\Dig\Contracts\iResultSet;
use Minery\Dig\Contracts\ResultSetInterface;
use Minery\Sift\Contracts\iReportResultAdapter;
use Minery\Sift\Contracts\ReportResultAdapterInterface;

/**
 * Class TableAdapter
 * @package Minery\Sift\Adapter
 */
class TableAdapter implements ReportResultAdapterInterface
{

    /**
     * @var
     */
    protected $result;

    /**
     * TableAdapter constructor.
     * @param iResultSet $result
     */
    public function __construct(ResultSetInterface $result)
    {
        $this->data = $result;
        $this->convert();
    }


    /**
     * Convert the ResultSet into the format needed by whatever is using this adapter.
     * @return mixed
     */
    public function convert()
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