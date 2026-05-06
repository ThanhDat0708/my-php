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
            <input name="phone" type="number"> 
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
</form>
