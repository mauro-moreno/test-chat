<?php


namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class AdminRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers\Admin';

    public function map()
    {
        Route::prefix('admin')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));
    }
}
