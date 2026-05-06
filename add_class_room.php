<?php
include_once "./include/common.php";
include "./include/_header.php";
$name = $_POST["name"] ?? "";
if (!empty($name))
{
    $sql= "INSERT INTO class_room(class_name) VALUES(?)";
    db_execute($sql, [$name]);
    echo" Thêm thành công";
}else
{
    echo "Không có dữ liệu để thêm ";

}
?>
<form method="post">
    <h1>Thêm danh sách lớp</h1>
    <label for="Nhập thông tin muốn thêm vào danh sách: "></label>
    <br>
    <input type="text" name="name" placeholder="Nhập tại đây">
    <br>
    <a href="add_class_room.php"><input type="submit"value="Thêm"></a>
    <li>
        <a href="index.php">quay về</a>
    </li>
</form>
<?php