<?php
/**
 * @author Daniel Jones
 * @version 6/1/15
 */

namespace Minery;


use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Minery\Dig\Results\ReportResult;
use Minery\FileSystem\FlySystemFiles;
use Minery\Persistence\Loader\JSONLoader;
use Minery\Persistence\Storer\JSONStorer;

class ReportSuite {

    protected $fileSystem;

    public function __construct($rootFilePath=''){
        if(empty($rootFilePath))
            $rootFilePath = $_SERVER['DOCUMENT_ROOT'];

        $fileSystem = new FlySystemFiles(new Filesystem(new Local($rootFilePath)));
        $this->fileSystem = $fileSystem;
    }

    public static function getEmptyResultSet()
    {
        return new ReportResult();
    }

    public function loadFromJSON($pathToJSON){
        $loader = new JSONLoader($pathToJSON,$this->fileSystem);
        return $loader->load();
    }

    public function storeToJSON($report,$path){
        $storer = new JSONStorer($path,$report,$this->fileSystem);
        return $storer->store();
    }
}