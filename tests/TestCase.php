<?php

namespace VueGenerators\tests;

use VueGenerators\Paths;
use VueGenerators\ServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as IlluminateTestCase;

class TestCase extends IlluminateTestCase
{
    use Paths;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../vendor/laravel/laravel/bootstrap/app.php';

        $app->register(ServiceProvider::class);

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Setup DB and test variables before each test.
     */
    protected function setUp()
    {
        $filesystem = new Filesystem();

        $configDir = __DIR__.'./../src/config.php';

        $configTarget = __DIR__.'./../vendor/laravel/laravel/config/vue-generators.php';

        $filesystem->copy($configDir, $configTarget);

        parent::setUp();
    }

    /**
     * Teardown after each class.
     */
    protected function tearDown()
    {
        $filesystem = new Filesystem();

        $filesystem->deleteDirectory(resource_path());

        $this->buildPathFromArray('assets/js/components');

        parent::tearDown();
    }
}
