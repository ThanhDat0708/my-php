<?php
include "./include/common.php";
session_start();
if(is_post_method())
{
    //xác nhận dữ liệu
    $username=$_POST["username"]??"";
    $password=$_POST["password"]??"";
    //kiểm tra sự tồn tại username
    $sql="SELECT *FROM user WHERE username = ?";
    $data= db_select($sql, [$username]);
    if(count($data)== 0)
    {
        js_alert("Tên đăng nhập không hợp lệ or Mật khậur không đúng");
        js_redirect_to("login.php");
    }
    //dd($data);
    //kiểm tra password hợp lệ
    $hash_password = $data[0]["password"];
    if (password_verify($password,$hash_password)== false )
    {
        js_alert("Tên đăng nhập không hợp lệ or Mật khậur không đúng");
        js_redirect_to("login.php");
    }

    //đánh dấu đã đăng nhập
    $_SESSION["username"] = $data[0]["username"];
    //chuyển hướng
    redirect_to("index.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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
        <input type="submit" value="Đăng Nhập">
    </form>
        
</body>
</html>