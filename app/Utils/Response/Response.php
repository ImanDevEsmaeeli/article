<?php

    namespace App\Utils\Response;


    use App\Enums\StatusCode;
    use App\Interfaces\IResponse;
    use Illuminate\Http\Resources\Json\JsonResource;
    use Illuminate\Http\JsonResponse;

    class Response implements IResponse
    {
        private int $code = StatusCode::SUCCESS->value;
        private ?string $status = null;
        private string $message = '';
        private JsonResource|array $data = [];

        public function reset(): void
        {
            $this->data = [];
            $this->status = null;
            $this->message = '';
            $this->code = StatusCode::SUCCESS->value;

        }

        public function success(string $message, JsonResource|array $data, string $status, int $code): JsonResponse
        {
            $this->reset();

            $this->message = $message;
            $this->data = $data;
            $this->status = $status;
            $this->code = $code;

            return $this->jsonStructure();
        }

        private function jsonStructure():JsonResponse
        {
            return response()->json([
                'status' => $this->status,
                'message' => $this->message,
                'data' => $this->data,
            ], $this->code);
        }
    }
