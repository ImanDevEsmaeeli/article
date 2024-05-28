<?php

    namespace App\Enums;

    enum StatusCode: int
    {
        case SUCCESS = 200;
        case CREATED = 201;
        case BAD_REQUEST = 400;
    }
