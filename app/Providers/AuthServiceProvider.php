<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Imanghafoori\HeyMan\Facades\HeyMan;

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

        //Check if Lab Techincian is logged in
        HeyMan::whenYouVisitUrl(['/home', '/asset', '/session', '/report', '/report/assets', '/report/complete', '/report/incomplete', '/logout'])
            ->youShouldBeLoggedIn()
            ->otherwise()
            ->redirect()
            ->to('/')
            ->with('Error','Asset added successfully!');
    }
}
