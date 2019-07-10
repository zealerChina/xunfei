<?php

namespace Fuying\Xunfei\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * 讯飞门面
 */
class XunfeiFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'xunfei';
    }
}
