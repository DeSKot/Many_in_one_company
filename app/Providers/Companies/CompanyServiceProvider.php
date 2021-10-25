<?php

namespace App\Providers\Companies;

use Illuminate\Support\ServiceProvider;
use App\Services\Companies\CompanyService;
use App\Interfaces\Companies\CompanyServiceInterface;

class CompanyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public $singletons = [
        CompanyServiceInterface::class => CompanyService::class,
    ];
}
