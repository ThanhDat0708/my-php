<?php
include "include/common.php";
if (is_post_method())
{
    $username=$_POST["username"] ?? "";
    $password=$_POST["password"] ?? "";
    $cf_password=$_POST["cf_password"] ?? "";
    //so sanh mk neu sai thi hien ra tb
    if ($password != $cf_password)
    {
        js_alert("Mật Khẩu không Khớp");
        js_redirect_to("account.php");
    }
    //kiemtra ten dang nhap co trung hay khong 
    $sql= "SELECT * FROM user where username= ?";
    $data= db_select($sql, [$username]);
    if (count($data)> 0)
    {
        js_alert("Tên đăng nhập đã được sử dụng, Vui lòng tạo tên đăng nhập");
        js_redirect_to("account.php");
    }
    //hash matkhau
    //$password=md5($password);dùng không an toàn nên đã thay đổi
    $password=password_hash($password, PASSWORD_BCRYPT);
    //them tai khoan
    $sql="INSERT INTO user(username,password) VALUES(?, ?)";
    db_execute($sql, [$username,$password]);
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="Post">
<div style="text-align: center; margin-top: 50px;">
    <h1>Đăng Kí Tài Khoản</h1>
    <form method="Post" style="display: inline-block; text-align: left;">
        <label for="username">Tên Đăng Nhập</label>
        <input name="username" type="text" style="width: 100%; padding: 8px; margin: 8px 0;">
        <br>
        <label for="password">Mật Khẩu</label>
        <input name="password" type="password" style="width: 100%; padding: 8px; margin: 8px 0;">
        <br>
        <label for="cf_password">Xác Nhận Mật Khẩu</label>
        <input name="cf_password" type="password" style="width: 100%; padding: 8px; margin: 8px 0;">
        <br>
        <input type="submit" value="Đăng Nhập" style="width: 100%; padding: 10px; background-color: #4CA; color: white; border: none; cursor: pointer;">
    </form>
</div>

</body>
</html>