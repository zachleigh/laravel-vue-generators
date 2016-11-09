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
        $pathArray = explode('/', $path);

        if (is_null($filesystem)) {
            $filesystem = new Filesystem();
        }

        $base = '/';

        $resourceArray = explode('/', resource_path());

        $all = collect($resourceArray)->merge($pathArray);

        foreach ($all as $dir) {
            $base = $base.'/'.$dir;

            if (!$filesystem->exists($base)) {
                $filesystem->makeDirectory($base);
            }
        }
    }
}
