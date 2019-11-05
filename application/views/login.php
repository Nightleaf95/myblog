<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    项目的基准路径 (目前为：127.0.0.1/myblog/index.php)-->
    <base href="<?php echo site_url(); ?>">
    <title>Document</title>
</head>
<body>
<form action="index.php/user/check_login" method="post">
    <p>
        用户名：<input type="text" name="name" id="loginName">
        <span id="tip"></span>
    </p>
    <p>
        密码：<input type="password" name="password">
    </p>
    <p>
        <input type="submit" value="提交">
    </p>
</form>
</body>
</html>