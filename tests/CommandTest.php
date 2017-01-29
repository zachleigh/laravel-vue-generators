<?php

namespace VueGenerators\tests;

use Artisan;

class CommandTest extends TestCase
{
    /**
     * @test
     */
    public function it_saves_component_file_with_specified_name()
    {
        $file = resource_path('assets/js/components/NewComponent.vue');

        $this->assertFileNotExists($file);

        Artisan::call('vueg:component', [
            'name'    => 'NewComponent',
            '--empty' => true,
        ]);

        $this->assertFileExists($file);
    }

    /**
     * @test
     */
    public function it_generates_an_empty_component_file()
    {
        $file = resource_path('assets/js/components/NewComponent.vue');

        $this->assertFileNotExists($file);

        Artisan::call('vueg:component', [
            'name'    => 'NewComponent',
            '--empty' => true,
        ]);

        $this->assertFileEquals(__DIR__.'/../src/Stubs/EmptyComponent.vue', $file);
    }

    /**
     * @test
     */
    public function it_generates_a_filled_component_file()
    {
        $file = resource_path('assets/js/components/NewComponent.vue');

        $this->assertFileNotExists($file);

        Artisan::call('vueg:component', [
            'name' => 'NewComponent',
        ]);

        $this->assertFileEquals(__DIR__.'/../src/Stubs/Component.vue', $file);
    }

    /**
     * @test
     */
    public function it_saves_component_file_to_specified_path()
    {
        $file = resource_path('custom/path/NewComponent.vue');

        $this->assertFileNotExists($file);

        Artisan::call('vueg:component', [
            'name'   => 'NewComponent',
            '--path' => 'custom/path',
        ]);

        $this->assertFileExists($file);
    }

    /**
     * @test
     */
    public function it_saves_components_to_path_set_in_config()
    {
        app()['config']->set('vue-generators.paths.components', 'custom/path');

        $file = resource_path('custom/path/NewComponent.vue');

        $this->assertFileNotExists($file);

        Artisan::call('vueg:component', [
            'name'   => 'NewComponent',
        ]);

        $this->assertFileExists($file);
    }

    /**
     * @test
     *
     * @expectedException VueGenerators\Exceptions\ResourceAlreadyExists
     * @expectedExceptionMessage File NewComponent.vue already exists at path.
     */
    public function it_doesnt_overwrite_components_that_already_exist()
    {
        $file = resource_path('assets/js/components/NewComponent.vue');

        Artisan::call('vueg:component', [
            'name'   => 'NewComponent',
        ]);

        $this->assertFileExists($file);

        Artisan::call('vueg:component', [
            'name'   => 'NewComponent',
        ]);
    }

    /**
     * @test
     */
    public function it_saves_mixin_file_with_specified_name()
    {
        $file = resource_path('assets/js/mixins/NewMixin.js');

        $this->assertFileNotExists($file);

        Artisan::call('vueg:mixin', [
            'name'    => 'NewMixin',
            '--empty' => true,
        ]);

        $this->assertFileExists($file);
    }

    /**
     * @test
     */
    public function it_generates_empty_mixin_file()
    {
        $file = resource_path('assets/js/mixins/NewMixin.js');

        $this->assertFileNotExists($file);

        Artisan::call('vueg:mixin', [
            'name'    => 'NewMixin',
            '--empty' => true,
        ]);

        $this->assertFileEquals(__DIR__.'/../src/Stubs/EmptyMixin.js', $file);
    }

    /**
     * @test
     */
    public function it_generates_filled_mixin_file()
    {
        $file = resource_path('assets/js/mixins/NewMixin.js');

        $this->assertFileNotExists($file);

        Artisan::call('vueg:mixin', [
            'name' => 'NewMixin',
        ]);

        $this->assertFileEquals(__DIR__.'/../src/Stubs/Mixin.js', $file);
    }

    /**
     * @test
     */
    public function it_saves_mixin_file_to_specified_path()
    {
        $file = resource_path('custom/path/NewMixin.js');

        $this->assertFileNotExists($file);

        Artisan::call('vueg:mixin', [
            'name'   => 'NewMixin',
            '--path' => 'custom/path',
        ]);

        $this->assertFileExists($file);
    }

    /**
     * @test
     */
    public function it_saves_mixins_to_path_set_in_config()
    {
        app()['config']->set('vue-generators.paths.mixins', 'custom/path');

        $file = resource_path('custom/path/NewMixin.js');

        $this->assertFileNotExists($file);

        Artisan::call('vueg:mixin', [
            'name'   => 'NewMixin',
        ]);

        $this->assertFileExists($file);
    }

    /**
     * @test
     *
     * @expectedException VueGenerators\Exceptions\ResourceAlreadyExists
     * @expectedExceptionMessage File NewMixin.js already exists at path.
     */
    public function it_doesnt_overwrite_mixin_that_already_exist()
    {
        $file = resource_path('assets/js/mixins/NewMixin.js');

        Artisan::call('vueg:mixin', [
            'name'   => 'NewMixin',
        ]);

        $this->assertFileExists($file);

        Artisan::call('vueg:mixin', [
            'name'   => 'NewMixin',
        ]);
    }
}
