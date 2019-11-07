<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    项目的基准路径 (目前为：127.0.0.1/myblog/index.php)-->
    <base href="<?php echo site_url(); ?>">
    <title>YeKaiQi's blog</title>
</head>
<body>
<h1><span id="username"></span>的博客主页</h1>
<input type="button" value="设置分类" id="set_blog_type">
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquerySession.js"></script>
<script>
    var userdata;
    if ($.session.get('userdata')) {
        userdata = JSON.parse($.session.get('userdata'));
    } else {
        window.location.href = 'index.php/user/login';
    }
    $("#username").text(userdata.username);
    $("#set_blog_type").on('click', function(){
        window.location.href = 'index.php/admin/blog_type';
    })
</script>
</body>
</html>