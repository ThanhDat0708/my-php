<?php
include "include/common.php";
$id=$_GET['id']??0;
if (!empty($id))
{
    $sql = "DELETE FROM student WHERE id = ?";
    db_execute($sql, [$id]);
    //quay ve trang danh sach
  
}
redirect_to("list_student.php");
?>
