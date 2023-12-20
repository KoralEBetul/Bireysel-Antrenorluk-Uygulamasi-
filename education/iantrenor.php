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
    <title>Antrenörler</title>
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
        <a href="iabout.php" >Program</a>
        <a href="iantrenor.php" class="active">Eğitmenler</a>
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


    <!--! review section start -->
    <section class="review" id="review">
        <h1 class="heading">Tüm <span>Antrenörlerimiz</span></h1>
        <h3>Kişisel Antrenman</h3>


        <div class="box-container">
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    Fitness'da oldukça fazla deneyime sahip olan Bav, 
                   her seviyedeki sporcular için kişisel antrenman konusunda büyük anlayışa sahiptir.
                </p>
                <img src="images/antrenor-1.jpg" alt="avatar" class="user" />
                <h3>BAV DAVDA</h3>
                <h5>Kıdemli Kişisel Antrenör</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    Nicola, hem özel hem de NHS ortamlarında 10 yılı aşkın deneyime sahip, HCPC'ye kayıtlı bir diyetisyen ve spor beslenme uzmanıdır.
                </p>
                <img src="images/antrenor-3.jpg" alt="avatar" class="user" />
                <h3>NİCOLA MARSH</h3>
                <h5>Diyetisyen</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    Spor Terapisi derecesine sahip olan Chloe, hasta bakımına yaklaşımında manuel terapi becerilerini hareket ve egzersiz bilgisiyle birleştiriyor.
                </p>
                <img src="images/antrenor-2.jpg" alt="avatar" class="user" />
                <h3>CHLOE TYLER</h3>
                <h5>Kişisel Antrenör & Spor Terapisti</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>

        <div class="box-container">
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    Çok çeşitli müşterilerle çalışan bir Kişisel Antrenör
                     olarak 7 yıldan fazla deneyime sahip olan Jake, hedefleri ne olursa olsun
                      müşterilerinin hedefleri doğrultusunda başarılı olmasına yardımcı olmaya kararlıdır!
                </p>
                <img src="images/antrenor-4.jpg" alt="avatar" class="user" />
                <h3>JAKE HİTCHCOCK</h3>
                <h5>Kişisel Antrenör</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    Southampton'dan Sağlık ve Egzersiz Bilimi derecesine sahip olan Matt,
                     insan vücudu, biyomekanik ve diyet ve egzersiz yoluyla optimal sağlığa
                      ulaşma konusunda zengin bir bilgi birikimine sahiptir.
                </p>
                <img src="images/antrenor-5.jpg" alt="avatar" class="user" />
                <h3>MATTHEW KNIGHT</h3>
                <h5>Kişisel Antrenör</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    Kendi atletizmini geliştirmek ve müşterilerinin başarıya ulaşmasına yardımcı olmak
                     için yaklaşık on yıl harcayan Shea, hem performans hem de estetik hedefler için protokoller
                      konusunda zengin bir deneyime sahiptir.
                </p>
                <img src="images/antrenor-6.jpg" alt="avatar" class="user" />
                <h3>SHEA JOZANA</h3>
                <h5>Kişisel Antrenör</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>

        <div class="box-container">
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    Roger's, ekibin en uzun süredir devam eden üyelerinden biridir
                    ve bu, çanta dolusu deneyim ve fitness için muazzam bir tutkuyla birlikte gelir.
                    Harika, yağ sıyırma, ter dökme tarzı egzersizler sunan Roger'ın seansları her zaman popülerdir.
                </p>
                <img src="images/antrenor-8.jpg" alt="avatar" class="user" />
                <h3>ROGER CUE</h3>
                <h5>Operasyonel Müdür</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    Zorluklardan asla çekinmeyen Jordan, son derece popüler olan Miami Pro'da
                    bir fizik sporcusu olarak vücudunun yapabileceğini düşündüğü şeylerin
                    sınırlarını daha da zorlamak için yarıştı ve bunun için oldukça iyi görünüyordu!
                </p>
                <img src="images/antrenor-7.jpg" alt="avatar" class="user" />
                <h3>JORDAN BROWN</h3>
                <h5>Kişisel Eğitim ve Beslenme Başkanı</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>
        <h3>Fizyoterapi</h3>
        <div class="box-container">
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    Simon, LaTrobe Üniversitesi'nden 1998 yılında Fizyoterapi Lisans derecesi
                     ile mezun olan Avustralyalı bir fizyoterapisttir. 2005 yılında Avustralya'da
                    Spor Fizyoterapisi Yüksek Lisansını tamamlamış ve aranan APA Spor Fizyoterapisti unvanını elde etmiştir.
                </p>
                <img src="images/fizyo-1.jpg" alt="avatar" class="user" />
                <h3>SIMON GILCHRIST</h3>
                <h5>Kurucu & Danışman Fizyoterapist</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    Shari Randall, 2008 yılında Avustralya'daki Monash Üniversitesi Fizyoterapi Lisans Derecesinden
                    mezun oldu. Daha sonra Melbourne'daki La Trobe Üniversitesi'nde Kas-iskelet Fizyoterapisi alanında
                     Yüksek Lisans Sertifikası ve Yüksek Lisanslarını tamamladı.
                </p>
                <img src="images/fizyo-2.jpg" alt="avatar" class="user" />
                <h3>SHARİ RANDALL</h3>
                <h5>Uzman Fizyoterapist</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    2008 yılında BSc Hon ile mezun olduktan sonra. Fizyoterapi, Sam kas-iskelet sistemi,
                     ortopedi rehabilitasyonu, nörolojik rehabilitasyon ve solunum ve yoğun bakım alanlarındaki
                      bilgilerini daha da pekiştirmek için NHS içinde birkaç yıl çalıştı.
                </p>
                <img src="images/fizyo-3.jpg" alt="avatar" class="user" />
                <h3>SAM HARVEY</h3>
                <h5>Fizyoterapist</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>

        <h3>Pilates</h3>
        <div class="box-container">
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    Simon, LaTrobe Üniversitesi'nden 1998 yılında Fizyoterapi Lisans derecesi
                     ile mezun olan Avustralyalı bir fizyoterapisttir. 2005 yılında Avustralya'da
                    Spor Fizyoterapisi Yüksek Lisansını tamamlamış ve aranan APA Spor Fizyoterapisti unvanını elde etmiştir.
                </p>
                <img src="images/fizyo-1.jpg" alt="avatar" class="user" />
                <h3>SIMON GILCHRIST</h3>
                <h5>Kurucu & Danışman Fizyoterapist</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    Shideh aslen Londra Üniversitesi'nden (SOAS) ve Westminster Üniversitesi'nden Sanat ve
                     Arkeoloji alanında Onur Derecesi ve Uluslararası İşletme ve Yönetim alanında Yüksek
                      Lisans derecesi ile mezun oldu ve Emlak sektöründe başarılı bir kariyere devam etti.
                </p>
                <img src="images/pilates-1.jpg" alt="avatar" class="user" />
                <h3>SHİDEH MOSHİRİ</h3>
                <h5>pilates eğitmeni</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/quote.png" alt="quote" />
                <p>
                    Ann, 2015 yılında Pilates öğretmeni olmak için eğitim aldı. Pilates eğitimini kalça
                     protezinden sonra kendi rehabilitasyonuna yardımcı olmak için kullandıktan sonra,
                      Pilates'in hareket terapisi yönüyle özellikle ekstra arzuyla ilgilenmeye başladı.
                </p>
                <img src="images/pilates-2.jpg" alt="avatar" class="user" />
                <h3>ANN SOMON</h3>
                <h5>pilates eğitmeni</h5>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>

    </section>
    <!--! review section end -->

    <!--! contact section start -->
    <section class="contact" id="contact">
        <h1 class="heading">Bizimle <span>İletişim</span></h1>
        <div class="row"> <!--! harita yerleştirdik -->
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49975.26207989834!2d27.2440874!3d38.477167550000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b97cc2a667395d%3A0x626d8badfe2a96de!2sErzene%2C%20Bornova%2F%C4%B0zmir!5e0!3m2!1str!2str!4v1680353595269!5m2!1str!2str"  
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <form action="iletisimsonuc.php" method="POST">
                <h3>Temasta Bulun</h3>
                <div class="inputBox">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="İsminizi girin" name="IsimSoyisim" required />
                </div>
                <div class="inputBox">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="EmailAdresi" placeholder="Email adresinizi girin" required />
                </div>
                <div class="inputBox">
                    <i class="fas fa-phone"></i>
                    <input type="text" name="TelefonNumarasi" placeholder="Telefon Numarası" maxlength="11" required/>
                </div>
                <div class="inputBox">
                    <i class="fas fa-message"></i>
                    <textarea name="Mesaj" > 
                    </textarea>
                </div>
                <div>
                    <input type="submit" class="btn" value="İletişim" />
                </div>
            </form>
        </div>
    </section>
    <!--! contact section end -->

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
        <a href="iantrenor.php" class="active">Eğitmenler</a>
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