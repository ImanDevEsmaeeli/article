<?php

	namespace App\Facades;

	use Illuminate\Http\Resources\Json\JsonResource;
    use Illuminate\Support\Facades\Facade;
    use Illuminate\Http\JsonResponse;
    use App\Utils\Response\Response as UtilsResponse;
    /**
     * @method static JsonResponse success(string $message, JsonResource|array $data, string $status, int $code)
     * @see UtilsResponse
     */
    class Response extends BaseFacade
	{
        protected static $cached=false;
	}
