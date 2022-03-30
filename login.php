<?php 
  session_start();
  require './functions.php';
  
  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $checkEmail = checkData('users', 'email', $email);
    
    if($checkEmail == 1){
      $checkPassword = checkData('users', 'password', $password);
      
      if($checkPassword == 1){
        $_SESSION['login'] = true;
        $data = fetchData('users', 'email', $email);
        $id = $data['id'];
        $_SESSION['user_id'] = $id;
        header('location: user/home.php');
      }else{
        echo "<script>alert('Password anda salah')</script>";
      }
    }else{
      echo "<script>alert('Email anda tidak terdaftar')</script>";
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in</title>    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body >
    
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh">
        <form class="col-6" action="" method="post">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
              <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
              <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>
            
            <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Sign in</button>
            <h5>Belum mempunyai akun? <a href="register.php" class="text-decoration-none">Register</a></h5>
        </form>
    </div>


    
  </body>
</html>
