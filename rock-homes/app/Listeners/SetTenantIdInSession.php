<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Session;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetTenantIdInSession
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // session(['tenant_id' => $event->user->tenant_id]);
        // $_SESSION["tenant_id"] = $event->user->tenant_id;
        Session::put('tenant_id', $event->user->tenant_id);
        // session()->put('tenant_id', $event->user->tenant_id);
    }
}
