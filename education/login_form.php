<?php
@include 'Ayarlar/config.php';

session_start();

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = " SELECT * FROM uye WHERE EmailAdresi = '$email' && Sifre = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){
            setcookie('user_email', $email);
            $_SESSION['admin_name'] = $row['IsimSoyisim'];
            header('location:antrenor_page.php');
        }elseif($row['user_type'] == 'user'){
            setcookie('user_email', $email);
            $_SESSION['user_name'] = $row['IsimSoyisim'];
            header('location:user_page.php');
        }
    }else{
        $error[] = 'Email adresi veya Şifre hatalı';
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
    <title>Giriş</title>
    <link type="image/png" rel="icon" href="images/logo_transparent.png">
    <script type="text/javascript" src="frameworks/JQuery/jquery-3.6.0.min" language="javascript"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script type="text/javascript" src="Ayarlar/fonksiyonlar.js" language="javascript"></script>
</head>
<!--! kayit form section start -->
<body class="login"> 
    <div class="login-card">
        <div class="column">
        <h1>Kullanıcı Giriş</h1>
            <p>varsayılan antrenör = <span>ilhankoradmin@gmail.com</span> & şifre = <span>12345</span></p>
            <p>varsayılan üye = <span>user_01@gmail.com</span> & şifre = <span>123456</span></p>
            <form action="" method="post">
                <h3>Giriş</h3>
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>
                <div class="form-item"><input type="email" name="email" class="form-element" required placeholder="email girin"></div>
                <div class="form-item"><input type="password" name="password" class="form-element" required placeholder="şifre girin"></div>
                
                <!--!
                <select name="user_type">
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select> -->
                <!--!
                <select name="Cinsiyet">
                    <option value="Kadın">Kadın</option>
                    <option value="Erkek">Erkek</option>
                    <option value="Diğer">Diğer</option>
                </select>
                -->

                <div class="button">
                    <input type="submit" name="submit" value="Giriş" class="form-btn">
                </div>
                <div><p>hesabın yok mu? <a href="register_form">Kaydol</a> </p></div>
                <div class="flex">
                    <a href="#" >
                    
                    </a>
                    <a href="#">Şifreni Sıfırla</a>
                </div>
            </form>
        </div>
        <div class="column">
        </div>
    </div>
   
    <script src="js/script.js"></script>
</body>
<!--! kayit form section end-->
</html>
<?php
$VeritabaniBaglantisi = null;  //veri tabanı burada kapanacak
?>