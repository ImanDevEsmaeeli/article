<?php

	namespace App\Sms\SaharSms;

	use App\Sms\SmsServiceInterface;
    use Illuminate\Support\Facades\Log;

    class SaharSmsService implements SmsServiceInterface
	{

        public function send(string $phone, string $text): void
        {
            Log::info('send sms by SaharSms');
        }
    }
