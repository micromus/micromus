<?php

namespace Micromus\Startup\Subservices;

use Illuminate\Support\Facades\Http;
use Micromus\MicroserviceStructure\Attributes\RegisterAction;
use Micromus\Startup\Contracts\GetStartupMessageInterface;
use Micromus\Startup\DataTransferObjects\StartupData;

final class StartupSubservice implements GetStartupMessageInterface
{
    private function getUrl(): string
    {
        return (string) config('services.startup.host');
    }

    #[RegisterAction(GetStartupMessageInterface::class)]
    public function getStartupMessage(): StartupData
    {
        $startupResponse = Http::baseUrl($this->getUrl())
            ->get('v1/startup/message')
            ->json('data');

        return StartupData::from($startupResponse);
    }
}
