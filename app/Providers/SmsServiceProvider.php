<?php

    namespace App\Providers;

    use App\Sms\KavehNegar\KavehNegarService;
    use App\Sms\SaharSms\SaharSmsService;
    use App\Sms\SMSir\SMSirService;
    use App\Sms\SmsServiceInterface;
    use Illuminate\Support\ServiceProvider;

    class SmsServiceProvider extends ServiceProvider
    {
        /**
         * Register services.
         */
        public function register(): void
        {
            $driver = config('sms.driver');

            switch ($driver) {
                case 'KavehNegar':
                    $this->app->singleton(SmsServiceInterface::class, KavehNegarService::class);
                    break;
                case 'SMSir':
                    $this->app->singleton(SmsServiceInterface::class, SMSirService::class);
                    break;
                case 'SaharSms':
                    $this->app->singleton(SmsServiceInterface::class, SaharSmsService::class);
                    break;
            }
        }

        /**
         * Bootstrap services.
         */
        public function boot(): void
        {
            //
        }
    }
