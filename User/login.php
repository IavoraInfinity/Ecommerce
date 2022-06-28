<?php

include "../connect.php";
session_start();

if(isset($_SESSION['email']))
{
    header("Location:./");
}

if(isset($_POST["login"]))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $verify = "SELECT * FROM user WHERE email ='$email' and pass = '$pass'";
    $status = mysqli_query($conn, $verify);

    if(mysqli_num_rows($status) > 0)
    {
        echo "<script>alert('Loggedin')</script>";
        $_SESSION['email'] = $email;
        header("Location:./");
    }
    else
    {
        echo "<script>alert('Invalid Credential')</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--BOOTSTRAP-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!--BOOTSTRAP END-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="main.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">

    <title>Login</title>
</head>
<body>
<div class="mob-panel">
      <div class="container">
            <div class="row">
                  <div class="col">
                        <i class="fas fa-home" onclick="window.location.href='/'"></i>
                  </div>
                  <div class="col">
                        <i class="fas fa-user" onclick="window.location.href='/User/'"></i>
                  </div>
                  <div class="col">
                        <i class="fab fa-opencart"></i>
                  </div>
                  <div class="col">
                        <i class="fas fa-stream"></i>
                  </div>
                  
            </div>
      </div>
</div>
<div class="landing">
    <div class="loginBox">
        <h3>Jyotsna Sarees</h3>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Email" require><br>
            <input type="password" name="pass" placeholder="Password" id="pass"><br>
            <input type="checkbox" onclick="display()">Show Password
            <button name="login">Login</button><br>
            <a href="./registration.php">Create Account?</a><br>
            <a href="/">Home</a>
        </form>
    </div>
    
</div>


</body>
</html>