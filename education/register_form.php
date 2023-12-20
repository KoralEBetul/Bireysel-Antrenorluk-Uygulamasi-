<?php
@include 'Ayarlar/config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
    $uye_dogum_tarihi = $_POST['uye_dogum_tarihi'];
    $TelefonNumarasi = $_POST['TelefonNumarasi'];

    $select = " SELECT * FROM uye WHERE EmailAdresi = '$email' && Sifre = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $error[] = 'user already exist';

    }else{
        if($pass != $cpass){
            $error[] = 'password not matched';
        }else{
            $insert = "INSERT INTO uye(IsimSoyisim, EmailAdresi, Sifre, user_type, uye_dogum_tarihi, TelefonNumarasi) VALUES('$name', '$email',  '$pass', '$user_type', '$uye_dogum_tarihi', '$TelefonNumarasi')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }

};
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta http-equiv="content-type" content="text-html"; charset="utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="tr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Kayıt</title>
    <link type="image/png" rel="icon" href="images/logo_transparent.png">
    <script type="text/javascript" src="frameworks/JQuery/jquery-3.6.0.min" language="javascript"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script type="text/javascript" src="Ayarlar/fonksiyonlar.js" language="javascript"></script>
</head>
<!--! kayit form section start -->
<body class="randevu"> 
    <div class="container">
    <div class="title">Kayıt Ol</div>
        <form action="" method="post">
            <div class="user-details">
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>
                <div class="input-box"><input type="text" name="name" required placeholder="kullanıcı adı girin"></div>
                <div class="input-box"><input type="email" name="email" required placeholder="email girin"></div>
                <div class="input-box"><input type="password" name="password" required placeholder="şifre girin"></div>
                <div class="input-box"><input type="password" name="cpassword" required placeholder="şifreyi tekrar girin"></div>
                <div class="input-box"><input type="date" name="uye_dogum_tarihi" placeholder="doğum tarihi girin"></div>
                <div class="input-box"><input type="text" name="TelefonNumarasi"  maxlength="11" placeholder="Telefon Numarası girin" required></div>
                <div class="input-box">
                    <select name="user_type">
                        <option value="user">Üye</option>
                        <option value="admin">Antrenör</option>
                    </select>
                </div>
            </div>
            <div  class="button"><input type="submit" name="submit" value="Kaydol" class="form-btn"></div>
            <div><p>zaten bir hesabın var mı? <a href="login_form.php">Giriş</a> </p></div>
        </form>
    </div>
   
    <script src="js/script.js"></script>
</body>
<!--! kayit form section end-->
</html>
<?php
$VeritabaniBaglantisi = null;  //veri tabanı burada kapanacak
?>