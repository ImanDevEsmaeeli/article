<?php

namespace App\Listeners\Auth;

use App\Events\Auth\LoginUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetLastLogin
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
    public function handle(LoginUser $event): void
    {
		User::whereEmail($event->user->email)->update([
			'last_login'=>Carbon::now(),
		]);
    }
}
