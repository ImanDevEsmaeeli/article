<?php

	namespace App\Sms;

	class Sms
	{
        public static function send(array|string $phone,string $text): void
        {
            $sms=resolve(SmsServiceInterface::class);
            $sms->send($phone,$text);
        }
	}
