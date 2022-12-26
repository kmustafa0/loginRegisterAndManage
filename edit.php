<?php
@include 'config.php';

$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $kadi = $_POST['kadi'];
    //$sifre = md5($_POST['sifre']);
    $sifre = $_POST['sifre'];
    $bitistarihi = $_POST['bitistarihi'];
    $kayittarihi = $_POST['kayittarihi'];

    $sql = "UPDATE `uyebilgileri` SET `name`='$ad',`lastname`='$soyad',`phone`='$telefon',`email`='$email',`username`='$kadi',`password`='$sifre',`uyeKayitTarihi`='$kayittarihi',`uyeBitisTarihi`='$bitistarihi' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: admin_page.php?msg=Veri başarıyla güncellendi");
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        BURADA BAŞLIK YAZIYOR
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Kullanıcı Bilgilerini Güncelle !</h3>
            <p class="text-muted">
                Değişiklik yaptıktan sonra güncelle'ye basın
            </p>
        </div>
        <?php
        $sql = "SELECT * FROM `uyebilgileri` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="POST" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Ad</label>
                        <input type="text" class="form-control" name="ad" value="<?php echo $row['name'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Soyad</label>
                        <input type="text" class="form-control" name="soyad" value="<?php echo $row['lastname'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Telefon</label>
                        <input type="text" class="form-control" name="telefon" value="<?php echo $row['phone'] ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Bitiş Tarihi</label>
                        <input type="text" class="form-control" name="bitistarihi"
                            value="<?php echo $row['uyeBitisTarihi'] ?>">
                    </div>
                </div>
                <div class="col">
                    <label class="form-label">Kayit Tarihi</label>
                    <input type="text" class="form-control" name="kayittarihi"
                        value="<?php echo $row['uyeKayitTarihi'] ?>">
                </div>
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

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Güncelle</button>
                    <a href="admin_page.php" class="btn btn-danger">İptal Et</a>
                </div>
            </form>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>