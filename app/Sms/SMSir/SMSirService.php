<?php

	namespace App\Sms\SMSir;

	use App\Sms\SmsServiceInterface;
    use Illuminate\Support\Facades\Log;

    class SMSirService implements SmsServiceInterface
	{

        public function send(string $phone, string $text): void
        {
            Log::info('send sms by SMSir');
        }
    }
