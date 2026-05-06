<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    form {
        background: #fff;
        padding: 20px;
        margin: 50px auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        border-radius: 8px;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    label {
        display: block;
        margin-bottom: 8px;
        color: #555;
    }
    input[type="text"],
    input[type="date"],
    input[type="number"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"] {
        background: #28a745;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
        width: 100%;
    }
    input[type="submit"]:hover {
        background: #218838;
    }
    a {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #007bff;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
<?php

include "include/common.php";
$Id=$_GET['Id'] ?? 0;
if ($Id==0)
{
   redirect_to("list_renter.php");
}
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $newname = $_POST['name'] ?? "";
    $newaddr = $_POST['addr'] ?? "";
    $newdob = $_POST['dob'] ?? "";
    $newPhone = $_POST['Phone'] ?? "";
    $newid_phong = $_POST['id_phong'] ?? "";
    $newNgay_Thue_Tro = $_POST['Ngay_Thue_Tro'] ?? "";
    $newAnh_CCCD_MT =$_POST['Anh_CCCD_MT'] ?? "";
    $newANH_CCCD_MS =$_POST['ANH_CCCD_MS'] ?? "";
    $uploadSql= "UPDATE nguoi_thue SET name =?, addr=?, dob=?, Phone=?, id_phong=?, Nguoi_Thue_Tro=?, Anh_CCCD_MT=?, ANH_CCCD_MS=? WHERE Id=?";
    db_execute($uploadSql,[$newname,$newaddr,$newdob,$newPhone,$newid_phong,$newNgay_Thue_Tro,$newAnh_CCCD_MT,$newANH_CCCD_MS,$id]);
    redirect_to("renter.php");
}
$sql="SELECT *FROM nguoi_thue WHERE Id=?";
$data=db_select($sql,[$Id]);
$data=$data[0]?? null;
if($data === null)
{
    redirect_to("list_renter.php");
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
    <form method="post">        

        <h1>Chỉnh sữa lại dữ liệu</h1>
        <label>Họ Và Tên</label>
        <input name="name" type="text"placeholder="nhap tai day">
        <br>
        <label>Địa Chỉ</label>
        <input name="addr" type="text">
        <br>
        <label>Ngày Sinh</label>
        <input name="dob" type="date">
        <br>
        <label>Điện Thoại</label>
        <input name="PPhone" type="number"> 
        <br>
        <label>Ngày Thuê Trọ</label>
        <input type="date" name ="Ngay_Thue_Tro">
        <br>
        <label>Ảnh CCCD mặt trước</label>
        <input type="file" accept="image/*" name="Anh_CCCD_MT">
        <br>
        <label>Ảnh CCCD mặt sau</label>
        <input type="file" accept="image/*" name="ANH_CCCD_MS">
        <br>
        <input type="submit"value="UPDATE DATA"></a>
        <li>
            <a href="list_renter.php">Quay Về</a>
        </li>
    </form>
    </body>
</html>