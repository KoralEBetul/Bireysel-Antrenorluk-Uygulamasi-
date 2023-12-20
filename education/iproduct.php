<?php
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
    <title>Hizmetler</title>
    <link type="image/png" rel="icon" href="images/logo_transparent.png">
    <meta name="description" content="<?php echo DonusumleriGeriDondur($SiteDescription);  ?>">
    <meta name="keywords" content="<?php echo DonusumleriGeriDondur($SiteKeywords); ?>">
    <script type="text/javascript" src="frameworks/JQuery/jquery-3.6.0.min" language="javascript"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
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
        <a href="iproduct.php" class="active" >Hizmetler</a>
        <a href="iabout.php" >Program</a>
        <a href="iantrenor.php" >Eğitmenler</a>
        <a href="index.php#contact" >İletişim</a>
        <a href="isalon.php" >Salonlar</a>
        </nav>
        
        <div class="buttons">
            <button id="search-btn">
                <i class="fas fa-search"></i>
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


    <!--! products section start -->
    <section class="product" id="product">
        <h1 class="heading">Diğer <span>Hizmetler</span></h1>
        <div class="box-container">
            <div class="box">
                <div class="box-head">
                    <img src="images/product-1.jpg" alt="Hizmetler" />
                    <span class="title">Beslenme</span>
                    <div class="price">Beslenme uzmanlarımızdan biriyle çalışarak, 
                        hedeflerinize ulaşmak için hangi yaklaşımın size en uygun olduğunu 
                        belirlemek için yanlış beslenme bilgileri ve sahte bilimle dolu bir 
                        dünyada gerçekleri kurgudan ayırmayı öğreneceksiniz. 
                    </div>
                </div>
                
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/product-2.jpg" alt="Hizmetler" />
                    <span class="title">Özel Dersler</span>
                    <div class="price">Özel dersler, daha fazla kişisel ilgi isteyen yeni 
                        başlayanlar için mükemmeldir. Daha fazla bilgi edinmek için her Sınıf 
                        türünün altında listelenen Özel Ders seçeneğini seçin!
                    </div>
                </div>
            
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/product-3.jpg" alt="Hizmetler" />
                    <span class="title">Yarı Özel Dersler</span>
                    <div class="price"> 1 veya daha fazla arkadaşınızı getirerek Özel Ders 
                        ücretini azaltın! Daha fazla bilgi edinmek için her Sınıf türünün altında 
                        listelenen Yarı Özel seçeneğini belirleyin
                    </div>
                </div>
                
            </div>
            </div>
        </div>
    </section>
    <!--! products section end -->
    

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
        <a href="iproduct.php" class="active" >Hizmetler</a>
        <a href="iabout.php" >Program</a>
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
?>