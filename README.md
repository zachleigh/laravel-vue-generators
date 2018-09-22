# Laravel Vue Generators   
[![Latest Stable Version](https://img.shields.io/packagist/v/zachleigh/laravel-vue-generators.svg)](//packagist.org/packages/zachleigh/laravel-vue-generators)
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](//packagist.org/packages/zachleigh/laravel-vue-generators) 
[![Build Status](https://img.shields.io/travis/zachleigh/laravel-vue-generators/master.svg)](https://travis-ci.org/zachleigh/laravel-vue-generators)
[![Quality Score](https://img.shields.io/scrutinizer/g/zachleigh/laravel-vue-generators.svg)](https://scrutinizer-ci.com/g/zachleigh/laravel-vue-generators/)
[![StyleCI](https://styleci.io/repos/73324143/shield?style=flat)](https://styleci.io/repos/72352058)
[![Total Downloads](https://img.shields.io/packagist/dt/zachleigh/laravel-vue-generators.svg)](https://packagist.org/packages/zachleigh/laravel-vue-generators)
 
##### Generate Vue js file stubs via artisan commands. 

### Contents
  - [Upgrade Information](#upgrade-information)
  - [Install](#install)
  - [Usage](#usage)
  - [Configuration](#configuration)
  - [Testing](#testing)
  - [Contributing](#contributing)

### Upgrade Information
#### Version 0.1.* to Version 0.2.0
Version 0.2.0 adds Laravel 5.4 support. For Laravel 5.3, please use [Version 0.1.4](https://github.com/zachleigh/laravel-vue-generators/tree/v0.1.4):
```
composer require zachleigh/laravel-vue-generators:0.1.*
```

### Install
Install via composer:
```
composer require zachleigh/laravel-vue-generators
```
In Laravel's config/app.php file, add the service provider to the array with the 'providers' key.
```
VueGenerators\ServiceProvider::class
```
Publish the config file:
```
php artisan vendor:publish --provider="VueGenerators\ServiceProvider"
```

### Usage
This package currently contains two commands: `component` and `mixin`.      
#### component
Create a Vue js component file.
```
php artisan vueg:component {name} {--empty} {--path=}
```
###### name
Name of the component.
```
php artisan vueg:component MyComponent
```
Will create a file called MyComponent.vue at resources/assets/js/components/MyComponent.vue.
###### empty
By default, the component will be filled with all available component methods (data, props, computed etc.). Use empty flag to create an empty component with no methods.
```
php artisan vueg:component MyComponent --empty
```
Will create a file with no component methods.
###### path
By default, all components will be saved in resources/assets/js/components/. Specify a custom path with the path flag. Path root is in resources/.
```
php artisan vueg:component MyComponent --path=assets/js/custom/folder
``` 
Will create a file called MyComponent.vue at resources/assets/js/custom/folder/MyComponent.vue.

#### mixin
Create a Vue js mixin file.
```
php artisan vueg:mixin {name} {--empty} {--path=}
```
###### name
Name of the mixin.
```
php artisan vueg:mixin MyMixin
```
Will create a file called MyMixin.vue at resources/assets/js/mixins/MyMixin.vue.
###### empty
By default, the mixin will be filled with all available mixin methods (data, props, computed etc.). Use empty flag to create an empty mixin with no methods.
```
php artisan vueg:mixin MyMixin --empty
```
Will create a file with no mixin methods.
###### path
By default, all mixins will be saved in resources/assets/js/mixins/. Specify a custom path with the path flag. Path root is in resources/.
```
php artisan vueg:mixin MyMixin --path=assets/js/custom/folder
``` 
Will create a file called MyMixin.vue at resources/assets/js/custom/folder/MyMixin.vue.

### Configuration
Set default paths for components and mixins. All paths are relative to Laravel's resources directory.
```php
'paths' => [
    'components' => 'path/to/components',
    'mixins'     => 'path/to/mixins',
]
```

### Testing
```
composer test
```

### Contributing
Contributions are more than welcome. Fork, improve and make a pull request. For bugs, ideas for improvement or other, please create an [issue](https://github.com/zachleigh/laravel-lang-bundler/issues).
