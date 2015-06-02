<?php
/**
 * Class Files
 *
 * Enter Class Description Here
 *
 * @author Joshua Walker
 * @version 6/1/15
 */



namespace Minery\FileSystem;


use League\Flysystem\Filesystem;

class FlySystemFiles implements iFiles{
    public function __construct(Filesystem $files){
        $this->fileSystem = $files;
    }

    public function store($path,$content){
        $this->fileSystem->put($path,$content);
    }

    public function retrieve($path){
        return $this->fileSystem->read($path);
    }
} 