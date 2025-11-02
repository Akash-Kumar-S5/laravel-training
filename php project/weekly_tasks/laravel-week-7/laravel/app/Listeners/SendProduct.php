<?php

namespace App\Listeners;

use App\Events\ProductEvent;
use App\Jobs\SendProductJob;
use App\Mail\PostMail;
use Illuminate\Support\Facades\Mail;

class SendProduct
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductEvent $event): void
    {
        $post = $event->post;
        $user = $post->user;
        SendProductJob::dispatch($user,$post);
    }
}
