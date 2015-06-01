<?php
/**
 * Class DataTablesAdapter
 *
 * Enter Class Description Here
 *
 * @author Joshua Walker
 * @version 5/27/15
 */



namespace Minery\Sift\Adapter;


use Minery\Dig\Contracts\iResultSet;
use Minery\Sift\Contracts\iReportResultAdapter;

class TableAdapter implements iReportResultAdapter{

    protected $result;

    public function __construct(iResultSet $result){
        $this->data = $result;
        $this->convert();
    }


    /**
     * Convert the ResultSet into the format needed by whatever is using this adapter.
     * @return mixed
     */
    protected function convert()
    {
        // TODO: Implement convert() method.
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