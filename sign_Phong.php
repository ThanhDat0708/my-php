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
        js_redirect_to("sign_Phong.php");
    }
    //dd($data);
    //kiểm tra password hợp lệ
    $hash_password = $data[0]["password"];
    if (password_verify($password,$hash_password)== false )
    {
        js_alert("Tên đăng nhập không hợp lệ or Mật khẩu không đúng");
        js_redirect_to("sign_Phong.php");
    }

    //đánh dấu đã đăng nhập
    $_SESSION["username"] = $data[0]["username"];
    //chuyển hướng
    redirect_to("menu.php");

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
              <style>           
                body {
                    background-image: url("https://hoanghamobile.com/tin-tuc/wp-content/uploads/2024/07/hinh-anh-giang-sinh-cute.jpg");
                    background-repeat: no-repeat;
                    background-size: cover;
                    font-family: Arial, sans-serif;
                    background-color: #f0f0f0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                form {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    width: 300px;
                }
                h1 {
                    margin-bottom: 20px;
                    font-size: 24px;
                    text-align: center;
                }
                label {
                    display: block;
                    margin-bottom: 5px;
                    font-weight: bold;
                }
                input[type="text"], input[type="number"] {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }
                input[type="submit"] {
                    width: 100%;
                    padding: 10px;
                    background-color: #007BFF;
                    border: none;
                    border-radius: 4px;
                    color: white;
                    font-size: 16px;
                    cursor: pointer;
                }
                input[type="submit"]:hover {
                    background-color: #0056b3;
                }
            </style>
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