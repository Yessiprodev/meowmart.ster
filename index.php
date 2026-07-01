<!-- ==========================
    FILE: index.php (Login Page)
========================== -->
<?php  
if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal") {
    echo '<script>
        alert("😿 Meoww! Login-nya gagal...\n\nCoba cek lagi username & password kamu, ya~🐈‍");
    </script>';
}
?>


<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <meta charset="viewport" content="width=device-width, initial-scale=1.o" />
<head>
    <style>
    body {
    margin: 0;
    padding: 0;
    font-family: var(--body-font);
    color: var(--first-color);
    background-color: #f7d695ff;
    ;
}
</style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- ===== BOX ICONS CDN ===== -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet">

    <!-- ===== LOTTIE PLAYER ===== -->
    <script
  src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js"
  type="module"></script>
</head>
<body>
<!-- index.php -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>
</head>
<body>
     <?php include 'sound.php'; ?>
    <div class="l-form">
        <div class="shape1"></div>
        <div class="shape2"></div>

        <div class="form">
 <dotlottie-wc
  src="https://lottie.host/472251fa-90bf-4df5-bd82-5402851d62dc/C5xzZycW22.lottie"
  style="width: 500px;height: 500px; margin-left: 125px; margin-bottom: 50px"
  speed="1"
  autoplay
  loop
></dotlottie-wc>

            <form method="post" action="login_proses.php" class="form__content">
                <h1 class="form__title">🐾 Meow~ Welcome Meowster!!</h1>

                <div class="form__div form__div-one">
                    <div class="form__icon">
                        <i class='bx bx-user-circle'></i>
                    </div>
                    <div class="form__div-input">
                        <label class="form__label">Username</label>
                        <input name="username" type="text" class="form__input" id="username">
                    </div>
                </div>

                <div class="form__div">
                    <div class="form__icon">
                        <i class='bx bx-lock'></i>
                    </div>
                    <div class="form__div-input">
                        <label class="form__label">Password</label>
                        <input name="password" type="password" class="form__input" id="password">
                    </div>
                </div>

                <br><br>
                <input name="login" type="submit" class="form__button" value="Login">
            </form>
        </div>
    </div>

    <!-- ===== MAIN JS ===== -->
    <script src="assets/js/main.js"></script>
</body>
</html>
