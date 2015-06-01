<?php
/**
 * Abstract Class ReportBase
 *
 * Implements the functions that will allow us to do many of the common things required by all reports.
 *
 * @author Joshua Walker
 * @version 5/27/15
 */

namespace Minery\Dig\Report;


use Minery\Dig\Contracts\iReport;
use Minery\Dig\Contracts\ResultSetContract;
use Minery\Sift\Filters\FilterCollection\FilterCollection;

abstract class ReportBase implements iReport,Arrayable{

    protected $resultSet;

    /**
     * Creates a Report. Takes in an empty report result set that needs to be filled in when the report has completed
     * running.
     * @param iResultSet $emptyResultSet
     * @param $db -- the database object that you want to use to search. Could be PDO, could be plain MYSQLi Connection.
     *               Just the thing that you want to do the searching on.
     * @param FilterCollection $filterCollection -- the filters you want to apply
     */
    public function __construct(iResultSet $emptyResultSet,$db = '',FilterCollection $filterCollection=null){

    }

    /**
     * Runs this report. Make sure to return a result that is consistent with the following structure.
     *
     *[
     *  0 => ['field1' => 'value1' , 'field2' => 'value2'],
     *  1 => ['field1' => 'value1' , 'field2' => 'value2'],
     *  ...
     *]
     *
     * Where field1 and field2 are the names of the columns you are returning and value1 / value2 are the values
     * for those fields. Minery takes those fields and creates your headers for whatever result you are rendering,
     * so they must be there.
     *
     * @return mixed
     */
    public abstract function run();


    /**
     * Runs the report and then returns a ReportResult from the array generated in the run function.
     * @return mixed
     */
    public function getResult(){
        return $this->resultSet->fromArray($this->run());
    }
}