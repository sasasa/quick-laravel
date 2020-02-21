<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class SendEmailVerificationEventListener extends SendEmailVerificationNotification implements ShouldQueue
{

}
