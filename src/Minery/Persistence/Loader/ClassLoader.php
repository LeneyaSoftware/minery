<?php

namespace Minery\Persistence\Loader;

use Minery\Persistence\Contracts\iLoader;

/**
 * Class ClassLoader
 * @package Minery\Persistence\Loader
 */
class ClassLoader
{

    /**
     * @param $array
     * @return object
     */
    public function load($array)
    {
        $className = $array['class'];
        $reflector = new \ReflectionClass($className);
        return $reflector->newInstanceWithoutConstructor();
    }

}