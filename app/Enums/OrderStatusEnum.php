<?php

namespace App\Enums;

enum OrderStatusEnum:string
{
    case PENDING = 'pending';
    case PICKUP = 'pickup';
    case PROCESS = 'process';
    case DELIVERY = 'delivery';
    case DONE = 'done';

    public static function values(): array
    {
        return [
            OrderStatusEnum::PENDING,
            OrderStatusEnum::PICKUP,
            OrderStatusEnum::PROCESS,
            OrderStatusEnum::DELIVERY,
            OrderStatusEnum::DONE,
        ];
    }
}
