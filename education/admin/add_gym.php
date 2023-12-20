<?php

include '../components/connect.php';

if(isset($_COOKIE['admin_id'])){
   $admin_id = $_COOKIE['admin_id'];
}else{
   $admin_id = '';
   header('location:login.php');
}

if(isset($_POST['delete'])){

   $delete_id = $_POST['delete_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_delete = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
   $verify_delete->execute([$delete_id]);

   if($verify_delete->rowCount() > 0){
      $delete_admin = $conn->prepare("DELETE FROM `admins` WHERE id = ?");
      $delete_admin->execute([$delete_id]);
      $success_msg[] = 'Yönetici silindi!';
   }else{
      $warning_msg[] = 'Yönetici zaten silindi!';
   }

}

if(isset($_POST['submit'])){

    $id = create_unique_id();
    $title = $_POST['title'];
    $title = filter_var($title, FILTER_SANITIZE_STRING);
    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);
    $status = $_POST['status'];
    $status = filter_var($status, FILTER_SANITIZE_STRING);
 
    $thumb = $_FILES['thumb']['name'];
    $thumb = filter_var($thumb, FILTER_SANITIZE_STRING);
    $ext = pathinfo($thumb, PATHINFO_EXTENSION);
    $thumb_size = $_FILES['thumb']['size'];
    $thumb_tmp_name = $_FILES['thumb']['tmp_name'];
    $thumb_folder = '../uploaded_files/'.$thumb;
 
    $add_playlist = $conn->prepare("INSERT INTO `playlist`(id, admin_id, title, description, thumb, status) VALUES(?,?,?,?,?,?)");
    $add_playlist->execute([$id, $admin_id, $title, $description, $thumb, $status]);
 
    move_uploaded_file($thumb_tmp_name, $thumb_folder);
 
    $success_msg[] = 'Yeni salon oluşturuldu!';  
 
 }




?>

<!DOCTYPE html>
<html lang="tr-TR">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link type="image/png" rel="icon" href="../images/logo_transparent.png">
   <title>Yöneticiler</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/main.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include '../components/admin_header.php'; ?>
<!-- header section ends -->


<!-- add gym section starts  -->

<section class="gym-form">

   <h1 class="dashboardheading">Yöneticiler</h1>

   <form action="" method="POST" enctype="multipart/form-data">
    <p>Statü <span>*</span></p>
    <select name="status" required class="box">
        <option value="active">Aktif</option>
        <option value="deactive">Aktif değil</option>
    </select>
    <p>Salon Başlığı <span>*</span></p>
    <input type="text" class="box" name="title" maxlength="100" 
    placeholder="Salon başlığını girin" required>
    <p>Adres <span>*</span></p>
    <textarea name="description" class="box" cols="30" required 
    placeholder="Salonu tanımlayın" maxlength="1000" rows="10" >
    </textarea>
    <p>Salon Resmi <span>*</span></p>
    <input type="file" name="thumb" required accept="images/*" 
    class="box">
    <input type="submit" value="Salon oluştur" name="submit" class="adminbtn">

   </form>

</section>

<!-- add gym section ends -->




<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

<?php include '../components/message.php'; ?>

</body>
</html>