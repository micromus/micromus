<?php

namespace Micromus\Startup\DataTransferObjects;

use Spatie\LaravelData\Data;

final class StartupData extends Data
{
    public function __construct(
        public string $message
    ){}
}
