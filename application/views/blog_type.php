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
        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="blog_type_wrapper">
    <input type="button" value="退出登陆" id="quit_login">
    <div class="add_type_wrapper">
        <h4>添加博客分类</h4>
        <div class="add_blog_type">
            <span>分类名称：</span>
            <input type="text" name="type_name" id="blog_type_name">
            <span>排序值：</span>
            <input type="number" min="0">
            <input type="button" value="添加" id="add_blog_type_btn">
        </div>
    </div>

    <div class="type_wrapper">
        <h4>博客分类 (点击分类名称编辑)</h4>
        <table cellspacing="1" cellpadding="1" border="1" id="blog_type_table">
            <tr>
                <th>序号</th>
                <th>分类名</th>
                <th>文章</th>
                <th>操作</th>
            </tr>
        </table>
    </div>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquerySession.js"></script>
<script>
    var CODE = 200;
    var userdata;
    if ($.session.get('userdata')) {
        userdata = JSON.parse($.session.get('userdata'));
    } else {
        window.location.href = 'index.php/user/login';
    }
    $.get('index.php/admin/search_blog_type', {
        'userid': userdata.user_id
    }, function(data) {
        if (data.code === CODE) {
            var html = "";
            for (let i = 0; i < data.typelist.length; i++) {
                html += "<tr><td>"+ (i+1) +"</td><td>"+ data.typelist[i].type_name +"</td><td>0</td><td>修改 删除</td></tr>"
            }
            $("#blog_type_table").append(html);
        }
    });

    $("#add_blog_type_btn").on('click', function() {
        let add_blog_name = $("#blog_type_name").val();
        $.post('index.php/admin/add_blog_type', {
            'type_name': add_blog_name,
            'user_id': userdata.user_id
        }, function(data) {
            if (data.code == CODE) {
                $.get('index.php/admin/search_blog_type', {
                    'userid': userdata.user_id
                }, function(data) {
                    if (data.code === CODE) {
                        var html = "";
                        html += "<tr><th>序号</th><th>分类名</th><th>文章</th><th>操作</th></tr>";
                        for (let i = 0; i < data.typelist.length; i++) {
                            html += "<tr><td>"+ (i+1) +"</td><td>"+ data.typelist[i].type_name +"</td><td>0</td><td>修改 删除</td></tr>"
                        }
                        $("#blog_type_table").html(html);
                        $("#blog_type_name").val("");
                    }
                });
            } else {
                alert('添加失败!');
            }
        })
    });
    $("#quit_login").on('click', function() {
        window.location.href = 'index.php/user/login';
    })
</script>
</body>
</html>