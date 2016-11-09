<?php

namespace VueGenerators\Commands;

use VueGenerators\Paths;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class VueGeneratorsCommand extends Command
{
    use Paths;
    
    /**
     * Create path for file.
     *
     * @param  Filesystem $filesystem
     * 
     * @return string
     */
    protected function createPath(Filesystem $filesystem)
    {
        $path = $this->option('path');

        $pathArray = explode('.', $path);

        $this->buildPathFromArray($pathArray, $filesystem);

        return implode('/', $pathArray);
    }
}
