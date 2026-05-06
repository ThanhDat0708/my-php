<?php
include "include/common.php";
include "include/header_renter.php";
session_start();
if (!isset($_SESSION["username"]))
{
    js_alert("Bạn cần đăng nhập để sử dụng trang web này");
    js_redirect_to("sign_Phong.php");
}
$sql="SELECT * FROM  nguoi_thue";
$kq= db_select($sql);
?>
<a href="add_renter.php">Thêm</a>

<table>
    <?php
foreach($kq as $key => $value)
{
    ?><tr>
        <td><?= $value["Id"] ?></td>
        <td><?= htmlentities($value["name"])?></td>
        <td><?= htmlentities($value["addr"])?></td>
        <td><?= htmlentities($value["dob"])?></td>
        <td><?= htmlentities($value["Phone"])?></td>
        <td><?= htmlentities($value["Ngay_Thue_Tro"])?></td>
        <td><img src="/upload/<?=$value["Anh_CCCD_MT"] ?>"width="150"></td>
        <td><img src="/upload/<?=$value["ANH_CCCD_MS"] ?>"width="150"></td>
        <td><a href="edit_renter.php?Id=<?=$value["Id"]?>">Sữa</a></td>
        <td><a href="del_renter.php?Id=<?=$value["Id"]?>">Xóa</a></td>
<?php  
}
?>
</table>
<?php
include "include/footer_phongtro.php";
?>
<li>
    <a href="menu.php">Quay Về</a>
</li>
