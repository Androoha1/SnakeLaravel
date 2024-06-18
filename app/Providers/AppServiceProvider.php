<?php
// app/Providers/AuthServiceProvider.php
namespace App\Providers;

use App\Models\Player;
use App\Policies\PlayerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Player::class => PlayerPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
