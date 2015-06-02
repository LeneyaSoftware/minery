<?php
/**
 * @author Daniel Jones
 * @version 6/1/15
 */

namespace Minery\Persistence\Loader;


use Minery\Persistence\Contracts\iLoader;

class ClassLoader{

    public function load($array){
        $className = $array['class'];
        $reflector = new \ReflectionClass($className);
        return $reflector->newInstanceWithoutConstructor();
    }

}