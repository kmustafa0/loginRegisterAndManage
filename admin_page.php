<?php

@include 'config.php';
session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>

    <!-- custom css file link  -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!--bootstrap and fontawesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        Yönetim Paneli
    </nav>


    <div class="container">
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
        <h1>Merhaba <?php echo $_SESSION['admin_name']; ?></h1>
        <a href="add_new.php" class="btn btn-dark mb-3">Yeni Kayıt</a>
        <a href="logout.php" class="btn btn-dark mb-3">Çıkış Yap</a>

        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Ad</th>
                    <th scope="col">Soyad</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Kullanici Adı</th>
                    <th scope="col">Şifre</th>
                    <th scope="col">Kayıt Tarihi</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th scope="col">Düzenle/Sil</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "config.php";
                $sql = "SELECT * FROM `uyebilgileri`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']  ?></td>
                    <td><?php echo $row['name']  ?></td>
                    <td><?php echo $row['lastname']  ?></td>
                    <td><?php echo $row['phone']  ?></td>
                    <td><?php echo $row['email']  ?></td>
                    <td><?php echo $row['username']  ?></td>
                    <td><?php echo $row['password']  ?></td>
                    <td><?php echo $row['uyeKayitTarihi']  ?></td>
                    <td><?php echo $row['uyeBitisTarihi']  ?></td>

                    <td>
                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i
                                class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                        <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i
                                class="fa-solid fa-trash fs-5"></i></a>
                    </td>
                </tr>
                <?php
                }

                ?>

            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>