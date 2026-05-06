<?php
$id=$_GET['id']??0;
if(!empty($id))
{
    $sql= "DELETE FROM phong_tro WHERE id=?";
    db_execute($sql,[$id]);
}
redirect_to("phong_tro.php");
?>