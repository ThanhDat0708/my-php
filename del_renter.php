<?php
include "include/common.php";
$Id=$_GET['Id']??0;
if(!empty($Id))
{
    $sql = "DELETE FROM nguoi_thue WHERE Id = ?";
    db_execute($sql, [$Id]);
}
redirect_to("list_renter.php");
?>
