<?php
include "include/_header.php";
include "include/common.php";
if (is_post_method())
{
    //1.lấy dữ liệu từ from 
    $name=$_POST['name']?? "";
    $addr=$_POST['addr']?? "";
    $dob=$_POST['dob']?? "";
    $phone=$_POST['phone']?? "";
    $class_id=$_POST['class_id']?? "";
    //2.Upload ảnh và lấy đường dẫn
    $photo = upload_and_return_filename("photo");
    //3.tạo câu sql và thực thi
    $sql= "INSERT INTO student(name,addr,dob,phone,photo,class_id)
            VALUE (?, ?, ?, ?, ?, ?)";
    db_execute($sql, [$name,$addr,$dob,$phone,$photo,$class_id]);
    
}
?>
    <form method="Post" enctype="multipart/form-data">
        <div class="login">
            <h1>THÊM DANH SÁCH</h1>
            <label>Chọn Ảnh</label>
            <input name="photo" type="file" accept="image/*">
            <br>
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
            <div>
                <label>Chọn Lớp</label>
                <select name="class_id" style="min: width 200px;">
                    <?php gen_option_ele("class_room", "id", "class_name");?>
        
            </div>
            <br>
            <input type="submit" value="Thêm">
        </div>
    </form>
    <?php
    include "include/_footer.php"
    ?>
