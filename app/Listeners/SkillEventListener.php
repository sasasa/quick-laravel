<?php

namespace App\Listeners;

use App\Events\SkillEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SkillNotification;

class SkillEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SkillEvent  $event
     * @return void
     */
    public function handle(SkillEvent $event)
    {
        $name = $event->user->name;
        $text = implode(",", $event->skills). 'スキル更新されたのでイベントリスナーを使ってメール送信';
        $to = $event->user->email;
        Mail::to($to)->send(new SkillNotification($name, $text));
    }
}
