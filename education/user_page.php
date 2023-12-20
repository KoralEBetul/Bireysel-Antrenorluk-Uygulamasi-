<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
}

?>

<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   setcookie('user_id', create_unique_id(), time() + 60*60*24*30, '/');
   header('location:index.php');
}

if(isset($_POST['check'])){

   $check_in = $_POST['check_in'];
   $check_in = filter_var($check_in, FILTER_SANITIZE_STRING);

   $total_rooms = 0;

   $check_bookings = $conn->prepare("SELECT * FROM `bookings` WHERE check_in = ?");
   $check_bookings->execute([$check_in]);

   while($fetch_bookings = $check_bookings->fetch(PDO::FETCH_ASSOC)){
      $total_rooms += $fetch_bookings['rooms'];
   }

   // Antrenör günde 10 üyeye bakabiliyorsa
   if($total_rooms >= 10){
      $warning_msg[] = 'Müsait değil';
   }else{
      $success_msg[] = 'Müsait';
   }

}

if(isset($_POST['book'])){

   $booking_id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $rooms = $_POST['rooms'];
   $rooms = filter_var($rooms, FILTER_SANITIZE_STRING);
   $check_in = $_POST['check_in'];
   $check_in = filter_var($check_in, FILTER_SANITIZE_STRING);
   $check_out = $_POST['check_out'];
   $check_out = filter_var($check_out, FILTER_SANITIZE_STRING);
   $adults = $_POST['adults'];
   $adults = filter_var($adults, FILTER_SANITIZE_STRING);

   $total_rooms = 0;

   $check_bookings = $conn->prepare("SELECT * FROM `bookings` WHERE check_in = ?");
   $check_bookings->execute([$check_in]);

   while($fetch_bookings = $check_bookings->fetch(PDO::FETCH_ASSOC)){
      $total_rooms += $fetch_bookings['rooms'];
   }

   if($total_rooms >= 30){
      $warning_msg[] = 'rooms are not available';
   }else{

      $verify_bookings = $conn->prepare("SELECT * FROM `bookings` WHERE user_id = ? AND name = ? AND email = ? AND number = ? AND rooms = ? AND check_in = ? AND check_out = ? AND adults = ? ");
      $verify_bookings->execute([$user_id, $name, $email, $number, $rooms, $check_in, $check_out, $adults]);

      if($verify_bookings->rowCount() > 0){
         $warning_msg[] = 'Müsait değil!';
      }else{
         $book_room = $conn->prepare("INSERT INTO `bookings`(booking_id, user_id, name, email, number, rooms, check_in, check_out, adults) VALUES(?,?,?,?,?,?,?,?,?)");
         $book_room->execute([$booking_id, $user_id, $name, $email, $number, $rooms, $check_in, $check_out, $adults]);
         $success_msg[] = 'Rezervasyon Oluşturuldu!';
      }

   }

}

if(isset($_POST['send'])){

   $id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   $verify_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $verify_message->execute([$name, $email, $number, $message]);

   if($verify_message->rowCount() > 0){
      $warning_msg[] = 'Mesaj Gönderilemedi!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$id, $name, $email, $number, $message]);
      $success_msg[] = 'Mesajınız İletildi!';
   }

}

?>



<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta http-equiv="content-type" content="text-html"; charset="utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="tr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Bireysel Antrenörüm | Üye</title>
    <link type="image/png" rel="icon" href="images/logo_transparent.png">
    <script type="text/javascript" src="frameworks/JQuery/jquery-3.6.0.min" language="javascript"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script type="text/javascript" src="Ayarlar/fonksiyonlar.js" language="javascript"></script>
</head>

<body>
     <!--! header section start -->
     <header class="header">
        <a href="user_page.php" class="logo">
            <img src="images/logo_transparent.png" alt="logo" />
        </a>
        <nav class="navbar">
            <a href="user_page.php" class="active">Ana Sayfa</a>
            <a href="menu.php" >Branşlar</a>
            <a href="about.php" >Program</a>
            <a href="antrenor.php" >Eğitmenler</a>
            <a href="bookings.php">Randevularım</a>
            <a href="logout.php" class="bi bi-box-arrow-right"> Çıkış</a>
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

    <!--! header profile start -->
    <!--!
        <div class="icons">
            <div class="icon_userbtn"  ></div>
        </div>


        <div class="profile"> 
            <img src="images/antrenor-1.jpg" alt="">
            <h3>Betül Koral</h3>
            <span>Üye</span>
            <a href="profile.html" class="userbtn">Profili Görüntüle</a>
            <div class="flex-btn">
                <a href="login_form.php" class="option_userbtn">Giriş</a>
                <a href="register_form.php" class="option_userbtn">Kayıt</a>
            </div>
        </div>
    -->
    <!--! header profile end -->



    </header>
    <!--! header section end -->


    <!--! home section start -->
    <section class="home" id="home">
        <div class="content">
            <h1>Hoşgeldin, Üye <span><?php echo $_SESSION['user_name'] ?></span></h1>
            <h3>Bireysel Antrenörüne Hoşgeldin!</h3>
        </div>
    </section> 
    <!--! home section end -->
