<?php

namespace App\Providers;

use App\Services\Newsletter;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // app()->bind(Newsletter::class, function(){
        //     $client = (new ApiClient())->setConfig([
        //         'apiKey' => config('services.mailchimp.key'),
        //         'server' => 'us13'
        //     ]);

        //     return new Newsletter($client);
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useTailwind();
    }
}
