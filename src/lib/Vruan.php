<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/29
 * Time: 上午10:33
 */

namespace VictorRuan\lib;

use Slince\Di\Container;

class Vruan
{
    /**
     * @var Container
     */
    static $container;
    //方便在线统计用户信息
    static $user_map = [];
}
