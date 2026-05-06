<?php
include "include/common.php";
$id=$_GET['id']??0;
if(!empty($id))
{
    $sql= "DELETE FROM loai_phong WHERE id=?";
    db_execute($sql,[$id]);
}
redirect_to("list_Loai_Phong.php");
?>