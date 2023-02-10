<?php

namespace Micromus\Startup\Contracts;

use Micromus\Startup\DataTransferObjects\StartupData;

interface GetStartupMessageInterface
{
    public function getStartupMessage(): StartupData;
}
