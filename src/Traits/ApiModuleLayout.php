<?php

namespace Flaack\LaravelMakeModule\Traits;

trait ApiModuleLayout
{
    /**
     * Override namespace to achieve Modularity
     * 
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return "{$rootNamespace}\Modules\Api";
    }
}