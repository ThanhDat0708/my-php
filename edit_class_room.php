<?php
include "./include/common.php";
$id=$_GET["id"] ?? 0;
if($id== 0) 
{
    redirect_to("/index.php");
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the new class name from the form.
    $newclass_name= $_POST["class_name"] ?? "";

    // Update the class name in the database.
    $updateSql = "UPDATE class_room SET class_name= ? WHERE id = ?";
    db_execute($updateSql, [$newclass_name, $id]);

    // Redirect to avoid form resubmission and to indicate success.
    redirect_to("/index.php");
}
$sql="Select * from class_room where id= ? ";
$data= db_select($sql,[$id]);
$data=$data[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label >Ten lop</label>
        <input type="text" name="class_name" value="<?=$data["class_name"] ?>">
        <br>
        <input type="submit" value="cap nhat du lieu">
    </form>
    
</body>
</html>