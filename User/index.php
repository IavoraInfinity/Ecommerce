<?php

include "../connect.php";
session_start();

if(!isset($_SESSION['email']))
{
    header("Location:./login.php");
}
$email = $_SESSION['email'];

$data = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $data);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $fname = $row['fname'];
        $lname = $row['lname'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!--BOOTSTRAP-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!--BOOTSTRAP END-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">

</head>
<body>
<div class="panel">
      <div class="container">
            <div class="row">
                  <div class="col-md-3">
                        <div class="logo">
                              <h3>Jyotsna Sarees<span>.</span></h3>
                        </div>
                        
                  </div>
                  <div class="col-md-9">
                        <div class="nav">
                              <ul>
                                    <li><a href="/">Home</a> </li>
                                    <li><a href="#">Category</a> </li>
                                    <li><a href="#">Latest</a> </li>
                                    <li><a href="#">Contact</a> </li>
                                    <li><a href="cart.php"><i class="fab fa-opencart"></i></a></li>
                                    <li>
                                          
                                    </li>
                              </ul>
                        </div>
                  </div>
            </div>
      </div>
</div>
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

<div class="profile">
      <div class="container">
            <h3>DashBoard</h3>
            <h5>Welcome: <?php echo $fname; ?> <?php echo $lname; ?></h5>
            <form action="logout.php" method="post">
                  <button name="logout" class="logout">Logout</button>
            </form>
      </div>
</div>
    
    
</body>
</html>