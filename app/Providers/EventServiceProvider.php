<?php

namespace App\Providers;

use App\Events\NoBikes;
use App\Events\MoreBikes;
use App\Events\UserCreated;
use App\Events\UserDeleted;
use App\Events\FirstBikeCreated;
use App\Events\OneThousandVisits;
use App\Listeners\SendWarningNoBikes;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendWarningUserDeleted;
use App\Listeners\SendCreatedUserNotification;
use App\Listeners\SendMoreBikesCongratulation;
use App\Listeners\SendFirstBikeCreatedCongratulation;
use App\Listeners\SendOneThousandVisitsCongratulation;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserCreated::class => [
            SendCreatedUserNotification::class
        ],
        OneThousandVisits::class =>[
            SendOneThousandVisitsCongratulation::class
        ],
        FirstBikeCreated::class =>[
            SendFirstBikeCreatedCongratulation::class
        ],
        UserDeleted::class =>[
            SendWarningUserDeleted::class
        ],
        NoBikes::class =>[
            SendWarningNoBikes::class
        ],
        MoreBikes::class =>[
            SendMoreBikesCongratulation::class
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
