<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Events\PageDeletedEvent;
use App\Notifications\PageDeleted;

class PageDeletedEmailNotification
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
     * @param  \App\Events\PageDeletedEvent  $event
     * @return void
     */
    public function handle(PageDeletedEvent $event)
    {
        $content = $event->page->title . ' is deleted';
        Mail::to('glend.maatita@gmail.com')->send(new PageDeleted($content));
    }
}