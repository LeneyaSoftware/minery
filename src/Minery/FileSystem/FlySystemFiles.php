<?php

namespace Minery\FileSystem;

use League\Flysystem\Filesystem;

/**
 * Class FlySystemFiles
 * @package Minery\FileSystem
 */
class FlySystemFiles implements FilePersistInterface
{
    /**
     * FlySystemFiles constructor.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        $this->fileSystem = $files;
    }

    /**
     * @param $path
     * @param $content
     */
    public function store($path, $content)
    {
        $this->fileSystem->put($path, $content);
    }

    /**
     * @param $path
     * @return false|string
     */
    public function retrieve($path)
    {
        return $this->fileSystem->read($path);
    }
} 