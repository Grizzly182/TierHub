<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use SocialiteProviders\GitHub\Provider as GitHubProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\VKontakte\Provider as VkontakteProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('update-user', function(User $user, User $model) {
            return $user->id === $model->id;
        });

        Gate::define('delete-user', function(User $user, User $model) {
            return $user->id === $model->id;
        });

        
        
        Event::listen(function (SocialiteWasCalled $event) {
            $event->extendSocialite('vkontakte', VkontakteProvider::class);
        });
        Event::listen(function (SocialiteWasCalled $event) {
            $event->extendSocialite('github', GitHubProvider::class);
        });
    }
}
