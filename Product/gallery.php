<?php
      session_start();
      include "../connect.php";

      $email = $_SESSION['email'];
      $data = "SELECT * FROM user WHERE email = '$email'";
      $userresult = mysqli_query($conn, $data);

      if(mysqli_num_rows($userresult) > 0)
      {
            while($user = mysqli_fetch_assoc($userresult))
            {
                  $fname = $user['fname'];
                  $lname = $user['lname'];
            }
      }
      
      $category = $_GET['name'];
            

      $sql = "SELECT * FROM products WHERE category = '$category'";
      $result = mysqli_query($conn, $sql);


      if(mysqli_num_rows($result) > 0)
      {

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

     <link rel="stylesheet" href="/style.css">
     <link rel="stylesheet" href="/responsive.css">

    <title>Product</title>
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
                                      <li><a href="#"><i class="fab fa-opencart"></i></a></li>
                                      <li><a href="/User"><b>
                                            <?php

                                            if(isset($_SESSION['email']))
                                            {
                                                echo $fname." ".$lname."</b></a>";
                                            }
                                            else
                                            {
  
                                            ?></b></a>
                                            <button onclick="window.location.href='/User/'">Log In</button>
                                            <?php
                                            }
                                            ?>
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
                          <i class="fas fa-user"></i>
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
</div>

<div class="gallery">
    <div >
        <p class="freetxt">Jyotsna Sarees</p>
    </div>
    <div class="panel">
        
        <div class="pName">
            <h2><?php echo $category;?></h2>
            <p>New Arrivals</p>
        </div>
        
    </div>
    <div class="container-fluid">
    
        <div class="row">
        <?php
                        while($row = mysqli_fetch_assoc($result))
                        { $categoryName = $row['category'];
                    ?>
            <div class="col-md-3">
                <div class="productCard">
                    <div class="productImg">
                        <img src="/assets/Pure Brasso/<?php echo $row['image'];?>" alt="">
                    </div>
                    <hr>
                    <div class="productContent">
                        <p><b>Saree Type: <?php echo $row['name']; ?> </b></p>
                        <p>Price: INR <?php echo $row['price']; ?>/-</p>
                        <p><button class="btn btn-primary" onclick="window.location.href='/Product/product.php?id=<?php echo $row['id'] ?>'">View</button></p>
                    </div>
                </div>
                
            </div>
            <?php }}?>
        </div>
    </div>
</div>
<br>
<br>
<br>
</body>
</html>