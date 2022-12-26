<?php

@include 'config.php';
session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:index.php');
}

if (isset($_POST['submit'])) {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $kadi = $_POST['kadi'];
    //$sifre = md5($_POST['sifre']);
    $sifre = $_POST['sifre'];
    $kayittarihi = $_POST["regTime"];
    $bitistarihi = $_POST['expTime'];


    $sql = "INSERT INTO `uyebilgileri`(`id`, `name`, `lastname`, `phone`, `email`, `user_type`, `username`, `password`, `uyeBitisTarihi`) VALUES (NULL,'$ad','$soyad','$telefon','$email','user','$kadi','$sifre','$bitistarihi')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: admin_page.php?msg=kayit basariyla olusturuldu");
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

    <title>admin paneli</title>
</head>



<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        Yönetim Paneli
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Yeni Kullanıcıyı Ekle !</h3>
            <p class="text-muted">
                Kayıt etmek için aşağıdaki formu doldurun
            </p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="POST" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Ad</label>
                        <input type="text" class="form-control" name="ad" placeholder="Mustafa">
                    </div>

                    <div class="col">
                        <label class="form-label">Soyad</label>
                        <input type="text" class="form-control" name="soyad" placeholder="Köle">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Telefon</label>
                        <input type="text" class="form-control" name="telefon" placeholder="05055055050">
                    </div>
                    <!-- <div class="col">
                        <label class="form-label">Bitiş Tarihi</label>
                        <input type="date" class="form-control" name="bitistarihi">
                    </div> -->
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="mustafakole@hotmail.com">
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label class="form-label">Kullanıcı Adı</label>
                        <input type="text" class="form-control" name="kadi" placeholder="kmustafa0">
                    </div>

                    <div class="col">
                        <label class="form-label">Şifre</label>
                        <input type="password" class="form-control" name="sifre" placeholder="********">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label class="form-label">Kayıt Tarihi</label>
                        <input type="date" class="form-control" name="regTime">
                    </div>

                    <div class="col">
                        <label class="form-label">Bitis Tarihi</label>
                        <input type="date" class="form-control" name="expTime">
                    </div>
                </div>


                <div>
                    <button type="submit" class="btn btn-success" name="submit">Kaydet</button>
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