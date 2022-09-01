<?php

namespace App\Providers;

use App\Repo\GithubRepository;
use App\Repo\GithubRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(GithubRepositoryInterface::class, GithubRepository::class);
    }
}
