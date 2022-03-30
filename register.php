<?php
  require './connection.php';
  
  if(isset($_POST['register'])) {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $password = md5($_POST['password']);
    if($email != '' && $nama != '' && $password != ''){
      $sql = "INSERT INTO users(email, nama, password) VALUES('$email', '$nama', '$password')";
      $query = mysqli_query($conn, $sql);
      if($query){
        echo "<script>alert('berhasil')</script>";
        header('location: login.php');
      }else{
        echo "<script>alert('email anda sudah terdaftar')</script>";
      }
    }else{
      echo "<script>alert('Field anda ada yang kosong, silahkan isi semua field')</script>";
    }
  }
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in</title>    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body >
    
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh">
        <form class="col-6" action="" method="post">
            <h1 class="h3 mb-3 fw-normal">Please register</h1>

            <div class="form-floating">
              <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
              <input type="username" class="form-control" name="nama" id="nama" placeholder="name@example.com">
              <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>
            
            <button class="w-100 btn btn-lg btn-primary" name="register" type="submit" >Register</button>
            <h5>Sudah mempunyai akun? <a href="login.php" class="text-decoration-none">Login</a></h5>
        </form>
    </div>

    
  </body>
</html>
