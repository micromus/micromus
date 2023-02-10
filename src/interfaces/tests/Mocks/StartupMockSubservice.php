<?php

namespace Micromus\Startup\Tests\Mocks;

use Micromus\Startup\Contracts\GetStartupMessageInterface;
use Micromus\Startup\DataTransferObjects\StartupData;

final class StartupMockSubservice implements GetStartupMessageInterface
{
    public function getStartupMessage(): StartupData
    {
        return new StartupData('This is testing message');
    }
}
