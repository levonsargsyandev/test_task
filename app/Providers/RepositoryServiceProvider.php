<?php

namespace App\Providers;

use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Company\CompanyRepository;
use App\Repositories\Company\CompanyRepositoryInterface;
use App\Repositories\Employe\EmployeRepository;
use App\Repositories\Employe\EmployeRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CommentRepositoryInterface::class, function () {
            return new CommentRepository();
        });
        $this->app->singleton(CompanyRepositoryInterface::class, function () {
            return new CompanyRepository();
        });
        $this->app->singleton(EmployeRepositoryInterface::class, function () {
            return new EmployeRepository();
        });
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
}