<!--! menu section start -->
    <section class="menu" id="menu"> 
            <h1 class="heading">Tüm <span>Branşlar</span></h1>
            <div class="box-container">
                <div class="box">
                    <div class="box-head">
                        <img src="images/menu-6.jpg" alt="menu" />
                        <span class="menu-category"></span>
                        <h3>Pilates</h3>
                        <div class="price">Sıkı bir vücuda kısa sürede kavuşmanızı sağlayan 
                            Pilates size yalnızca fit bir vücut vaad etmekle kalmıyor aynı 
                            zamanda...
                        </div>
                    </div>
                    <div class="box-bottom">
                        <a href="antrenor.php" class="btn">Antrenör Bul</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-head">
                        <img src="images/menu-5.jpg" alt="menu" />
                        <span class="menu-category"></span>
                        <h3>Cruch Burn</h3>
                        <div class="price">
                            Karın ve bel bölgesini güçlendirmek, karın bölgesindeki yağları hızlı  ve sağlıklı
                            bir şekilde yok etmek isteyenlerin birinci tercihi.
                        </div>
                    </div>
                    <div class="box-bottom">
                        <a href="antrenor.php" class="btn">Antrenör Bul</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-head">
                        <img src="images/yoga-1.jpg" alt="menu" />
                        <span class="menu-category"></span>
                        <h3>Hatha Yoga</h3>
                        <div class="price"> 
                            Hatha Yoga'nın Amacı, bedensel, zihinsel ve ruhsal yaşantımıza bir denge
                            getirmek, rahatlama ve dinginlik sağlamaktır.
                        </div>
                    </div>
                    <div class="box-bottom">
                        <a href="antrenor.php" class="btn">Antrenör Bul</a>

                    </div>
                </div>
                <div class="box">
                    <div class="box-head">
                        <img src="images/menu-4.jpg" alt="menu" />
                        <span class="menu-category"></span>
                        <h3>Streching</h3>
                        <div class="price">Sıkı çalıştığınız bir antrenman sonrası vücudunuza 
                            ve size iyi gelecek, sporun yarattığı yorgunluktan kurtulacağınız ve 
                            kaslarınızı esneterek gevşemenizi sağlayan Streching...</div>

                    </div>
                    <div class="box-bottom">
                        <a href="antrenor.php" class="btn">Antrenör Bul</a>

                    </div>
                </div>
            </div>

            
        </section>
        <!--! menu section end -->


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
         <!--! reservation section start -->

    <section class="reservation" id="reservation">
        <form action="" method="post">
            <h3>RANDEVU</h3>
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
                    <input type="number" name="number" placeholder="Telefon Numarası" maxlength="11" required class="input">
                </div>
                <div class="box">
                    <p>Program <span>*</span></p>
                    <select name="rooms" class="input" required>
                    <option value="1" selected>Standart Plan</option>
                    <option value="2">Komple Plan</option>
                    <option value="3">Premium Plan</option>
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
                <div class="box">
                    <p>Eğitimler <span>*</span></p>
                    <select name="adults" class="input" required>
                    <option value="1" selected>Kişisel Gelişim</option>
                    <option value="2">Pilates</option>
                    <option value="3">Yoga</option>
                    </select>
                </div>
            </div>
            <input type="submit" value="Rezervasyon oluştur" name="book" class="adminbtn">
        </form>
    </section>

    <!--! reservation section end -->

        <!--! review section start -->
        <section class="review" id="review">
            <h1 class="heading">Müşterilerimiz <span></span></h1>
            <div class="box-container">
                <div class="box">
                    <img src="images/quote.png" alt="quote" />
                    <p>
                        "Koçumla eşleştirildikten sonra hayatımı değiştirdi. Ona bağlı hissettim,
                        ihtiyaçlarımı dinliyor, hedeflerime ulaşmama yardım ediyor ve bir insan olarak beni 
                        önemsiyor."
                    </p>
                    <img src="images/avatar-1.png" alt="avatar" class="user" />
                    <h3>Ceren Örgüç</h3>
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
                        "Bu platforma dahil olmak, son 1 yılda kendim için verdiğim en iyi karar oldu. 
                        Duygusal durumumu, fitness hedeflerimi önemseyen ve sadece benim için orada olan 
                        birine sahip olmak harika..."
                    </p>
                    <img src="images/avatar-2.png" alt="avatar" class="user" />
                    <h3>Emre Akkurt</h3>
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
                        "27 yaşındayım ve hayatımın en iyi halindeyim, aynı zamanda kendimi her 
                        zamankinden daha güçlü hissediyorum. Benim için tasarlanan program ve diyet
                        bana istediğim sonuçları verdi."
                    </p>
                    <img src="images/avatar-3.png" alt="avatar" class="user" />
                    <h3>Büşra Nur Tokgöz</h3>
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
            <form action="" method="POST">
                <h3>Temasta Bulun</h3>
                <div class="inputBox">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="İsminizi girin" name="name" required />
                </div>
                <div class="inputBox">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email adresinizi girin" required />
                </div>
                <div class="inputBox">
                    <i class="fas fa-phone"></i>
                    <input type="text" name="number" placeholder="Telefon Numarası" maxlength="11" required/>
                </div>
                <div class="inputBox">
                    <i class="fas fa-message"></i>
                    <textarea name="message" > 
                    </textarea>
                </div>
                <div>
                    <input type="submit" name="send" class="btn" value="İletişim" />
                </div>
            </form>
        </div>
    </section>
    <!--! contact section end -->

        <!--! blogs section end -->
        <section class="blogs" id="blog">
            <h1 class="heading">blog</h1>
            <div class="box-container">
                <div class="box">
                    <div class="image">
                        <img src="images/blog-1.jpg" alt="blog" />
                    </div>
                    <div class="content">
                        <a href="#" class="title">Derya İle Beslenme: Diyetisyenler Haftası</a>
                        <span>12 HAZİRAN</span>
                        <p>
                            Bu yılın başlarında, kayıtlı diyetisyen ve spor beslenme uzmanı Derya Tunç' u
                            uzman ekibimize dahil ettik.
                        </p>
                        <a href="#" class="btn">Daha Fazla>></a>
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="images/blog-2.jpg" alt="blog" />
                    </div>
                    <div class="content">
                        <a href="#" class="title"> Sonbahar İçin En İyi Fitness İpuçları</a>
                        <span>10 EYLÜL</span>
                        <p>
                            Sonbahara geçiş genellikle bir "İşe Dönüş" hissi uyandırır, insanları egzersize teşvik etmek istediğim
                            tutum budur.
                        </p>
                        <a href="#" class="btn">Daha Fazla>></a>
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="images/blog-3.jpg" alt="blog" />
                    </div>
                    <div class="content">
                        <a href="#" class="title">Ölçekler Neden Dalgalanıyor?</a>
                        <span>22 NİSAN</span>
                        <p>
                            Kilo vermeye çalışırken tartıdaki dalgalanmalar kişinin gününü, haftasını ve hatta diyetini
                            düzene sokabilir veya bozabilir.
                        </p>
                        <a href="#" class="btn">Daha Fazla>></a>
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="images/blog-4.jpg" alt="blog" />
                    </div>
                    <div class="content">
                        <a href="#" class="title">Tatil Dönüşü Yolunuza Devam!</a>
                        <span>29 OCAK</span>
                        <p>
                            Birçokları için bu hafta sonu yozlaşmış akşam yemekleri, kutu çikolatalar ve bardak
                            baloncuklarla doluydu.
                        </p>
                        <a href="#" class="btn">Daha Fazla>></a>
                    </div>
                </div>
            </div>
        </section>
        <!--! blogs section start -->

        <!--! footer section start -->
        <section class="footer" id="footer">
            <div class="search">
                <input type="text"
                class="search-input" placeholder="Ara" />
                <button class="btn btn-primary">Ara</button>
            </div>
            <div class="share">
                <a href="" class="fab fa-facebook" target="_blank"></a>
                <a href="" class="fab fa-twitter" target="_blank"></a>
                <a href="" class="fab fa-instagram" target="_blank"></a>
                <a href="" class="fab fa-linkedin" target="_blank"></a>
                <a href="" class="fab fa-pinterest" target="_blank"></a>
            </div>
            <div class="links">
                <a href="user_page.php" class="active">Ana Sayfa</a>
                <a href="user_page_brans.php" >Branşlar</a>
                <a href="user_page_program.php" >Program</a>
                <a href="user_page_antrenor.php" >Eğitmenler</a>
                <a href="bookings.php" >Randevularım</a>
                <a href="logout.php" class="bi bi-box-arrow-right"> Çıkış</a>
            </div>
            <div class="credit">
                created by <span>Emine Betül Koral</span> | Tüm Hakları Saklıdır. 
            </div>
        </section>
        <!--! footer section end -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <script src="js/script.js"></script>

        <?php
            include 'components/message.php';
        ?>

    </body>
</html>
<?php
$VeritabaniBaglantisi = null;  //veri tabanı burada kapanacak
ob_flush();
ob_end_clean();
?>