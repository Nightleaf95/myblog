<?php
$a = 3;
$b = 1;
function text()
{
    echo $GLOBALS['a'] - $GLOBALS['b'];
    print $GLOBALS['a'] - $GLOBALS['b'];
}

text();

$name = "kevin";
$a = <<<EOF
   $name<br><a href="https://www.baidu.com">html格式会被解析</a><br/>双引号和Html格式外的其他内容都不会被解析
"双引号外所有被排列好的格式都会被保留"
"但是双引号内会保留转义符的转义效果,比如table:\t和换行：\n下一行"
EOF;

echo $a;

//$x = 10.365;
//var_dump($x);
//echo "<br>";
//$x = 2.4e3;
//var_dump($x);
//echo "<br>";
//$x = 8E-5;
//var_dump($x);

class Car
{
    var $color;

    function __construct($color = "green")
    {
        $this->color = "red";
    }

    function what_color()
    {
        return $this->color;
    }
}

function print_vars($obj)
{
    foreach (get_object_vars($obj) as $prop => $val) {
        echo "\t$prop = $val\n";
    }
}

// 实例一个对象
$herbie = new Car("green");

// 显示 herbie 属性

echo "\therbie: Properties\n";
echo PHP_EOL;
print_vars($herbie);

define('name', 'welcome my world', true);

echo NAME;

$aa = 'xxx';
$bb = 'yyy';
echo $aa . " " . $bb;
echo strlen($aa . " " . $bb);
echo strpos("maybe it's xxx + yyy", 'xxx');

echo intdiv(24, 5);

echo PHP_EOL;
date_default_timezone_set("Asia/Shanghai");
$t = date("h");
echo $t;
if ($t > "3") {
    echo "Have a good day!";
} else {
    echo "afternoon!";
}

$color = "white";

switch ($color) {
    case "red":
        echo "你选择的是红色";
        break;
    case "blue":
        echo "你选择的是蓝色";
        break;
    case "black":
        echo "你选择的是黑色";
        break;
    default:
        echo "你没有选择颜色";
}

$cars = array("volvo", "geelya", "bench");
echo $cars[2];
echo count($cars);
echo "<br>";

for ($index = 0; $index < count($cars); $index++) {
    echo $cars[$index];
    echo "<br>";
}
echo "<br>";

$array1 = array("volvo" => "20W", "geelya" => "8W", "bench" => "50W");

foreach ($array1 as $a => $a_value) {
    echo "车型:" . $a . " 价格:" . $a_value;
    echo "<br>";
}

echo "<br>";

//class Site {
//    var $url;
//    var $title;
//
//    function setUrl($part){
//        $this->url = $part;
//    }
//
//    function getUrl(){
//        echo $this->url . PHP_EOL;
//    }
//
//    function setTitle($part){
//        $this->title = $part;
//    }
//
//    function getTitle(){
//        echo $this->title . PHP_EOL;
//    }
//}
//
//$runoob = new Site;
//$taobao = new Site;
//$google = new Site;
//
//$runoob->setTitle('菜鸟联盟');
//$runoob->getTitle();
//
//$taobao->setUrl('www.taobao.com');
//$taobao->getUrl();


//构造函数
//class Site {
//    var $url;
//    var $title;
//
//    function __construct($part1, $part2){
//        $this->url = $part1;
//        $this->title = $part2;
//    }
//
//    function getTitle(){
//        echo $this->title . PHP_EOL;
//    }
//
//    //析构函数
//    function __destruct()
//    {
//        echo "我是析构函数" . $this->title . PHP_EOL;
//    }
//}
//
//$idiot = new Site('www.idiot.com', '拳头联盟');
//$idiot->getTitle();


class text1
{
    public $public = 'public'; //公有
    protected $protected = 'protected'; //受保护
    private $private = 'private'; //私有

    function printInfo()
    {
        echo $this->public . PHP_EOL;
        echo $this->protected . PHP_EOL;
        echo $this->private . PHP_EOL;
    }
}

$obj = new text1();
echo $obj->printInfo(); //输出 Public、Protected 和 Private
echo $obj->public; //输出 Public
echo "<br>";

//继承父类
class text2 extends text1
{
//    protected $protected = 'protected2';
    function printInfo()
    {
        echo $this->public . PHP_EOL;
        echo $this->protected . PHP_EOL;
    }
}

$obj2 = new text2();
echo $obj2->printInfo();

$a = array();
if ($a[1]) null;
echo count($a), "\n";