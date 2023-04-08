<?php

namespace App\Enums;

enum OrderStatusEnum:string
{
    case PENDING = 'pending';
    case APPROVE = 'approve';
    case PICKUP = 'pickup';
    case PROCESS = 'process';
    case DELIVERY = 'delivery';
    case DONE = 'done';

    public static function values(): array
    {
        return [
            OrderStatusEnum::PENDING,
            OrderStatusEnum::APPROVE,
            OrderStatusEnum::PICKUP,
            OrderStatusEnum::PROCESS,
            OrderStatusEnum::DELIVERY,
            OrderStatusEnum::DONE,
        ];
    }
}
