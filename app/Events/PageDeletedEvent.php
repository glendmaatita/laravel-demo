<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\Page;

class PageDeletedEvent
{
    use SerializesModels;

    public $page;

    /**
     * Create a new event instance.
     *
     * @param  \App\Page  $page
     * @return void
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }
}