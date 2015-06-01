<?php
/**
 * Interface iFiles
 *
 * Enter Interface Description Here
 *
 * @author Joshua Walker
 * @version 6/1/15
 */


namespace Minery\FileSystem;


interface iFiles {
    public function store($path,$content);
    public function retrieve($path);
} 