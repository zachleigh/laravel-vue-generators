<?php

namespace VueGenerators\Commands;

use Illuminate\Filesystem\Filesystem;
use VueGenerators\Commands\VueGeneratorsCommand;

class MakeMixin extends VueGeneratorsCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vueg:mixin {name} {--empty} {--path=assets.js.mixins}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Vue js mixin file.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filesystem = new Filesystem();

        $name = $this->argument('name').'.js';

        $path = $this->createPath($filesystem);

        $fullPath = resource_path("{$path}/{$name}");

        $stub = $this->getStub($filesystem);

        $filesystem->put($fullPath, $stub);

        $this->info("Component {$name} succesfully created.");
    }

    /**
     * Get and return stub.
     *
     * @param  Filesystem $filesystem
     * 
     * @return string
     */
    protected function getStub(Filesystem $filesystem)
    {
        $fileName = $this->option('empty') ? 'EmptyMixin' : 'Mixin';

        return $filesystem->get(__DIR__.'/../Stubs/'.$fileName.'.js');
    }
}
