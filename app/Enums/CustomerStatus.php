<?php

namespace App\Enums;
use BenSampo\Enum\Enum;


/**

 */
final class CustomerStatus extends Enum
{
    public const PROCESSING =   0;
    public const DELIVERED =   1;
    public const CANCELLED = 2;
}
