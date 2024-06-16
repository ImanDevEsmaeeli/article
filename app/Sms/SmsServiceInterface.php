<?php

	namespace App\Sms;

	interface SmsServiceInterface
	{
        public function send(string $phone,string $text);
	}
