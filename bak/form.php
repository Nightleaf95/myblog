<?php
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $website = $remark = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "名字是必需的";
    } else {
        $name = text_input($_POST["name"]);
        // 检测名字是否只包含字母跟空格
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "只允许字母和空格";
        }
        echo $name;
    }

    if (empty($_POST["email"])) {
        $emailErr = "邮箱是必需的";
    } else {
        $email = test_input($_POST["email"]);
        // 检测邮箱是否合法
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            $emailErr = "非法邮箱格式";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
        // 检测 URL 地址是否合法
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = "非法的 URL 的地址";
        }
    }

    if (empty($_POST["remark"])) {
        $remark = "";
    } else {
        $remark = test_input($_POST["remark"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "性别是必需的";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}
function text_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
