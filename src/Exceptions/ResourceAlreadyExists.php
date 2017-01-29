<?php

namespace VueGenerators\Exceptions;

use Exception;

class ResourceAlreadyExists extends Exception
{
    /**
     * File of given name already exists at path.
     *
     * @param string $name
     *
     * @return static
     */
    public static function fileExists($name)
    {
        return new static(
            "File {$name} already exists at path."
        );
    }
}