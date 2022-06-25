<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\PricedItem;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        Gate::define('view-client', function (User $user, Client $client) {
            return $user->id === $client->user_id
                ? Response::allow()
                : Response::deny('You dont have access to this client');
        });
        Gate::define('edit-client', function (User $user, Client $client) {;
            return $user->id === $client->user_id
                ? Response::allow()
                : Response::deny('You dont have access to this client');
        });

        Gate::define('view-quote', function (User $user, Quote $quote) {;
            return $user->id === $quote->user_id
                ? Response::allow()
                : Response::deny('You dont have access to this quote');
        });

        Gate::define('edit-quote', function (User $user,  Quote $quote) {;
            return $user->id === $quote->user_id
                ? Response::allow()
                : Response::deny('You dont have access to this quote');
        });

        Gate::define('view-item', function (User $user, PricedItem $priceditem) {;
            return $user->id === $priceditem->user_id
                ? Response::allow()
                : Response::deny('You dont have access to this item');
        });

        Gate::define('edit-item', function (User $user,  PricedItem $priceditem) {;
            return $user->id === $priceditem->user_id
                ? Response::allow()
                : Response::deny('You dont have access to this item');
        });
    }
}
