<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Redis;

return [

    'aliases' => Facade::defaultAliases()->merge([
        'Redis' => Redis::class,
    ])->toArray(),

];
