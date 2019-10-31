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

echo "<div style='color:blue'>是心动啊!</div>";

echo "<form method='post' action='<?php ?>'>Name:<input type='text' /><input type='submit' /></form>";