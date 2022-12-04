<?php

namespace App\Providers;

//use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // //auth hanya manhattan
        // Get::define('isManhattan', function($user) {
        //     return $user->location == 'Manhattan';
        // });

        //  //auth hanya ketapang
        // Get::define('isKetapang', function($user) {
        //     return $user->location == 'Ketapang';
        // });


    }
}
