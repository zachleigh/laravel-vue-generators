<?php

namespace VueGenerators\Commands;

use Illuminate\Filesystem\Filesystem;

class MakeComponent extends VueGeneratorsCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vueg:component {name} {--empty} {--path=assets.js.components}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Vue js component file.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filesystem = new Filesystem();

        $name = $this->argument('name').'.vue';

        $path = $this->createPath($filesystem);

        $fullPath = resource_path("{$path}/{$name}");

        $stub = $this->getStub($filesystem);

        $filesystem->put($fullPath, $stub);

        $this->info("Component {$name} succesfully created.");
    }

    /**
     * Get and return stub.
     *
     * @param Filesystem $filesystem
     *
     * @return string
     */
    protected function getStub(Filesystem $filesystem)
    {
        $fileName = $this->option('empty') ? 'EmptyComponent' : 'Component';

        return $filesystem->get(__DIR__.'/../Stubs/'.$fileName.'.vue');
    }
}
