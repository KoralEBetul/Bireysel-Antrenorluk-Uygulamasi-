<?php
session_start(); ob_start();
require_once("Ayarlar/ayar.php"); 
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
    <title>Salonlar</title>
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
        <a href="iproduct.php" >Hizmetler</a>
        <a href="iabout.php" >Program</a>
        <a href="iantrenor.php" >Eğitmenler</a>
        <a href="index.php#contact" >İletişim</a>
        <a href="isalon.php" class="active">Salonlar</a>
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
    </header>
    <!--! header section end -->

    

    <!--! menu section start -->
    <section class="menu" id="menu"> 
        <h1 class="heading">Tüm <span>Salonlar</span></h1>
        <h3>Kişisel Gelişim</h3>
        <div class="box-container">
            <div class="box">
                <div class="box-head">
                    <img src="images/salon1.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Court 35 Sport Center</h3>
                    <div class="price">Erzene, 17. Sokak No:5/A, 35040 Bornova/İzmir</div>

                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/salon4.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Gold Fitness Club</h3>
                    <div class="price">  Osmangazi, Yavuz Cd. No:123 A, 35535 Bornova/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/salon5.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Aktif Fitness</h3>
                    <div class="price"> Manavkuyu, No:, Fatih Sultan Mehmet Cd. No:62, 35535 bornova/Bayraklı/Bayraklı/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
        </div>

        <div class="box-container">
            <div class="box">
                <div class="box-head">
                    <img src="images/salon6.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Gym Bornova</h3>
                    <div class="price">
                        Kazımdirik, Mustafa Kemal Cd. No:39, 35100 Bornova/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/salon7.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Gym Health Center Fitness & Spa</h3>
                    <div class="price">
                        Gaziosmanpaşa Bulvarı No:7 Hilton Avm No:Z 20, 35210 Çankaya/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/salon8.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Cfa Training Club</h3>
                    <div class="price"> 
                        Alsancak, Umur Bey Mahallesi, 1497. Sk. No:5/B, 35000 Konak/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
        </div>

        <div class="box-container">
            <div class="box">
                <div class="box-head">
                    <img src="images/salon9.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Sporium Fitness Center</h3>
                    <div class="price">
                        Tahsin Yazıcı, 9301. Sk., 35160 Karabağlar/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/salon10.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>White Sports Center</h3>
                    <div class="price">
                        Bahçelerarası, Mithatpaşa Cd. No:1458\91, 35330 Balçova/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/salon2.png" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Fit Line Slim And Gym Center</h3>
                    <div class="price"> 
                        Alaybey, Şht. Asım Aksoy Cd., 35600 Karşıyaka/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
        </div>
        <h3>Pilates</h3>
        <div class="box-container">
            <div class="box">
                <div class="box-head">
                    <img src="images/salon11.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>interfiz Sağlıklı Yaşam Merkezi</h3>
                    <div class="price">
                        Gazi Mah. Alb. İbr. Karaoğlanoğlu Cad. No: 17A, 35410 Gaziemir/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/salon12.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Palmiye WHITE Club</h3>
                    <div class="price">
                        Palmiye Alışveriş Merkezi Mithat Paşa Caddesi No: 34 1.KAT NO:100, 35330 Balçova/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/salon13.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>İzmir Pilates Studio</h3>
                    <div class="price">
                        Kılıç Reis, 304. Sk. No:68 Kat:1 D:aire:2, 35280 Konak/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
        </div>
        <div class="box-container">
            <div class="box">
                <div class="box-head">
                    <img src="images/salon14.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Stüdyo İDA</h3>
                    <div class="price">
                        İsmet Kaptan, Mahallesi, Şair Eşref Blv. Altay İş Merkez No 18/25, 35210 Konak/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/salon15.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Zen Pilates</h3>
                    <div class="price">
                        Alsancak, Kültür Mah. Nevvar Salih İşgören Cad. 1391 Sok, D:No:2 Daire:2, 35220 Konak/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/salon24.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Kumsal Pilates</h3>
                    <div class="price">
                        Eğitim, Ünlü Sk. No:22 Kat:1 D:aire:3, 35330 Balçova/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
        </div>

        <h3>Yoga</h3>
        <div class="box-container">
            <div class="box">
                <div class="box-head">
                    <img src="images/salon18.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>İzmir Yoga</h3>
                    <div class="price">
                        Kültür Mahallesi 1377. Sokak N.Çifçi, D:Apt. No:7, 35220 Konak/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/salon19.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>İzmir Karuna Yoga</h3>
                    <div class="price">
                        Bostanlı, Şehit Cengiz Topel Caddesi 6347. Sokak Onurlular Apt, D:No:5/B, 35590 Karşıyaka/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/salon21.png" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Yogaspace Izmir</h3>
                    <div class="price">
                        Alsancak, 1480. Sk. No:7, 35220 Konak/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
        </div>

        <div class="box-container">
            <div class="box">
                <div class="box-head">
                    <img src="images/salon22.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Tara Yoga</h3>
                    <div class="price">
                        Şemikler, Sevgi Apt, 6295/2. Sk. no:6a, 35560 Karşıyaka/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/salon23.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>Stüdyo Denge</h3>
                    <div class="price">
                        Bostanlı, 6418/2. Sk. No:8 D:1, 35590 Karşıyaka/İzmir
                    </div>
                </div>
                <div class="box-bottom">
                    <a href="antrenor_page.php#reservation" class="btn-antrenor">Randevu</a>
                </div>
            </div>
            
        </div>
        
    </section>
    <!--! menu section end -->
    <!--! reservation section start -->

    <section class="reservation" id="reservation">
        <form action="" method="post">
            <h3>REZERVASYON</h3>
            <div class="flex">
                <div class="box">
                    <p>İsim Soyisim <span>*</span></p>
                    <input type="text" name="name" maxlength="50" required placeholder="İsim Soyisim bilgilerinizi girin" class="input">
                </div>
                <div class="box">
                    <p>Email <span>*</span></p>
                    <input type="email" name="email" maxlength="50" required placeholder="Mail adresinizi girin" class="input">
                </div>
                <div class="box">
                    <p>Telefon <span>*</span></p>
                    <input type="number" name="number" maxlength="10" min="0" max="9999999999" required placeholder="Telefon Numaranızı Girin" class="input">
                </div>
                <div class="box">
                    <p>Eğitimler <span>*</span></p>
                    <select name="rooms" class="input" required>
                    <option value="1" selected>Kişisel Gelişim</option>
                    <option value="2">Pilates</option>
                    <option value="3">Yoga</option>
                    </select>
                </div>
                <div class="box">
                    <p>Gün <span>*</span></p>
                    <input type="date" name="check_in" class="input" required>
                </div>
                <div class="box">
                    <p>Saat <span>*</span></p>
                    <input type="time" name="check_out" class="input" required>
                </div>
            </div>
            <input type="submit" value="Rezervasyon oluştur" name="book" class="adminbtn">
        </form>
    </section>

    <!--! reservation section end -->

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
        <a href="iabout.php" >Program</a>
        <a href="iantrenor.php" >Eğitmenler</a>
        <a href="index.php#contact" >İletişim</a>
        <a href="isalon.php" class="active">Salonlar</a>
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
$VeritabaniBaglantisi = null;  
ob_flush();
ob_end_clean();
?>