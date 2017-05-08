<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/8
 * Time: 15:47
 * Copyright:EastSea
 */

namespace SIWF\Filter;


class CacheResult
{
    public function isHint($text)
    {
        return !!$text;
    }
}