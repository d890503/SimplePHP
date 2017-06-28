<?php
/**
 * Created by PhpStorm.
 * User: LuckyStarD
 * Date: 17/6/28
 * Time: 下午5:07
 */

class TestController
{
    /**
     * $template变量会保存与此控制器相关的"view(视图)"的文件名，不包括.php后缀
     */
    public $template = 'test';


    /**
     * 此方法为route.php默认调用
     *
     * @param array $getVars 传入到index.php的GET变量数组
     */
    public function main(array $getVars)
    {
        $testModel = new TestModel;
    }
}