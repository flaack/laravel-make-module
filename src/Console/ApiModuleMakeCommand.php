<?php

namespace Flaack\LaravelMakeModule\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ApiModuleMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new API module (controller, model, and resource classes)';

    /**
     * The name of the module (or model / entity)
     * 
     * @var string
     */
    protected $module;
    
    /**
     * Handle execution of the console command
     *
     * @return mixed
     */
    public function handle()
    {
        $this->module = $this->argument('module');
        
        $this->makeApiModel();
        $this->makeApiResources();
        $this->makeApiController();
    }

    /**
     * Generate Eloquent Model for Api
     */
    public function makeApiModel()
    {
        $this->call('make:model', [
            'name' => "{$this->module}/Model/{$this->module}",
            '--migration' => true,
        ]);
    }

    /**
     * Generate Resource Representations:
     *
     *  Api Resource representation of a single model
     *  Api Collection representation of a model collection
     */
    public function makeApiResources()
    {
        $this->call('make:resource', [
            'name' => "{$this->module}/Resource/{$this->module}"
        ]);

        $module_plural = Str::plural($this->module);

        $this->call('make:resource', [
            'name' => "{$this->module}/Resource/{$module_plural}",
            '--collection' => true,
        ]);
    }

    /**
     * Generate (Http) Api Controller
     */
    public function makeApiController()
    {
        $this->call('make:controller', [
            'name'  => "{$this->module}/{$this->module}Controller",
            '--api' => true,
        ]);
    }

    public function makeApiEvents()
    {
        # Consider: event observers, stubs..
    }
}