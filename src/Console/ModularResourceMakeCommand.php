<?php

namespace Flaack\LaravelMakeModule\Console;

use Illuminate\Foundation\Console\ResourceMakeCommand;
use Flaack\LaravelMakeModule\Traits\ApiModuleLayout;

/**
 * Override Laravel's baked-in make:resource command
 */
class ModularResourceMakeCommand extends ResourceMakeCommand
{
    use ApiModuleLayout;

	protected $description = 'Create a 🔥/modularized/ api resource or resource collection in Laravel.';
}