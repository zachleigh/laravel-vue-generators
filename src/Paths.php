<?php

namespace VueGenerators;

use Illuminate\Filesystem\Filesystem;

trait Paths
{
    /**
     * Build directory tree from array of paths.
     *
     * @param string          $path
     * @param Filesystem|null $filesystem
     */
    protected function buildPathFromArray($path, Filesystem $filesystem = null)
    {
        $pathArray = collect(explode('/', $path))->prepend('resources');

        if (is_null($filesystem)) {
            $filesystem = new Filesystem();
        }

        $base = base_path();

        foreach ($pathArray as $path) {
            $base = $base.'/'.$path;

            if (!$filesystem->exists($base)) {
                $filesystem->makeDirectory($base);
            }
        }
    }
}
