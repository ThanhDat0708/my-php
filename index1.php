<?php
include "include/common.php";
if (is_post_method())
{
    $Ten_Loai_Phong=$_POST['Ten_Loai_Phong']??"";
    $GIA_THUE=$_POST['GIA_THUE']?? "";
    $SO_NGUOI=$_POST['SO_NGUOI']?? "";
    $sql="INSERT INTO loai_phong(Ten_Loai_Phong,GIA_THUE,SO_NGUOI)
            VALUE (?, ?, ?)";
    db_execute($sql, [$Ten_Loai_Phong,$GIA_THUE,$SO_NGUOI]);
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
    <style>
        .Header
        {
            padding: 5px 10px;
            border: 1px solid gray;
            
        }
    </style>
    
</body>
</html>
<a href="add_Loai_Phong.php">Thêm</a>
<form method="Post">
    <div class="Header">
        <h1>QUẢN LÝ NHÀ TRỌ</h1>
        <label>Tên Loại Phòng</label>
        <input  name="Ten_Loai_Phong" type="text"placeholder="Nhập tại đây">
        <br>
        <label>Giá Thuê</label>
        <input  name="GIA_THUE" type="text"placeholder="Nhập tại đây">
        <br>
        <label>Số Người</label>
        <input name="SO_NGUOI" type="number">
    </div>
    <br>
    <input type="submit" value="Thêm">
</form>

