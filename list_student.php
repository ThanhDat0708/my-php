<?php

include "./include/common.php";
include "include/_header.php";
$sql="SELECT*FROM student";
$KQ= db_select($sql);

#if($KQ->num_rows >0)
#{

    #$row_data=$KQ->fetch_assoc();
   # while ($row_data !=null) {
     # echo $row_data["class"]."<br>";
       # $row_data=$KQ->fetch_assoc();
    #}
    
#}

?>

   <a href="add_class_room.php">thêm</a>
        <?php
        foreach($KQ as $key => $valuse){
        ?>
            <tr>
                <td><?= $valuse["id"] ?></td>
                <td><?= htmlentities($valuse["name"])?></td>
                <td><?= htmlentities($valuse["addr"])?></td>
                <td><?= htmlentities($valuse["dob"])?></td>
                <td><?= htmlentities($valuse["phone"])?></td>
                <td><img src="/upload/<?=$valuse["photo"] ?>"width="100"></td>
                <td><a href="delete_student.php?id=<?=$valuse["id"] ?>">Xóa</a></td>
            <td><a href="edit_student.php?id=<?=$valuse["id"]?>">Sữa</a></td>
        <?php
        }
        include "include/_footer.php";
        ?>
        </table>