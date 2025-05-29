<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Laravel\Passport\Bridge\AccessTokenRepository;
use Laravel\Passport\Bridge\RefreshTokenRepository;
use Laravel\Passport\Bridge\UserRepository;
use League\OAuth2\Server\AuthorizationServer;
use Laravel\Passport\Bridge\ClientRepository;
use Laravel\Passport\Bridge\ScopeRepository;
use Laravel\Passport\Bridge\PersonalAccessGrant;
use Laravel\Passport\Bridge\PasswordGrant;
use League\OAuth2\Server\Grant\PasswordGrant as LeaguePasswordGrant;
use DateInterval;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPasswordGrant();
        // (new RouteRegistrar(app('router')))->all();
    }
    protected function registerPasswordGrant(): void
    {
        app(AuthorizationServer::class)->enableGrantType(
            $this->makePasswordGrant(), new DateInterval('PT1H') // 1 hour access tokens
        );
    }

    protected function makePasswordGrant(): LeaguePasswordGrant
    {
        $grant = new LeaguePasswordGrant(
            app(UserRepository::class),
            app(RefreshTokenRepository::class)
        );

        $grant->setRefreshTokenTTL(new DateInterval('P1M')); // 1 month refresh tokens

        return $grant;
    }

}
