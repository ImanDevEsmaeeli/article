<?php

	namespace App\Sms;

	interface SmsServiceInterface
	{
        public function send(array|string $phone,string $text);
	}
