<?php
include "include/common.php";
if (is_post_method())
{
$Ten_phong=$_POST['Ten_phong']?? "";
$id_loai_phong=$_POST['id_loai_phong']?? "";
$sql="INSERT INTO phong_tro(Ten_phong,id_loai_phong)
        VALUE (?,?)";
        db_execute($sql,[$Ten_phong,$id_loai_phong]);
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
        <h1>Phòng Trọ</h1>
        <label>Tên Phòng</label>
        <input type="text" name="Ten_phong"placeholder="Nhập tại đây">
        <br>
        <label>Số Phòng</label>
        <input type="number" name="id_loai_phong"placeholder="Nhập tại đây">
        <br>
        <input type="submit" value="Thêm">
    </form>
</body>
</html>
