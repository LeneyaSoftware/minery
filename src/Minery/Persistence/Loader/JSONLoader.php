<?php
namespace Minery\Persistence\Loader;
use Minery\FileSystem\iFiles;

/**
 * Class JSONLoader
 * @package Minery\Persistence\Loader
 *
 * Loads a report from a JSON representation
 *
 * @author Josh Walker - josh.walker@leneya.com - @xjoshwalker - github: joshjwalker
 */
class JSONLoader {

    protected $path;
    protected $files;
    protected $report;

    public function __construct($path,iFiles $files){
        $this->path = $path;
        $this->files = $files;
    }

    public function load(){
        //retrieve an array from a json file stored in the system.
        $array = json_decode($this->files->retrieve($this->path));

        $reportType = $array['reportType'];

        try{
            $report = new $reportType;
            if(method_exists($report,'fromArray'))
                $report->fromArray($array);
            else
                throw new ReportNotPersistableException('This report type is not able to be persisted.');
            return $report;
        }catch(\Exception $e){
            throw new ReportNotFoundException("The class for the report type passed in ($reportType) could not be found.");
        }
    }
} 