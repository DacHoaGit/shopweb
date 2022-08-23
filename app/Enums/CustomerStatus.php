<?php

namespace App\Enums;
use BenSampo\Enum\Enum;


/**

 */
final class CustomerStatus extends Enum
{
    public const UNPAID =   0;
    public const PROCESSING =   1;
    public const DELIVERED =   2;
    public const CANCELLED = 3;
}
