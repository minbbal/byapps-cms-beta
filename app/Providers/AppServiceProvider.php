<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      if ($this->app->environment() !== 'production') {
          \Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
              \Log::channel('sql')->info([
              'sql' => $query->sql,
              'bindings' => $query->bindings,
              'time' => $query->time,
              ]);
          });
      }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
