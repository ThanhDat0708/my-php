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
if(is_post_method())
{
    $name=$_POST['name']?? "";
    $addr=$_POST['addr']?? "";
    $dob=$_POST['dob']?? "";
    $Phone=$_POST['Phone']?? "";
    $id_phong=$_POST['id_phong']?? "";
    $Ngay_Thue_Tro=$_POST['Ngay_Thue_Tro']?? "";
    $Anh_CCCD_MT = upload_and_return_filename("Anh_CCCD_MT");
    $ANH_CCCD_MS = upload_and_return_filename("ANH_CCCD_MS");
    $sql = " INSERT INTO nguoi_thue(name,addr,dob,Phone,Anh_CCCD_MT,ANH_CCCD_MS,id_phong)
            VALUE (?, ?, ?, ?, ?, ?, ?)";
    db_execute($sql,[$name,$addr,$dob,$Phone,$Anh_CCCD_MT,$ANH_CCCD_MS,$id_phong]);
}
?>
<form method="Post" enctype="multipart/form-data">
    <div>
        <h1>Danh Sách Người Thuê</h1>
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
            <div>
                <label>Chọn Phòng</label>
            <select name="id_phong" style="min-width: 200px;">
                <?php gen_option_ele("loai_phong","id","Ten_Loai_Phong","GIA_THUE","SO_NGUOI");?>
            </select>
            </div>
            <br>
            <input type="submit" value= "Xác Nhận Thêm Vào">
    </div>
    <li><a href="list_renter.php">Quay về</a></li>
</form>