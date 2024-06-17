<?php

    namespace App\Providers;

    use App\Enums\Sms\SmsServices;
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
                case SmsServices::KAVEH_NEGAR->value :
                    $this->app->singleton(SmsServiceInterface::class, KavehNegarService::class);
                    break;
                case SmsServices::SMS_IR->value:
                    $this->app->singleton(SmsServiceInterface::class, SMSirService::class);
                    break;
                case SmsServices::SAHAR_SMS->value:
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
