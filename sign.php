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
        js_redirect_to("sign.php");
    }
    //kiemtra ten dang nhap co trung hay khong 
    $sql= "SELECT * FROM user where username= ?";
    $data= db_select($sql, [$username]);
    if (count($data)> 0)
    {
        js_alert("Tên đăng nhập đã được sử dụng, Vui lòng tạo tên đăng nhập");
        js_redirect_to("sign.php");
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
<form method="Post">
<div>
<h1>Đăng Nhập</h1>
</div>
<label for="">Tên Đăng Nhập</label>
<input name="username" type="text">
<br>
<label for="">Mật Khẩu</label>
<input name="password" type="number">
<br>
<label for="">Xác Nhận Mật Khẩu</label>
<input name="cf_password" type="number">
<input type="submit" value="Đăng Nhập">
</form>
</body>
</html>