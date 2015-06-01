<?php
/**
 * Abstract Class ReportBase
 *
 * Implements the functions that will allow us to do many of the common things required by all reports.
 *
 * @author Joshua Walker
 * @version 5/27/15
 */

namespace Minery\Dig;


use Minery\Dig\Contracts\iReport;
use Minery\Dig\Contracts\ResultSetContract;

abstract class ReportBase implements iReport{

    protected $resultSet;

    /**
     * Creates a Report. Takes in an empty report result set that needs to be filled in when the report has completed
     * running.
     * @param iResultSet $emptyResultSet
     */
    public function __construct(iResultSet $emptyResultSet){

    }

    /**
     * Runs this report.
     * @param $db -- the database object you want to be searching on. Could be a query builder, could be PDO. Just pop it in and do work.
     * @return mixed
     */
    public abstract function run($db);


    /**
     * Runs the report and then returns a ReportResult from the array generated in the run function.
     * @return mixed
     */
    public function getResult(){
        return $this->resultSet->fromArray($this->run());
    }
}
