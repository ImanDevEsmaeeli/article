<?php

	namespace App\Enums\Article;

	enum Status : string
	{
        case DRAFT ='draft';
        case VISIBLE='visible';
        case INVISIBLE='invisible';

        public static function values(): array
        {
            return [
                self::DRAFT->value,
                self::INVISIBLE->value,
                self::VISIBLE->value,
            ];
        }
	}
