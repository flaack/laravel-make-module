<?php

namespace Flaack\LaravelMakeModule;

use Illuminate\Support\ServiceProvider;

use Flaack\LaravelMakeModule\Console\{
	ApiModuleMakeCommand
	, ModularModelMakeCommand      as ModelMake
	, ModularResourceMakeCommand   as ResourceMake
	, ModularControllerMakeCommand as ControllerMake
};

class MakeModuleServiceProvider extends ServiceProvider
{
	/**
     * Bootstrap to add new console command
     *
     * @return void
     */
	public function boot()
	{
		if ( $this->app->runningInConsole() ) {
			$this->commands([				
				ApiModuleMakeCommand::class
			]);
		}
	}

	/**
     * Register to extend 'make:[model|resource|controller]' commands
     *
     * @return void
     */
	public function register()
	{
		$this->app->extend('command.model.make', function() {
			return resolve( ModelMake::class );
		});

		$this->app->extend('command.resource.make', function() {
			return resolve( ResourceMake::class );
		});

		$this->app->extend('command.controller.make', function() {
			return resolve( ControllerMake::class );
		});
	}
}