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
$Ten_Loai_Phong=$_POST['Ten_Loai_Phong']??"";
$GIA_THUE=$_POST['GIA_THUE']?? "";
$SO_NGUOI=$_POST['SO_NGUOI']?? "";
if(!empty($Ten_Loai_Phong) && !empty($GIA_THUE) && !empty($SO_NGUOI))
{
    $sql="INSERT INTO loai_phong(Ten_Loai_Phong,Gia_Thue,So_Nguoi) VALUE(?,?,?)";
    db_execute($sql,[$Ten_Loai_Phong,$GIA_THUE,$SO_NGUOI]);
    echo"Thêm thành công !";
}else
{
    echo "Không có dữ liệu để thêm ";
}
?>
<form method="post">
<h1>Thêm danh sách phòng</h1>
<label for="Nhâp thông tin muốn thêm vào danh sách phòng: "></label>
<br>
<label>Tên loại Phòng</label>
<input type="text" name="Ten_Loai_Phong"placeholder="Nhập tại đây">
<br>
<label>Giá Thuê</label>
<input type="number"name="GIA_THUE"placeholder="Nhập tại đây">
<br>
<label>Số Người</label>
<input type="number" name="SO_NGUOI"placeholder="Nhập tại đây">
<br>
<a href="add_Loai_Phong.php"><input  type="submit"value="Thêm"></a>

<li>
    <a href="list_Loai_Phong.php">Quay Về</a>
</li>
</form>
