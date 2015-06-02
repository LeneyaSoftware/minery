<?php
/**
 * Class SpreadSheetResult
 *
 * Enter Class Description Here
 *
 * @author Joshua Walker
 * @version 5/27/15
 */



namespace Minery\Dig\Results;


use Minery\Dig\Contracts\iResultSet;

class ReportResult implements iResultSet{

    //These are the headers to display for this report... However you want to display it.
    protected $headers;

    //This is the data we will be manipulating
    protected $data;

    public function __construct(array $reportResults = []){
        $this->fromArray($reportResults);
    }

    /**
     * Creates a result set from an array.
     *
     * Expects an array with mysql-esque structure. They 'keys' in each loop will become the headers or labels
     * for a result set. For instance:
     *
     * [
     *     0 => [
     *         'name'=>'josh',
     *         'city'=>'Grand Rapids',
     *         'state'=>'Michigan'
     *     ],
     *     1 => [
     *         'name'=>'john',
     *         'city'=>'LA',
     *         'state'=>'California'
     *     ]
     *  ]
     *
     * Each of the array keys in index 0 (the first array entry) will be assumed to be your headers.
     *
     * @param array $reportResults
     * @return mixed
     */
    public function fromArray(array $reportResults)
    {
        //if it's not an array, then don't convert it. Just turn this into a blank result set.
        if(!is_array($reportResults) || empty($reportResults))
            $this->headers = $this->data = array();

        $this->headers = array_keys($reportResults);
        $this->data = $reportResults;
    }

    /**
     * Takes a result set and converts it to an array.
     * @return array
     */
    public function toArray()
    {
        $array = [
            'class' => get_class($this),
            'headers'=>$this->headers,
            'data'=>$this->data
        ];
        return $array;
    }

    /**
     * Converts the result set into a JSON result.
     * @return string
     */
    public function toJSON()
    {
        return json_encode($this->toArray());
    }

    /**
     * Returns the data of this result set.
     * @return mixed
     */
    public function data(){
        return $this->data;
    }

    /**
     * Returns the headers of the result set.
     * @return mixed
     */
    public function headers(){
        return $this->headers;
    }

} 