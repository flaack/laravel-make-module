# Laravel Make Module
This package provides a `php artisan make:module` console command.

## About
This comprises an opinionated way to organize the classes and folders in a *modular* fashion, instead of the conventional folder layout Laravel offers out-of-the-box.

## Compatibility
* Works with Laravel versions 5.x and 6.x

## Installation
* `composer require --dev flaack/laravel-make-module`

## Usage
* `php artisan make:module Foo`
The resulting `Foo`-related classes Would be scaffolded like this:
```
app
└── Modules
    └── Api
        └── Foo
            ├── Model
            │   └── Foo.php
            ├── Resource
            │   ├── Foo.php
            │   └── Foos.php
            └── FooController.php
```

Along with a new database migration:
```
database
└── migrations
    └── 2019_11_25_224100_create_foos_table.php
```

## Under the hood
This command invokes `make:model` with `--migration=true`, `make:resource` (for both item and collection resource classes), and `make:controller` with `--api=true`, and for each of these invocations, overrides laravel's default folder layout for the resulting classes.

The scaffolded results are placed in `app/Modules/Api`, in a directory by the name given for the module.

## Todo's / Nice-to-haves
* Configuration options?
* A flag to *not* override defaults, sometimes
* A model stub with a `protected $appends = [];`
  * ... because I *always* use it for api's
* A controller stub having some boilerplate for:
  * `use App\Modules\Api\Foo\*` directives
  * `index` method, returning `Foo::paginate()` as a `new JsonCollection`
  * `show` method, returning `new JsonResource($foo)`
