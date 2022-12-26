<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:index.php');
}


$id = $_SESSION['id'];
if (isset($_POST['submit'])) {
    //$ad = $_POST['ad'];
    //$soyad = $_POST['soyad'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $kadi = $_POST['kadi'];
    //$sifre = md5($_POST['sifre']);
    $sifre = $_POST['sifre'];
    //$bitistarihi = $_POST['bitistarihi'];
    //$kayittarihi = $_POST['kayittarihi'];

    $sql = "UPDATE `uyebilgileri` SET `phone`='$telefon',`email`='$email',`username`='$kadi',`password`='$sifre' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: user_page.php?msg=Veri başarıyla güncellendi");
    } else {
        echo "Başarısız: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kullanıcı sayfası</title>

    <!-- custom css file link  -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/userpage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="content">
            <h3>merhaba, <span><?php echo $_SESSION['user_name'] ?></span></h3>
        </div>

        <?php
        $sql = "SELECT * FROM `uyebilgileri` WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="POST" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Ad</label>
                        <input type="text" class="form-control" name="ad" disabled value="<?php echo $row['name'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Soyad</label>
                        <input type="text" class="form-control" name="soyad" disabled
                            value="<?php echo $row['lastname'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Telefon</label>
                        <input type="text" class="form-control" name="telefon" value="<?php echo $row['phone'] ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Bitiş Tarihi</label>
                        <input type="text" class="form-control" name="bitistarihi" disabled
                            value="<?php echo $row['uyeBitisTarihi'] ?>">
                    </div>
                </div>
                <div class="col">
                    <label class="form-label">Kayit Tarihi</label>
                    <input type="text" class="form-control" name="kayittarihi" disabled
                        value="<?php echo $row['uyeKayitTarihi'] ?>">
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label class="form-label">Kullanıcı Adı</label>
                        <input type="text" class="form-control" name="kadi" value="<?php echo $row['username'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Şifre</label>
                        <input type="password" class="form-control" name="sifre" value="<?php echo $row['password'] ?>">
                    </div>
                </div>
                <?php
                if (isset($_GET['msg'])) {
                    $msg = $_GET['msg'];
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                }
                ?>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Güncelle</button>
                    <a href="logout.php" class="btn btn-danger">Çıkış Yap</a>
                </div>



        </div>

</body>

</html>