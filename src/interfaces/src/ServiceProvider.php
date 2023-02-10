<?php

namespace Micromus\Startup;

use Micromus\MicroserviceStructure\Services\AbstractServiceProvider;
use Micromus\MicroserviceStructure\Services\ServiceConfigurator;

final class ServiceProvider extends AbstractServiceProvider
{
    protected function configureService(ServiceConfigurator $serviceConfigurator): void
    {
        $serviceConfigurator
            ->setSubserviceNamespace('Subservices')
            ->usingConfig('startup');
    }
}
