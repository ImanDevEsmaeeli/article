<?php

namespace App\Listeners\Auth;

use App\Events\Auth\LoginUser;
use App\Mail\auth\UserLogin;
use App\Models\User;
use App\Sms\SmsServiceInterface;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

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

        Mail::to($event->user->email)->send(new  UserLogin([
            'userName' => $event->user->name,
            'userEmail' => $event->user->email,
            'userAgent' => '$request->userAgent()',
            'userIP' => '$request->getClientIp()',
        ]));

        $sms=resolve(SmsServiceInterface::class);
        $sms->send('09132256497','jkasghdfvgbak');
    }
}
