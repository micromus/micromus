<?php

namespace Micromus\Startup\Feature\Subservices;

use Illuminate\Support\Facades\Http;
use Micromus\Startup\DataTransferObjects\StartupData;
use Micromus\Startup\Subservices\StartupSubservice;
use Tests\TestCase;

final class StartupSubserviceTest extends TestCase
{
    public function test_get_startup_message(): void
    {
        Http::fake([
            'http://localhost/v1/startup/message' => Http::response(['data' => ['message' => 'Test is successful']])
        ]);

        /** @var StartupData $startupMessageData */
        $startupMessageData = $this->app->make(StartupSubservice::class)
            ->getStartupMessage();

        $this->assertEquals('Test is successful', $startupMessageData->message);
    }
}
