<?php
/**
 * Created by PhpStorm.
 * User: LuckyStarD
 * Date: 17/6/28
 * Time: 下午4:49
 */




//当类初始化时，自动引入相关文件
function __autoload($className)
{

    //list($filename , $suffix) = preg_split("/(?=[A-Z])/", $className);
    //构成文件路径
    $file = SERVER_ROOT . '/models/' . strtolower($className) . '.php';

    //获取文件
    if (file_exists($file))
    {
        //引入文件
        include_once($file);
    }
    else
    {
        //文件不存在
        die("File '$className' containing class '$className' not found.");
    }
}


//获取所有请求
$request = $_SERVER['QUERY_STRING'];

//解析$request变量，得到用户请求的页面（page1）和其它GET变量（&分隔的变量）
//如一个请求http://你的域名.com/index.php?page1&article=buildawebsite,
//则被解析为array("page1", "article=buildawebsite")
$parsed = explode('&' , $request);


//用户请求的页面，如上面的page1，为$parsed第一个变量,shift之后，数组为array("article=buildawebsite")
$page = array_shift($parsed);


//剩下的为GET变量，把它们解析出来
$getVars = array();
foreach ($parsed as $argument) {
    //用"="分隔字符串，左边为变量，右边为值
    list($variable, $value) = explode('=', $argument);
    $getVars[$variable] = $value;
}



//构成控制器文件路径
$target = SERVER_ROOT . '/controllers/' . $page . 'Controller.php';
//引入目标文件
if (file_exists($target))
{
    include_once($target);

    //修改page变量，以符合命名规范（如$page="news"，我们的约定是首字母大写，控制器的话就在后面加上“<strong>_Controller”</strong>,即News_Controller）
    $class = ucfirst($page) . 'Controller';
    
    //初始化对应的类
    if (class_exists($class))
    {
        $controller = new $class;
    }
    else
    {
        //类的命名正确吗？
        die('class does not exist!');
    }
}
else
{
    //不能在controllers找到此文件
    die('page does not exist!');
}

//一但初始化了控制器，就调用它的默认函数main();
//把get变量传给它
$controller->main($getVars);