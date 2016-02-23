<?php
namespace Minery\Persistence\Loader;

use Minery\Exception\ReportNotFoundException;
use Minery\Exception\ReportNotPersistableException;
use Minery\FileSystem\iFiles;

/**
 * Class JSONLoader
 * @package Minery\Persistence\Loader
 *
 * Loads a report from a JSON representation
 *
 * @author Josh Walker - josh.walker@leneya.com - @xjoshwalker - github: joshjwalker
 */
class JSONLoader
{

    /**
     * @var
     */
    protected $path;
    /**
     * @var iFiles
     */
    protected $files;
    /**
     * @var
     */
    protected $report;

    /**
     * JSONLoader constructor.
     * @param $path
     * @param iFiles $files
     */
    public function __construct($path, iFiles $files)
    {
        $this->path = $path;
        $this->files = $files;
    }

    /**
     * @return object
     */
    public function load()
    {
        //retrieve an array from a json file stored in the system.
        $json = $this->files->retrieve($this->path);
        $array = json_decode($json, true);
        try {
            $loader = new ClassLoader();
            $object = $loader->load($array);
            if (method_exists($object, 'fromArray')) {
                $object->fromArray($array);
            } else {
                throw new ReportNotPersistableException(
                    "This report type ({$array['class']}) is not able to be persisted or loaded from a file."
                );
            }

            return $object;
        } catch (\Exception $e) {
            die($e->getMessage() . "\r\n");
        }
    }
} 