<?php

namespace Minery\FileSystem;

/**
 * Interface FilePersistInterface
 * @package Minery\FileSystem
 */
interface FilePersistInterface
{
    /**
     * @param $path
     * @param $content
     * @return mixed
     */
    public function store($path,$content);

    /**
     * @param $path
     * @return mixed
     */
    public function retrieve($path);
} 