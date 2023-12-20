<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   setcookie('user_id', create_unique_id(), time() + 60*60*24*30, '/');
   header('location:index.php');
}

if(isset($_POST['delete'])){

   $delete_id = $_POST['delete_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_delete = $conn->prepare("SELECT * FROM `antrenor_bookings` WHERE booking_id = ?");
   $verify_delete->execute([$delete_id]);

   if($verify_delete->rowCount() > 0){
      $delete_bookings = $conn->prepare("DELETE FROM `antrenor_bookings` WHERE booking_id = ?");
      $delete_bookings->execute([$delete_id]);
      $success_msg[] = 'Rezervasyon  silindi!';
   }else{
      $warning_msg[] = 'Rezervasyon zaten silindi!';
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
      <title>Rezervasyonlar</title>
      <link type="image/png" rel="icon" href="images/logo_transparent.png">
      <meta name="description" content="">
      <meta name="keywords" content="">
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
            <a href="antrenor_page.php">Ana Sayfa</a>
            <a href="antrenor_page_salon.php" >Salonlar</a>
            <a href="antrenor_page_randevu.php" class="active">Randevularım</a>
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

      <!-- booking section starts  -->

   <section class="bookings">

      <h1 class="dashboardheading">Randevularım</h1>
      <div class="box-container">
         <?php
         $mycookiename = $_COOKIE['user_email'];
         $select_bookings = $conn->prepare("SELECT * FROM `antrenor_bookings` WHERE email = '$mycookiename' ");

         $select_bookings->execute();
         if($select_bookings->rowCount() > 0){
            while($fetch_bookings = $select_bookings->fetch(PDO::FETCH_ASSOC)){
         ?>
         <div class="box">
            <p >İsim Soyisim : <span><?= $fetch_bookings['name']; ?></span></p>
            <p>Email : <span><?= $fetch_bookings['email']; ?></span></p>
            <p>Telefon : <span><?= $fetch_bookings['number']; ?></span></p>
            <p>Tarih : <span><?= $fetch_bookings['check_in']; ?></span></p>
            <p>Saat : <span><?= $fetch_bookings['check_out']; ?></span></p>
            <p>Program : <span><?= $fetch_bookings['rooms']; ?></span></p>
            <p>Eğitim : <span><?= $fetch_bookings['adults']; ?></span></p>
            <p>Rez id : <span><?= $fetch_bookings['booking_id']; ?></span></p>
            <form action="" method="POST">
               <input type="hidden" name="delete_id" value="<?= $fetch_bookings['booking_id']; ?>">
               <input type="submit" value="Rezervasyonu sil" name="delete" class="adminbtn" onclick="return confirm('Bu rezervasyonu sil?');">
            </form>
         </div>
         <?php
         }
         }else{
         ?> 
         <div class="box" style="text-align: center;">
            <p style="padding-bottom: .5rem; text-transform:capitalize;">Rezervasyon bulunamadı!</p>
            <a href="antrenor_page.php#reservation"  class="adminbtn">Yeni rezervasyon</a>
         </div>
         <?php
         }
         ?>
      </div>

   </section>

   <!-- booking section ends -->

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
            <a href="antrenor_page.php">Ana Sayfa</a>
            <a href="antrenor_page_salon.php" >Salonlar</a>
            <a href="antrenor_page_randevu.php" class="active">Randevularım</a>
            <a href="logout.php" class="bi bi-box-arrow-right"> Çıkış</a>
        </div>
        <div class="credit">
            created by <span>Emine Betül Koral</span> | Tüm Hakları Saklıdır. 
        </div>
    </section>
    <!--! footer section end -->


    <script src="js/script.js"></script>

    <?php
    include 'components/message.php';
    ?>

   </body>
</html>
