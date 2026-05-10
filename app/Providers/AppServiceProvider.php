<?php

namespace App\Providers;

use App\Interface\ClassificationStrategyInterface;
use App\Interface\UKClassificationStrategy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClassificationStrategyInterface::class, UKClassificationStrategy::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
