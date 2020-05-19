<?php

namespace App\Providers;

use App\Permission;
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

        Gate::define('backoffice', function ($user) {
            return count($user->role->permissions) != 0;
        });

        Gate::define('user-lecture', function ($user, $input) {
            $lecture = Permission::where('nom', 'LIKE', 'user-lecture-' . $input)->first()->id;
            $ecriture = Permission::where('nom', 'LIKE', 'user-ecriture-' . $input)->first()->id;
            return $user->role->permissions->contains($lecture) || $user->role->permissions->contains($ecriture);
        });

        Gate::define('user-ecriture', function ($user, $input) {
            $ecriture = Permission::where('nom', 'LIKE', 'user-ecriture-' . $input)->first()->id;
            return $user->role->permissions->contains($ecriture);
        });


        Gate::define('user-edit', function ($user) {
            $ecriture = Permission::where('nom', 'LIKE', 'user-ecriture-%')->first()->id;
            return $user->role->permissions->contains($ecriture);
        });



        Gate::define('candidat-lecture', function ($user, $input) {
            $lecture = Permission::where('nom', 'LIKE', 'candidat-lecture-' . $input)->first()->id;
            return $user->role->permissions->contains($lecture);
        });



        Gate::define('candidat-edit', function ($user) {
            $lecture = Permission::where('nom', 'LIKE', 'candidat-lecture-%')->first()->id;
            return $user->role->permissions->contains($lecture);
        });

        Gate::define('annonce', function ($user) {
            $annonce = Permission::where('nom', 'LIKE', '%annonce%')->first()->id;
            return $user->role->permissions->contains($annonce);
        });

        Gate::define('contact', function ($user) {
            $contact = Permission::where('nom', 'LIKE', '%contact%')->first()->id;
            return $user->role->permissions->contains($contact);
        });
        Gate::define('groupe', function ($user) {
            $groupe = Permission::where('nom', 'LIKE', '%groupe%')->first()->id;
            return $user->role->permissions->contains($groupe);
        });
    }
}
