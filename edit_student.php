<?php
include "include/common.php";
$id=$_GET['id'] ?? 0;
if ($id==0)
{
    redirect_to("/list_student.php");
}
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $newname=$_POST['name']?? "";
    $newaddr=$_POST['addr']?? "";
    $newdob=$_POST['dob']?? "";
    $newphone=$_POST['phone']?? "";
    $newphoto=$_POST['photo']?? "";
    $newclass_id=$_POST['class_id']?? "";
    $updateSql = "UPDATE student SET class_id = ?, addr = ?, dob = ?, phone = ?, name = ?, photo = ? WHERE id = ?";
    db_execute($updateSql, [$newclass_id, $newaddr, $newdob, $newphone, $newname, $newphoto, $id]);
    redirect_to("/list_student.php");
} 
    $sql="SELECT *FROM student where id=?";
    $data= db_select($sql,[$id]);
    $data = $data[0] ?? null;
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
        <label >TÊN</label>
        <input type="text" name="name" value="<?=$data['name'] ?>"required>
        <label >Địa Chỉ</label>
        <input type="text" name="addr" value="<?=$data['addr'] ?>"required>
        <label >Ngày Sinh</label>
        <input type="text" name="dob" value="<?=$data['dob'] ?>"required>
        <label >Số Điện Thoại</label>
        <input type="text" name="phone" value="<?=$data['phone'] ?>"required>
        <label>Mã</label>
        <input type="text" name="class_id" value="<?=$data['class_id']?>"required>
        <label>Ảnh đại diện</label>
        <input type="text" name="photo" value="<?=$data['photo'] ?>">
        <input name="photo" type="file" accept="image/*">
        <br>
        <input type="submit" value="UPDATE DATA">
    </form>
    
</body>
</html>