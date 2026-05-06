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
$id=$_GET['id']?? 0;
if($id==0)
{
    redirect_to("/list_phong_tro.php");
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $newTen_phong=$_POST['Ten_phong']?? "";
    $newid_loai_phong=$_POST['id_loai_phong']?? "";
    $uploadSql = "UPDATE phong_tro SET Ten_phong=?, id_loai_phong=? WHERE id=?";
    db_execute($uploadSql,[$newTen_phong,$newid_loai_phong,$id]);
    redirect_to("/phong_tro.php");
}
$sql="SELECT *FROM phong_tro WHERE id=?";
$data=db_select($sql,[$id]);
$data=$data[0]?? null;
if($data===null)
{
    redirect_to("/list_phong_tro.php");
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
<form method='post'>
    <h1>Chỉnh sữa lại dữ liệu</h1>
        <label>Tên Phòng</label>
        <input type="text" name="Ten_phong"placeholder="Nhập tại đây">
        <br>
        <label>Số Phòng</label>
        <input type="number" name="id_loai_phong"placeholder="Nhập tại đây">
        <br>
        <input type="submit" value="UPDATE DATA">
    <li>
        <a href="list_phong_tro">Quay VềVề</a>
    </li>
</form>
</body>
</html>