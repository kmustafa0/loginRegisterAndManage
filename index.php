<?php

include "config.php";
session_start();

if (isset($_POST['submit'])) {

   //$name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   //$pass = md5($_POST['password']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);

   //$user_type = $_POST['user_type'];

   $select = " SELECT * FROM uyebilgileri WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      if ($row['user_type'] == 'admin') {
         $_SESSION['usertype'] = $row['user_type'];
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');
      } elseif ($row['user_type'] == 'user') {

         $_SESSION['id'] = $row['id'];
         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');
      }
   } else {
      $error[] = 'incorrect email or password!';
   }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Ekranı</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="form-container">
        <form action="" method="post">
            <h3>Giriş Yap</h3>
            <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
            <input type="email" name="email" required placeholder="email adresini yaz">
            <input type="password" name="password" required placeholder="şifreni yaz">
            <input type="submit" name="submit" value="giris yap" class="form-btn">
            <p>hesabın yok mu? <a href="register_form.php">kayıt ol</a></p>
        </form>

    </div>

</body>

</html>