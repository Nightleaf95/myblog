
<?php
    $music = isset($_GET['music']) ? htmlspecialchars($_GET['music']) : '';
    if ($music) {
        if ($music == 'Lee') {
            echo "李宇春";
        } else if ($music == 'Kong') {
            echo "空空";
        } else if ($music == 'Levis') {
            echo "李维斯";
        }
    } else {
        ?>
        <form action="" method="get">
            <select name="music">
                <option value="">请选择音乐人</option>
                <option value="Lee">Lee</option>
                <option value="Kong">Kong</option>
                <option value="Levis">Levis</option>
            </select>
            <input type="submit" value="提交">
        </form>
        <?php
    }
?>


<?php
$q = isset($_POST['q'])? $_POST['q'] : '';
if(is_array($q)) {
    $sites = array(
        'RUNOOB' => '菜鸟教程: http://www.runoob.com',
        'GOOGLE' => 'Google 搜索: http://www.google.com',
        'TAOBAO' => '淘宝: http://www.taobao.com',
    );
    foreach($q as $val) {
        // PHP_EOL 为常量，用于换行
        echo $sites[$val] . PHP_EOL;
    }

} else {
    ?>
    <form action="" method="post">
        <select multiple="multiple" name="q[]">
            <option value="">选择一个站点:</option>
            <option value="RUNOOB">Runoob</option>
            <option value="GOOGLE">Google</option>
            <option value="TAOBAO">Taobao</option>
        </select>
        <input type="submit" value="提交">
    </form>
    <?php
}
?>

<?php
    echo date("Y-m-d");
?>
