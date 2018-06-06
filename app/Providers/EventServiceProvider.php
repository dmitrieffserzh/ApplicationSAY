<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    public function boot() {
        parent::boot();
	    Event::listen(['main.content.story.view','main.content.news.view'] , 'App\Events\ViewPostHandler');
    }
}
