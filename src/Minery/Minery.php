<?php

namespace Minery;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Minery\Dig\Results\ReportResult;
use Minery\FileSystem\FlySystemFiles;
use Minery\Persistence\Loader\JSONLoader;
use Minery\Persistence\Storer\JSONStorer;

/**
 * Class Minery
 * @package Minery
 */
class Minery {

    /**
     * @var FlySystemFiles
     */
    protected $fileSystem;

    /**
     * Minery constructor.
     * @param string $rootFilePath
     */
    public function __construct($rootFilePath=''){
        if(empty($rootFilePath))
            $rootFilePath = $_SERVER['DOCUMENT_ROOT'];

        $fileSystem = new FlySystemFiles(new Filesystem(new Local($rootFilePath)));
        $this->fileSystem = $fileSystem;
    }

    /**
     * @return ReportResult
     */
    public static function getEmptyResultSet()
    {
        return new ReportResult();
    }

    /**
     * @param $pathToJSON
     * @return object
     */
    public function loadFromJSON($pathToJSON){
        $loader = new JSONLoader($pathToJSON,$this->fileSystem);
        return $loader->load();
    }

    /**
     * @param $report
     * @param $path
     * @return mixed
     */
    public function storeToJSON($report,$path){
        $storer = new JSONStorer($path,$report,$this->fileSystem);
        return $storer->store();
    }
}