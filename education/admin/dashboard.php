<?php
include '../components/connect.php';

if(isset($_COOKIE['admin_id'])){
   $admin_id = $_COOKIE['admin_id'];
}else{
   $admin_id = '';
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="tr-TR">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link type="image/png" rel="icon" href="../images/logo_transparent.png">
   <title>Yönetim Paneli</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/main.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include '../components/admin_header.php'; ?>
<!-- header section ends -->


<!-- dashboard section starts  -->

<section class="dashboard">

   <h1 class="dashboardheading">Yönetim Paneli</h1>

   <div class="box-container">

   <div class="box">
      <?php
         $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ? LIMIT 1");
         $select_profile->execute([$admin_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>
      <h3>Hoşgeldiniz!</h3>
      <p><?= $fetch_profile['name']; ?></p>
      <a href="update.php" class="adminbtn">Profili güncelle</a>
   </div>

   <div class="box">
      <?php
         $select_bookings = $conn->prepare("SELECT * FROM `bookings`");
         $select_bookings->execute();
         $count_bookings = $select_bookings->rowCount();
      ?>
      <h3><?= $count_bookings; ?></h3>
      <p>Top Üye Rezervasyonu</p>
      <a href="bookings.php" class="adminbtn">Rezervasyonları görüntüle</a>
   </div>

   <div class="box">
      <?php
         $select_bookings = $conn->prepare("SELECT * FROM `antrenor_bookings`");
         $select_bookings->execute();
         $count_bookings = $select_bookings->rowCount();
      ?>
      <h3><?= $count_bookings; ?></h3>
      <p>Top Antrenör Rezervasyonu</p>
      <a href="antrenor_bookings.php" class="adminbtn">Rezervasyonları görüntüle</a>
   </div>

   <div class="box">
      <?php
         $select_admins = $conn->prepare("SELECT * FROM `admins`");
         $select_admins->execute();
         $count_admins = $select_admins->rowCount();
      ?>
      <h3><?= $count_admins; ?></h3>
      <p>Toplam admin</p>
      <a href="admins.php" class="adminbtn">Yöneticileri görüntüle</a>
   </div>

   <div class="box">
      <?php
         $select_messages = $conn->prepare("SELECT * FROM `messages`");
         $select_messages->execute();
         $count_messages = $select_messages->rowCount();
      ?>
      <h3><?= $count_messages; ?></h3>
      <p>Tüm Mesajlar</p>
      <a href="messages.php" class="adminbtn">Mesajları görüntüle</a>
   </div>

   <div class="box">
      <h3>Hızlı seçim</h3>
      <p>Giriş yap veya Kaydol</p>
      <a href="login.php" class="adminbtn" style="margin-right: 1rem;">Giriş</a>
      <a href="register.php" class="adminbtn" style="margin-left: 1rem;">Kaydol</a>
   </div>
   <div class="box">
      <h3>Salonlar</h3>
      <p>Düzenle veya Yeni oluştur</p>
      <a href="view_gym.php" class="adminbtn" style="margin-right: 1rem;">Düzenle</a>
      <a href="add_gym.php" class="adminbtn" style="margin-left: 1rem;">Oluştur</a>
   </div>


   </div>

</section>


<!-- dashboard section ends -->





<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

<?php include '../components/message.php'; ?>

</body>
</html>