<?php

namespace App\Providers;

use App\Interfaces\StudentCandidateTempRepositoryInterface;
use App\Repositories\StudentCandidateTempRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StudentCandidateTempRepositoryInterface::class, StudentCandidateTempRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
