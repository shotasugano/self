<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //role10(品質管理部)のみ許可
        Gate::define('qc', function ($user) {
            return ($user->role == 10);
          });
        //role5(開発部)のみ許可
        Gate::define('dv', function ($user) {
            return ($user->role == 5);
          });
        //role0,10( 営業と品管)のみ許可
        Gate::define('sl&qc', function ($user) {
            return ($user->role == 0 || $user->role = 10);
          });
        //role5,10( 開発と品管)のみ許可
        Gate::define('dv&qc', function ($user) {
          return ($user->role == 5 || $user->role = 10);
        });
        //role0,5,10(営業、開発部、品質管理部)どちらでも許可
        Gate::define('all', function ($user) {
            return ($user->role >= 0);
          });
    }
}
