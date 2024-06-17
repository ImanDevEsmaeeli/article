<?php

	namespace App\Sms\KavehNegar;

	use App\Sms\SmsServiceInterface;
    use Illuminate\Support\Facades\Log;

    class KavehNegarService implements SmsServiceInterface
	{

        public function send(string $phone, string $text): void
        {
            Log::info("send sms to $phone with message:$text by kavehNegar");
        }
    }
