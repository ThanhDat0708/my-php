<?php
include "include/common.php";
session_start();
if (!isset($_SESSION["username"]))
{
    js_alert("Bạn cần đăng nhập để sử dụng trang web này");
    js_redirect_to("sign_Phong.php");
}
include "include/header_loaiphong.php";
$sql="SELECT * FROM loai_phong";
$kq= db_select($sql);
?>
<a href="add_Loai_Phong.php">Thêm</a>
<?php
foreach($kq as $key => $values)
{
?>
<tr>
<td><?= $values["id"]?></td>
<td><?= htmlentities($values["Ten_Loai_Phong"])?></td>
<td><?= htmlentities($values["GIA_THUE"])?></td>
<td><?= htmlentities($values["SO_NGUOI"])?></td>
<td><a href="edit_Loai_Phong.php?id=<?=$values["id"]?>">Sữa</a></td>
<td><a href="del_Loai_Phong.php?id=<?=$values["id"]?>">Xóa</a></td>
</tr>
<?php
}
include "include/footer_phongtro.php";
?>
</table>
<li>
    <a href="menu.php">Quay Về</a>
</li>