<?php

	namespace App\Enums\Sms;

	enum SmsServices : string
	{
        case SMS_IR='SMSir';
        case KAVEH_NEGAR='KavehNegar';
        case SAHAR_SMS='SaharSms';

        public static function values(): array
        {
            return [
                self::SMS_IR->value,
                self::SAHAR_SMS->value,
                self::KAVEH_NEGAR->value,
            ];
        }


	}
