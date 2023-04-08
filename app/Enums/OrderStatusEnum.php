<?php

namespace App\Enums;

enum OrderStatusEnum:string
{
    case PENDING = 'pending';
    case APPROVE = 'approve';
}
