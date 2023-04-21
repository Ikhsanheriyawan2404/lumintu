<?php

namespace App\Enums;

enum OrderStatusEnum:string
{
    case PENDING = 'pending';
    case PICKUP = 'pickup';
    case APPROVE = 'approve';
    case PROCESS = 'process';
    case DELIVERY = 'delivery';
    case DONE = 'done';

    public static function values(): array
    {
        return [
            OrderStatusEnum::PENDING,
            OrderStatusEnum::PICKUP,
            OrderStatusEnum::APPROVE,
            OrderStatusEnum::PROCESS,
            OrderStatusEnum::DELIVERY,
            OrderStatusEnum::DONE,
        ];
    }
}
