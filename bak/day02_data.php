<?php
    $name = $_GET["name"];
    if($name == 'kevin') {
        echo '用户名已存在';
    } else {
        echo $name;
    }