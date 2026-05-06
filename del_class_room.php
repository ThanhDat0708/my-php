<?php
include_once "./include/common.php";
$id = $_GET["id"] ??0;
if (!empty($id))
{
    $sql = "DELETE FROM class_room WHERE id = ?";
    db_execute($sql, [$id]);
    //quay ve trang danh sach
  
}
redirect_to("/index.php");
?>