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
        Gate::define('menejer',function($user){
            return count(array_intersect(["menejer"],json_decode($user->roles)));
    });
    $this->registerPolicies();
    Gate::define('kasir',function($user){
        return count(array_intersect(["kasir"],json_decode($user->roles)));
    });
    $this->registerPolicies();
    Gate::define('pelayan',function($user){
        return count(array_intersect(["pelayan"],json_decode($user->roles)));
    });
    }
    
}
