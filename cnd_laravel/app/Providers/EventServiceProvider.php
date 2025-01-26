<?php

namespace App\Providers;

use App\Domains\Contact\Models\ContactFormSubmission;
use App\Domains\Contact\Observers\ContactFormSubmissionObserver;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        ContactFormSubmission::observe(ContactFormSubmissionObserver::class);
    }
}
