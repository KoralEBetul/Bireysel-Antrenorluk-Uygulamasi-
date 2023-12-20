<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){ //user_name yapsam da değişmiyor
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

   $check_bookings = $conn->prepare("SELECT * FROM `antrenor_bookings` WHERE check_in = ?");
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

if(isset($_POST['antbook'])){

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

   $check_bookings = $conn->prepare("SELECT * FROM `antrenor_bookings` WHERE check_in = ?");
   $check_bookings->execute([$check_in]);

   while($fetch_bookings = $check_bookings->fetch(PDO::FETCH_ASSOC)){
      $total_rooms += $fetch_bookings['rooms'];
   }

   if($total_rooms >= 30){
      $warning_msg[] = 'rooms are not available';
   }else{

      $verify_bookings = $conn->prepare("SELECT * FROM `antrenor_bookings` WHERE user_id = ? AND name = ? AND email = ? AND number = ? AND rooms = ? AND check_in = ? AND check_out = ? AND adults = ? ");
      $verify_bookings->execute([$user_id, $name, $email, $number, $rooms, $check_in, $check_out, $adults]);

      if($verify_bookings->rowCount() > 0){
         $warning_msg[] = 'Müsait değil!';
      }else{
         $book_room = $conn->prepare("INSERT INTO `antrenor_bookings`(booking_id, user_id, name, email, number, rooms, check_in, check_out, adults) VALUES(?,?,?,?,?,?,?,?,?)");
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
    <title> Bireysel Antrenörüm | Antrenör </title>
    <link type="image/png" rel="icon" href="images/logo_transparent.png">
    <script type="text/javascript" src="frameworks/JQuery/jquery-3.6.0.min" language="javascript"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script type="text/javascript" src="Ayarlar/fonksiyonlar.js" language="javascript"></script>
</head>

<body>
     <!--! header section start -->
     <header class="header">
        <a href="antrenor_page.php" class="logo">
            <img src="images/logo_transparent.png" alt="logo" />
        </a>
        <nav class="navbar">
            <a href="antrenor_page.php" class="active">Ana Sayfa</a>
            <a href="antrenor_page_salon.php" >Salonlar</a>
            <a href="antrenor_page_randevu.php">Randevularım</a>
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
    </header>
    <!--! header section end -->


    <!--! home section start -->
    <section class="home" id="home">
        <div class="content">
            <h1>Hoşgeldin, Antrenör <span><?php echo $_SESSION['admin_name'] ?></span></h1>
            <h3>Bireysel Antrenörüne Hoşgeldin!</h3>
        </div>
    </section> 
    <!--! home section end -->

     <!-- gallery section starts  -->
     <section class="gallery" id="gallery">

        <div class="swiper gallery-slider">
        <div class="swiper-wrapper">
            <img src="images/salon14.jpg" class="swiper-slide" alt="">
            <img src="images/salon18.jpg" class="swiper-slide" alt="">
            <img src="images/yoga-2.jpg" class="swiper-slide" alt="">
            <img src="images/salon24.jpg" class="swiper-slide" alt="">
            <img src="images/salon4.jpg" class="swiper-slide" alt="">
            <img src="images/pilates-3.jpg" class="swiper-slide" alt="">
        </div>
        <div class="swiper-pagination"></div>
        </div>

    </section>

    <!-- gallery section ends -->

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
                    <input type="number" name="number"  maxlength="11" required placeholder="Telefon Numaranızı Girin" class="input">
                </div>
                <div class="box">
                    <p>Salon türü <span>*</span></p>
                    <select name="rooms" class="input" required>
                    <option value="1" selected>Kişisel Gelişim</option>
                    <option value="2">Yoga</option>
                    <option value="3">Pilates</option>
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
                    <p>Salonlar <span>*</span></p>
                    <select name="adults" class="input" required>
                    <option value="1" selected>Court 35 Sport Center</option>
                    <option value="2">Gold Fitness Club</option>
                    <option value="3">Aktif Fitness</option>
                    <option value="4" >White Sports Center</option>
                    <option value="5">Sporium Fitness Center</option>
                    <option value="6">Palmiye WHITE Club</option>
                    <option value="7" >Interfiz Sağlıklı Yaşam Merkezi</option>
                    <option value="8">Zen Pilates</option>
                    <option value="9">Stüdyo İDA</option>
                    <option value="10" >İzmir Karuna Yoga</option>
                    <option value="11">Yogaspace Izmir</option>
                    <option value="12">Tara Yoga</option>
                    </select>
                </div>
            </div>
            <input type="submit" value="Rezervasyon oluştur" name="antbook" class="adminbtn">
        </form>
    </section>

    <!--! reservation section end -->


    <!--! footer section start -->
    <section class="footer" id="footer">
        <div class="search">
            <input type="text"
            class="search-input" placeholder="Search" />
            <button class="btn btn-primary">search</button>
        </div>
        <div class="share">
            <a href="" class="fab fa-facebook" target="_blank"></a>
            <a href="" class="fab fa-twitter" target="_blank"></a>
            <a href="" class="fab fa-instagram" target="_blank"></a>
            <a href="" class="fab fa-linkedin" target="_blank"></a>
            <a href="" class="fab fa-pinterest" target="_blank"></a>
        </div>
        <div class="links">
            <a href="antrenor_page.php" class="active">Ana Sayfa</a>
            <a href="antrenor_page_salon.php" >Salonlar</a>
            <a href="antrenor_page_randevu.php">Randevularım</a>
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