<?php

 include "../connect.php";
 session_start();

if(isset($_SESSION['email']))
{
    header("Location:./");
}

 if(isset($_POST['submit']))
 {
     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $state = $_POST['state'];
     $pincode = $_POST['pincode'];
     $pass = $_POST['pass'];

     $verify = "SELECT * FROM user WHERE email ='$email'";
    $status = mysqli_query($conn, $verify);

    if(mysqli_num_rows($status) > 0)
    {
        echo "<script>alert('Account Exist')</script>";
        
    }
    else
    {
        echo $sql = "INSERT INTO user VALUES ('$phone', '$fname', '$lname', '$phone', '$email', '$address', '$state', '$pincode', '$pass')";
        

        if(mysqli_query($conn, $sql))
        {
            
            echo "<script>alert('Inserted')</script>";
            header("Location:./");
        }
        else
        {
            echo "Error: $sql".mysqli_error($conn);
        }
        
    }

     

 }

 mysqli_close($conn);

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

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">


    <title>Register</title>
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
    <center>
    <div class="signinBox">
        <h3>Jyotsna Sarees</h3>
        <form action="registration.php" method="post">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="fname" placeholder="First Name" required>
                <input type="text" name="lname" placeholder="Last Name">
                <input type="number" name="phone" placeholder="Phone Number">
                <input type="email" name="email" placeholder="Email" id='email' >
                
            </div>
            <div class="col-md-6">
                <input type="text" name="address" placeholder="Address">
                <input type="text" name="state" placeholder="State">
                <input type="number" name="pincode" placeholder="Pincode"> 
                <input type="password" name="pass" placeholder="Password" id="pass" oninput='test()'>
                
                    <p>Password must contain the following:</p>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div>
                </div>
            </div>
        
            
            <button name="submit" onclick="test()">Register</button><br>
            <a href="./">Already Have Account?</a><br>
            <a href="/">HOME</a>
        </form>
    </div>
    </center>
    
</div>
<script src="./main.js"></script>
</body>
</html>

