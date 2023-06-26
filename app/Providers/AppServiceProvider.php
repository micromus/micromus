<?php

namespace App\Providers;

use App\Services\Startup\StartupServiceProvider;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * @var class-string[]
     */
    protected array $services = [
        StartupServiceProvider::class,
    ];

    public function register(): void
    {
        $this->registerServices($this->services);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }

    private function registerServices(array $services): void
    {
        foreach ($services as $service) {
            $this->app->register($service);
        }
    }
}
