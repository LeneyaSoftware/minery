<?php

namespace Minery\Persistence\Storer;

use Minery\Dig\Contracts\ArrayableInterface;
use Minery\FileSystem\iFiles;
use Minery\Persistence\Contracts\StoreInterface;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local as Adapter;

/**
 * Class JSONStorer
 * @package Minery\Persistence\Storer
 */
class JSONStorer implements StoreInterface
{

    /**
     * @var
     */
    protected $filePath;
    /**
     * @var ArrayableInterface
     */
    protected $report;
    /**
     * @var iFiles
     */
    protected $files;

    /**
     * JSONStorer constructor.
     * @param $filePath
     * @param ArrayableInterface $report
     * @param iFiles $files
     */
    public function __construct($filePath, ArrayableInterface $report, iFiles $files)
    {
        $this->path = $filePath;
        $this->report = $report;
        $this->files = $files;
    }

    /**
     * @return mixed
     */
    public function store()
    {
        $report = json_encode($this->report->toArray());
        return $this->files->store($this->path, $report);
    }
} 