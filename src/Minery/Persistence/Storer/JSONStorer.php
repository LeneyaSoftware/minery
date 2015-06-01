<?php
/**
 * Class JSONStorer
 *
 * Stores a report as a JSON file.
 *
 * @author Joshua Walker
 * @version 6/1/15
 */



namespace Minery\Persistence\Storer;


use Minery\Dig\Contracts\Arrayable;
use Minery\FileSystem\iFiles;
use Minery\Persistence\Contracts\iStore;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local as Adapter;

class JSONStorer implements iStore{

    protected $filePath;
    protected $report;
    protected $files;

    public function __construct($filePath,Arrayable $report,iFiles $files){
        $this->path = $filePath;
        $this->report = $report;
        $this->files = $files;
    }

    public function store(){
        $report = json_encode($this->report->toArray());
        $this->files->store($this->path,$report);
    }
} 