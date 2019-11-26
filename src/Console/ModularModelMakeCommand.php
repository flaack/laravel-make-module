<?php

namespace Flaack\LaravelMakeModule\Console;

use Illuminate\Foundation\Console\ModelMakeCommand;
use Flaack\LaravelMakeModule\Traits\ApiModuleLayout;

/**
 * Override Laravel's baked-in make:model command
 */
class ModularModelMakeCommand extends ModelMakeCommand
{
    use ApiModuleLayout;

    protected $description = 'Create a 🔥/modularized/ api model in Laravel.';
}