<?php

	namespace App\Facades;

	use Illuminate\Support\Facades\Facade;

    class BaseFacade extends Facade
	{
        protected static function getFacadeAccessor(): string
        {
            return 'facade.response';
        }

        public static function run($class): void
        {
            app()->singleton(self::getFacadeAccessor(),$class);
        }
	}
