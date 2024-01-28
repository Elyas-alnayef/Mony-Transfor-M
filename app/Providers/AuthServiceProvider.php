<?php

namespace App\Providers;

use App\Models\Point;
use App\Models\T_Archive;
use App\Models\User;
use App\Policies\PointPolicy;
use App\Policies\T_ArchivePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class=>UserPolicy::class,
        Point::class=>PointPolicy::class,
        T_Archive::class=>T_ArchivePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
