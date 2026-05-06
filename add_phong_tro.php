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
$Ten_phong=$_POST['Ten_phong']?? "";
$id_loai_phong=$_POST["id_loai_phong"]?? "";
if(!empty($Ten_phong)&& !empty($id_loai_phong))
{
    $sql="INSERT INTO phong_tro(Ten_phong,id_loai_phong)
    VALUE (?,?)";
    db_execute($sql,[$Ten_phong,$id_loai_phong]);
    echo "Thêm thành công !";
}else
{
    echo "Không thêm được dữ liệu:)";
}
?>
<form method='post'>
    <h1>Thêm Phòng</h1>
    <h1>Phòng Trọ</h1>
        <label>Tên Phòng</label>
        <input type="text" name="Ten_phong"placeholder="Nhập tại đây">
        <br>
        <label>Số Phòng</label>
        <input type="number" name="id_loai_phong"placeholder="Nhập tại đây">
        <br>
        <a href="add_phong_tro.php"></a><input type="submit" value="Thêm">
<li>
<a href="list_phong_tro.php">Quay vềvề</a>
</li>
</form>