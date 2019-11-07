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
    <style>
        .login_wrapper {
            width: 500px;
            height: 400px;
            background: #ffffff;
            border-radius: 4px;
            margin: 0 auto;
            margin-top: 10%;
            padding: 10px 20px;
        }

        .register_login_wrapper {
            display: flex;
            align-items: center;
        }

        .register_text {
            color: #999;
            padding-bottom: 5px;
            cursor: pointer;
        }

        .login_text {
            color: #999;
            margin-left: 20px;
            padding-bottom: 5px;
            cursor: pointer;
        }

        .text_active {
            color: #000;
            border-bottom: 3px solid #000;
        }
    </style>
</head>
<body style="background: #3b8d99;">
<!--<form action="index.php/user/check_login" method="post">-->
<!--    <p>-->
<!--        用户名：<input type="text" name="name" id="loginName">-->
<!--        <span id="tip"></span>-->
<!--    </p>-->
<!--    <p>-->
<!--        密码：<input type="password" name="password">-->
<!--    </p>-->
<!--    <p>-->
<!--        <input type="submit" value="提交">-->
<!--    </p>-->
<!--</form>-->
<div class="login_wrapper">
    <div class="register_login_wrapper">
        <h2 class="register_text text_active" id="register_text">注册</h2>
        <h2 class="login_text" id="login_text">登陆</h2>
    </div>
    <form method="post" id="register_form">
        <p>
            电子邮箱 <input type="text" name="email" id="email">
            <span style="color: red;">*</span><span id="email_tip" style="color: red;"></span>
        </p>
        <p>
            姓名 <input type="text" name="username" id="username_reg">
        </p>
        <p>
            登陆密码 <input type="password" name="password" id="password_reg">
        </p>
        <p>
            密码确认 <input type="password" name="password2" id="password2_reg">
        </p>
        <p>
            性别 <input type="radio" name="sex" value="男" checked>男 <input type="radio" name="sex" value="女">女
        </p>
        <p>
            居住地区
            <select name="province" id="province_reg">
                <option value="">-请选择省份-</option>
                <option value="湖南">湖南</option>
            </select>
            <select name="city" id="city_reg">
                <option value="">-请选择城市-</option>
                <option value="长沙">长沙</option>
            </select>
        </p>
        <p>
            <input type="button" value="注册" id="reg_submit_btn">
        </p>
    </form>

    <form action="" method="post" id="login_form" style="display: none;">
        <p>
            电子邮箱 <input type="text" name="email_login" id="email_login">
        </p>
        <p>
            密码 <input type="password" name="password_login" id="password_login">
        </p>
        <p>
            <input type="button" value="登陆" id="login_submit_btn">
        </p>
    </form>

</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquerySession.js"></script>
<script>
    $.session.clear();
    $("#email").blur(function() {
        if (this.value == '') {
            $("#email_tip").text("电子邮箱不能为空");
        } else {
            $.get('index.php/user/check_email', {email: this.value}, function(data) {
                if (data == 'fail') {
                    $("#email_tip").text("该邮箱已存在");
                } else {
                    $("#email_tip").text("");
                }
            });
        }
    });
    $("#login_text").on('click', function() {
        $("#register_form").hide();
        $("#login_form").show();
        $("#register_text").removeClass('text_active');
        $("#login_text").addClass('text_active');
    });
    $("#register_text").on('click', function() {
        $("#register_form").show();
        $("#login_form").hide();
        $("#register_text").addClass('text_active');
        $("#login_text").removeClass('text_active');
    });
    $("#reg_submit_btn").on('click', function(){
        if ($("#email").val() == "") {
            alert('电子邮箱不能为空');
        } else if ($("#username_reg").val() == "") {
            alert('姓名不能为空');
        } else if ($("#password_reg").val() == "") {
            alert('登陆密码不能为空');
        } else if ($("#password2_reg").val() == "") {
            alert('密码确认不能为空');
        } else if ($("#province_reg").val() == "") {
            alert('省份不能为空');
        } else if ($("#city_reg").val() == "") {
            alert('城市不能为空');
        } else {
            $.post('index.php/user/do_register', {
                'email': $("#email").val(),
                'username': $("#username_reg").val(),
                'password': $("#password_reg").val(),
                'sex': $("input[name='sex']:checked").val(),
                'province': $("#province_reg").val(),
                'city': $("#city_reg").val()
            }, function(data) {
                if (data.status == 'success') {
                    alert('注册成功!');
                    window.location.reload();
                    $("#register_form").hide();
                    $("#login_form").show();
                    $("#register_text").removeClass('text_active');
                    $("#login_text").addClass('text_active');
                } else {
                    alert('注册失败!');
                }
            })
        }
    })
    $("#login_submit_btn").on('click', function() {
        if ($("#email_login").val() == "") {
            alert('电子邮箱不能为空');
        } else if ($("#password_login").val() == "") {
            alert('登陆密码不能为空');
        } else {
            $.post('index.php/user/check_login', {
                'email': $("#email_login").val(),
                'password': $("#password_login").val()
            }, function(data) {
                if (data.status == 'success') {
                    console.log('登陆成功!');
                    $.session.set('userdata', JSON.stringify(data.userdata));
                    window.location.href = 'index.php/admin/blog_index';
                } else {
                    alert('登陆失败!');
                }
            })
        }
    })
</script>
</body>
</html>