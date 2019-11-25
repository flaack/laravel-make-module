<?php

namespace Flaack\LaravelMakeModule\Console;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Flaack\LaravelMakeModule\Traits\ApiModuleLayout;

/**
 * Override Laravel's baked-in make:controller command
 */
class ModularControllerMakeCommand extends ControllerMakeCommand
{
	use ApiModuleLayout;

	protected $description = 'Create a 🔥/modularized/ api resource controller in Laravel.';
    
    // protected function getStub()
    // {
    // 	return __DIR__.'/stubs/controller.modularized.stub';
    // }
}