<?php 
include "./include/common.php";
include "include/_header.php";
session_start();
if(isset($_SESSION["username"])==false)
    {
        js_alert("Bạn cần đăng nhập để sử dụng chức năng này");
        js_redirect_to("login.php");
    }
    $sql = "SELECT * FROM class_room";
    $ketqua = db_select($sql);
    echo "<h3>Xin chào " . $_SESSION["username"] . "</h3>";
?>

<a href="add_class_room.php">Thêm Lớp</a>
    <div class="N">
        <table>
            <tr>
                <th>id</th>
                <th>Class_name</th>
            </tr>
            <?php
                foreach ($ketqua as $key => $value){ 
            ?>
            <tr>
                <td><?php echo $value["id"] ?></td>
                <td><?php echo $value["class_name"] ?></td>
                <td><a href="del_class_room.php?id=<?=$value["id"]?>">Xóa</a></td>
                <td><a href="edit_class_room.php?id=<?= $value["id"]?>">Sửa</a></td>
            </tr>
            <?php
                }
             include "./include/_footer.php";
            ?>
        </table>  
            </div>