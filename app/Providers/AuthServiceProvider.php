<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate Authorization
        Gate::define('dashboard', function ($user) {
            return count(array_intersect(["Admin", "Staff"], json_decode($user->roles)));
        });

        Gate::define('manage-users', function ($user) {
            return count(array_intersect(["Admin"], json_decode($user->roles)));
        });

        Gate::define('manage-instructors', function ($user) {
            return count(array_intersect(["Admin", "Staff"], json_decode($user->roles)));
        });

        Gate::define('manage-categories', function ($user) {
            return count(array_intersect(["Admin", "Staff"], json_decode($user->roles)));
        });

        Gate::define('manage-courses', function ($user) {
            return count(array_intersect(["Admin", "Staff"], json_decode($user->roles)));
        });

        Gate::define('manage-enrollments', function ($user) {
            return count(array_intersect(["Admin", "Staff"], json_decode($user->roles)));
        });

        Gate::define('manage-articles', function ($user) {
            return count(array_intersect(["Admin", "Staff"], json_decode($user->roles)));
        });

        Gate::define('manage-contents', function ($user) {
            return count(array_intersect(["Admin", "Staff"], json_decode($user->roles)));
        });
    }
}
