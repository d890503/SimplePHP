<?php
/**
 * Created by PhpStorm.
 * User: LuckyStarD
 * Date: 17/6/28
 * Time: 下午3:55
 */

//应用的根目录就是index.php的父目录
define("SERVER_ROOT", dirname(__FILE__));

//你的域名.comm 是你的服务器域名
define('SITE_ROOT' , 'http://example.com');


ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

/**
 * 引入router.php
 */
require_once(SERVER_ROOT . '/controllers/' . 'route.php');