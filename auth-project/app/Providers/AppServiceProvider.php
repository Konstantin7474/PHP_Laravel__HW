<?php

namespace App\Providers;

use App\Policies\UserPolicy;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{

    protected $policies = [
        User::class => UserPolicy::class,
    ];
}
