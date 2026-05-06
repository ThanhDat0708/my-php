<?php
include "include/common.php";
include "include/header_phongtro.php";
$sql="SELECT * FROM phong_tro";
$kq= db_select($sql);
?>
<a href="add_phong_tro.php">Thêm</a>
<?php
foreach($kq as $key =>$value)
{
?><tr>
    <td><?= $value["id"]?></td>
    <td><?= htmlentities($value["Ten_phong"])?></td>
    <td><?= htmlentities($value["id_loai_phong"])?></td>
    <td><a href="edit_phong_tro.php?id=<?=$value["id"]?>">Sữa</a></td>
    <td><a href="add_phong_tro.php?id=<?=$value["id"]?>">Xóa</a></td>
 </tr>
<?php
}
include "include/footer_phongtro.php";
?>
</table>
<li>
    <a href="menu.php">Quay Về</a>
</li>