<?php

namespace Vadiasov\RolesAdmin;

use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        require __DIR__ . '/Http/routes.php';
        $this->loadViewsFrom(__DIR__ . '/views', 'roles-admin');
        $this->publishes([
            __DIR__.'/seeds' => database_path('seeds'),
            __DIR__.'/migrations' => database_path('migrations'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Vadiasov\RolesAdmin\Http\RolesController');
        $this->app->make('Vadiasov\RolesAdmin\Http\RoleRequest');
    }
}
