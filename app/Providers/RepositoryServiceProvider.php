<?php

namespace VulpeProject\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\VulpeProject\Contracts\Clients\ClientRepository::class, \VulpeProject\Repositories\Clients\ClientRepositoryEloquent::class);

        $this->app->bind(\VulpeProject\Contracts\Projects\ProjectRepository::class, \VulpeProject\Repositories\Projects\ProjectRepositoryEloquent::class);
        //:end-bindings:
    }
}
