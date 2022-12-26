<?php
@include 'config.php';
$id = $_GET['id'];
$sql = "DELETE FROM uyebilgileri WHERE id=$id";
$result = mysqli_query($conn, $sql);

if($result){
    header("Location: admin_page.php?msg=Kayıt başarıyla silindi");
}
else{
    echo "Failed: " . mysqli_error($conn);
}
?>