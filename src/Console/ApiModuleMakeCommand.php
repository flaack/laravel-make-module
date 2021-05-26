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
    protected $signature = 'make:module {module}
        {--flat      : Generate using a flatter organization of files }
        {--migration : By convention, a DB migration has been included implicitly... make optional? }
    ';

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
     * The (optional) options for code generation
     *
     * @var array
     */
    protected $options;
    
    /**
     * Handle execution of the console command
     *
     * @return mixed
     */
    public function handle()
    {
        $this->options = $this->options();
        $this->module = $this->argument('module');

        /**
         * @todo : if I can inject the $this->app instance here,
         * then I can dynamically override the commands, instead
         * of registering them (non-hostile takeover).
         */

        #dd ( $this->app->runningInConsole() );
        
        $this->makeApiModel();
        $this->makeApiResources();
        $this->makeApiController();
    }

    /**
     * Generate Eloquent Model for Api
     */
    public function makeApiModel()
    {
        $migrationYN = $this->options['migration'];

        $modelClass = "{$this->module}/{$this->module}";

        $this->call('make:model', [
            'name' => $modelClass,
            '--migration' => $migrationYN,
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
        $modulePlural = Str::plural($this->module);

        $resourceClass = $this->options['flat']
            # flatter (simpler) file layout:
            ? "{$this->module}/{$this->module}ApiResource"
            # original file layout:
            : "{$this->module}/Resources/{$this->module}"
        ;

        $collectionClass = $this->options['flat']
            # flatter (simpler) file layout:
            #? "{$this->module}/{$module_plural}Json"
            ? "{$this->module}/{$this->module}ApiCollection"
            # original file layout:
            : "{$this->module}/Resources/{$modulePlural}"
        ;

        $this->call('make:resource', [
            'name' => $resourceClass
        ]);

        $this->call('make:resource', [
            'name' => $collectionClass,
            '--collection' => true,
        ]);
    }

    /**
     * Generate (Http) Api Controller
     */
    public function makeApiController()
    {
        $controllerClass = "{$this->module}/{$this->module}Controller";

        $this->call('make:controller', [
            'name'  => $controllerClass,
            '--api' => true,
        ]);
    }

    public function makeApiEvents()
    {
        # Consider: event observers, stubs..
    }
}