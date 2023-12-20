
<?php
session_start(); ob_start();
require_once("Ayarlar/ayar.php"); //veri tabanı burada açılacak
require_once("ayarlar/fonksiyonlar.php");
?>

<!DOCTYPE html>
<html lang="tr-TR">

<head>
    <meta http-equiv="content-type" content="text-html"; charset="utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="tr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Programlar</title>
    <link type="image/png" rel="icon" href="images/logo_transparent.png">
    <meta name="description" content="<?php echo DonusumleriGeriDondur($SiteDescription);  ?>">
    <meta name="keywords" content="<?php echo DonusumleriGeriDondur($SiteKeywords); ?>">
    <script type="text/javascript" src="frameworks/JQuery/jquery-3.6.0.min" language="javascript"></script>
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="Ayarlar/fonksiyonlar.js" language="javascript"></script>
</head>
<body>
    <!--! header section start -->
    <header class="header">
        <a href="index.php" class="logo">
            <img src="images/logo_transparent.png" alt="logo" />
        </a>
        <nav class="navbar"> <!--! menu-bar -->
        <a href="login_form.php">Giriş</a>
        <a href="index.php" >Ana Sayfa</a>
        <a href="imenu.php" >Branşlar</a>
        <a href="iproduct.php" >Hizmetler</a>
        <a href="iabout.php" class="active">Program</a>
        <a href="iantrenor.php" >Eğitmenler</a>
        <a href="index.php#contact" >İletişim</a>
        <a href="isalon.php" >Salonlar</a>
        </nav>
        
        <div class="buttons">
            <button id="search-btn">
                <i class="fas fa-search"></i>
            </button>
            <button id="menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <div class="search-form">
            <input 
            type="text" 
            class="search-input" 
            id="search-box" 
            placeholder="ara" 
            />
            <i class="fas fa-search"></i>
        </div>
        <div class="cart-items-container">
            <div class="cart-item">
                <i class="fas fa-times"></i>
                <img src="images/about-11.png" alt="menu" />
                <div class="content">
                    <h3>Standart Plan</h3>
                    <div class="price">555</div>
                </div>
            </div>

            <a href="#" class="btn">kontrol</a>
        </div>
    </header>
    <!--! header section end -->

    <!--! about section start -->
    <section class="about" id="about">
        <h1 class="heading">Programını <span>Seç</span></h1>
        <div class="row">
            <div class="image">
                <img src="images/about-11.png" alt="about" />
                
            </div>
            <div class="content">
                <h3>Standart Plan</h3>
                <h5>Ayda 1 Görüşme</h5>
                <p>Standart plan, bir sonraki egzersiz planınızı gözden geçirmek 
                    ve tüm soruları yanıtlamak için her ay bir (1) canlı görüntülü 
                    sohbet veya telefon görüşmesi içerir.
                </p>
                <h6>Program</h6>
                <p>
                    Son derece özel antrenmanlar, beslenme koçluğu ve doğrudan Forge mobil 
                    uygulaması üzerinden sınırsız kısa mesajla kişisel koçunuzla doğrudan 
                    bağlantı içerir. Her program arasındaki tek fark, kişisel antrenörünüzle 
                    yapacağınız özel koçluk seanslarının sayısıdır.
                </p>
                <h6 class="aboutprogram">Yemek Planı</h6>
                <p>
                    Koçunuz size beslenmenizin yaşam 
                    tarzınıza en iyi şekilde nasıl entegre edeceğinizi öğretecek ve ilerledikçe 
                    çeşitlilik katacaktır. Öğün planları kaloriye uygundur ve %15-20 değişkenlik ile 
                    %40 karbonhidrat, %30 protein ve %30 yağ makro oranına dayanır.
                </p>
                <a href="user_page.php#reservation" class="btn-about">Randevu</a>
            </div>
        </div>
        <div class="row">
            <div class="content">
                <h3>Komple Plan</h3>
                <h5>Ayda 2 Defa Görüşme</h5>
                <p> Eksiksiz plan, daha da fazla destek ve ilham için her ay iki (2)
                     canlı görüntülü veya telefonla koçluk görüşmesi içerir.
                </p>
                <h6>Program</h6>
                <p>
                    Eksiksiz plan, her ay iki kat daha fazla video veya telefon sohbeti 
                    ve sınırsız uygulama içi mesajlaşma ile Standart Plana göre daha fazla 
                    koçluk ve hesap verebilirlik arayan kişiler için idealdir
                </p>
                <h6 class="aboutprogram">Yemek Planı</h6>
                <p>
                    Koçunuz size beslenmenizin yaşam 
                    tarzınıza en iyi şekilde nasıl entegre edeceğinizi öğretecek ve ilerledikçe 
                    çeşitlilik katacaktır. Öğün planları kaloriye uygundur ve %15-20 değişkenlik ile 
                    %40 karbonhidrat, %30 protein ve %30 yağ makro oranına dayanır.
                </p>
                <a href="user_page.php#reservation" class="btn-about">Randevu</a>
            </div>
            <div class="image">
                <img src="images/about-22.png" alt="about" />
                
            </div>
        </div>
        <div class="row">
            <div class="image">
                <img src="images/about-33.png" alt="about" />
            </div>
            <div class="content">
                <h3>Premium Plan</h3>
                <h5>Haftada 1 Görüşme</h5>
                <p>Premium ile her hafta eğitmeninizle bir (1) canlı video veya telefonla koçluk seansı 
                    alırsınız, bu da sizi doğru yolda tutar ve sürdürülebilir bir yaşam tarzı iyileştirmesi 
                    yapmanıza yardımcı olur.
                </p>
                <h6>Program</h6>
                <p>
                    Premium planla, çevrimiçi kişisel antrenörünüzden en uygun düzeyde kişisel koçluk ve hesap verebilirlik 
                    elde edin. Haftalık check-in aramaları ve sınırsız uygulama içi mesajlaşma ile daha iyi alışkanlıklar 
                    oluşturmayı ve yemek ilişkilerini geliştirmeyi öğrenin
                </p>
                <h6 class="aboutprogram">Yemek Planı</h6>
                <p>
                    Koçunuz size beslenmenizin yaşam 
                    tarzınıza en iyi şekilde nasıl entegre edeceğinizi öğretecek ve ilerledikçe 
                    çeşitlilik katacaktır. Öğün planları kaloriye uygundur ve %15-20 değişkenlik ile 
                    %40 karbonhidrat, %30 protein ve %30 yağ makro oranına dayanır.
                </p>
                <a href="user_page.php#reservation" class="btn-about">Randevu</a>
            </div>
        </div>
    </section>
    <!--! about section end -->

    

    <!--! footer section start -->
    <section class="footer" id="footer">
        <div class="search">
            <input type="text"
            class="search-input" placeholder="Ara" />
            <button class="btn btn-primary">Ara</button>
        </div>
        <div class="share">
            <a href="<?php echo DonusumleriGeriDondur($SosyalLinkInstagram); ?>" class="fab fa-facebook" target="_blank"></a>
            <a href="<?php echo DonusumleriGeriDondur($SosyalLinkInstagram); ?>" class="fab fa-twitter" target="_blank"></a>
            <a href="<?php echo DonusumleriGeriDondur($SosyalLinkInstagram); ?>" class="fab fa-instagram" target="_blank"></a>
            <a href="<?php echo DonusumleriGeriDondur($SosyalLinkInstagram); ?>" class="fab fa-linkedin" target="_blank"></a>
            <a href="<?php echo DonusumleriGeriDondur($SosyalLinkInstagram); ?>" class="fab fa-pinterest" target="_blank"></a>
        </div>
        <div class="links">
        <a href="login_form.php">Giriş</a>
        <a href="index.php" >Ana Sayfa</a>
        <a href="imenu.php" >Branşlar</a>
        <a href="iproduct.php" >Hizmetler</a>
        <a href="iabout.php" class="active">Program</a>
        <a href="iantrenor.php" >Eğitmenler</a>
        <a href="index.php#contact" >İletişim</a>
        <a href="isalon.php" >Salonlar</a>
        </div>
        <div class="credit">
            created by <span>Emine Betül Koral</span> | Tüm Hakları Saklıdır. 
        </div>
    </section>
    <!--! footer section end -->

    <script src="js/script.js"></script>


</body>
</html>

<?php
$VeritabaniBaglantisi = null;  //veri tabanı burada kapanacak
ob_flush();
ob_end_clean();
?>