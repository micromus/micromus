<?php

namespace App\Services\Startup\Domain\Subservices;

use Micromus\MicroserviceStructure\Attributes\RegisterAction;
use Micromus\Startup\Contracts\GetStartupMessageInterface;
use Micromus\Startup\DataTransferObjects\StartupData;

final class StartupSubservice
    implements GetStartupMessageInterface
{
    #[RegisterAction(GetStartupMessageInterface::class)]
    public function getStartupMessage(): StartupData
    {
        return new StartupData(message: 'Hello world');
    }
}
