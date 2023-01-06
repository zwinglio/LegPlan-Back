<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        Route::bind('perspective', function ($value) {
            return \App\Models\Perspective::where('id', $value)->firstOrFail();
        });

        Route::bind('objective', function ($value, $route) {
            $perspective = $route->parameter('perspective');
            return \App\Models\Objective::where('id', $value)
            ->where('perspective_id', $perspective->id)
            ->firstOrFail();
        });

        Route::bind('initiative', function ($value, $route) {
            $objective = $route->parameter('objective');
            return \App\Models\Initiative::where('id', $value)
            ->where('objective_id', $objective->id)
            ->firstOrFail();
        });

        Route::bind('action', function ($value, $route) {
            $initiative = $route->parameter('initiative');
            return \App\Models\Action::where('id', $value)
            ->where('initiative_id', $initiative->id)
            ->firstOrFail();
        });

        Route::bind('task', function ($value, $route) {
            $action = $route->parameter('action');
            return \App\Models\Task::where('id', $value)
            ->where('action_id', $action->id)
            ->firstOrFail();
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
