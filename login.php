<?php 

session_start();
$koneksi = new mysqli ("localhost","root","","webgis-pariwisata");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login WebGis Pariwisata</title>
    <link rel="stylesheet" href="login/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
</head>
<body>
   <div class="overlay"></div>
   <form role="form" method="post" class="box">
       <div class="header">
           <center><h2>Login Akun Anda</h2></center>
       </div>
       <div class="login-area">
           <input type="text" class="username" placeholder="Username" name="user">
           <input type="password" class="password" placeholder="Password" name="pass">
           <input type="submit" value="Login" class="submit" name="login"> 
       </div>
   </form> 

   <?php 
   
    if (isset($_POST['login'])) 
    {
        $data = $koneksi->query("SELECT * FROM t_admin WHERE username='$_POST[user]'
        AND pwd ='$_POST[pass]'");
        $yangcocok = $data->num_rows;
        if ($yangcocok==1) {
           $_SESSION['t_admin']=$data->fetch_assoc();
           
           echo "<script>alert('Login Berhasil');</script>";
           echo "<meta http-equiv='refresh' content='1;url=admin/index.php'>";
        }
        else 
        {
            echo "<script>alert('Login Gagal');</script>";
            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        }
    }
   
   ?>
</body>
</html>