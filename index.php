<?php

include "connect.php";
session_start();

$category = "SELECT * FROM category";
$catResult = mysqli_query($conn, $category);

if(mysqli_num_rows($catResult) > 0)
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

      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="responsive.css">

      <title>Index Page</title>
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
                                    <li><a href="#">Contact Us</a> </li>
                                    <li><a href="/User/cart.php"><i class="fab fa-opencart"></i></a></li>
                                    <li><a href="/User"><b>
                                          <?php

                                          if(isset($_SESSION['email']))
                                          {
                                                $email = $_SESSION['email'];
                                                $data = "SELECT * FROM user WHERE email = '$email'";
                                                $result = mysqli_query($conn, $data);

                                                if(mysqli_num_rows($result) > 0)
                                                {
                                                      while($row = mysqli_fetch_assoc($result))
                                                      {
                                                            echo $row['fname']." ".$row['lname']."</b></a>";
                                                      }
                                                }
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
                        <i class="fas fa-user" onclick="window.location.href='/User/'"></i>
                  </div>
                  <div class="col">
                        <i class="fab fa-opencart" onclick="window.location.href='/User/cart.php'"></i>
                  </div>
                  <div class="col">
                        <i class="fas fa-stream"></i>
                  </div>
                  
            </div>
      </div>
</div>


<div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active slide-1">
            <div class="container">
                  <div class="row">
                        <div class="col-md-8">
                              <div class="tags">
                                    <p class="discount">60% Discount</p>
                                    <h3>Jyotsna Sarees</h3><hr>
                                    <h1>NEW SALE COLLECTION </h1>
                                    <p class="desc">Best Cloathing of 2022</p>
                                    <button>SHOP NOW</button>
                              </div>
                        </div>
                        <div class="col-md-4">
                              <img src="./assets/tagpic.png" alt="" class="tagpic">
                        </div>
                  </div>
            </div>
        </div>
        <div class="carousel-item slide-2">
            <div class="container">
                  <div class="row">
                        <div class="col-md-4">
                              <img src="./assets/tagpic (3).png" alt="" class="tagpic">
                        </div>
                        <div class="col-md-8">
                              <div class="tags">
                                    <p class="discount">LATEST</p>
                                    <h1>FASH SPECIAL <hr>SAREE COLLECTION </h1>
                                    <button>SHOP NOW</button>
                              </div>
                        </div>
                  </div>
            </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

<br>
<br>
<br>


<div class="category">
      <h1><center>Shop by Category</center></h1>
      <hr>

      <div class="container">
            <div class="row">
                  <?php

                        while($proCategory = mysqli_fetch_assoc($catResult))
                        {

                  ?>
                  <div class="col-md-12">
                        <div class="cardbox">
                              <div class="row">
                                    <div class="col-md-4">
                                          <div class="vectorleft"></div>
                                          <?php ?>
                                          <img src="./assets/category/<?php echo $proCategory['image']; ?>" alt="" class="propic">
                                    </div>
                                    <div class="col-md-8">
                                          <div class="vectorright"></div>
                                          <div class="procontent">
                                                <p class="contentHeading"><?php echo $proCategory['name']; ?></p><hr>
                                                <p><?php echo $proCategory['description']; ?></p>
                                                <button onclick="window.location.href='/Product/gallery.php?name=<?php echo $proCategory['name'] ?>'" target="_blank">Explore</button>
                                                <p class="contenttag"></p>
                                                
                                          </div>
                                    </div>
                              </div>
                              
                        </div>
                       
                  </div>
                  <?php }} ?>
            </div> 
      </div>
</div>
<br>
<br>
<br>

<div class="features">
      <div class="container">
            <h1>Features</h1><hr>
            <br>
            <div class="row">
                  <div class="col-md-3">
                        <div class="featurecard">
                              <div class="featureicon">
                                    <i class="fas fa-shipping-fast"></i>
                              </div>
                              <div class="featureheading">
                                    <h4>Fast Shipping</h4>
                              </div>
                              <hr>
                              <div class="featurecontent">
                                    <p> Offers free standard shipping at all times, with delivery within three to six business days.</p>
                              </div>
                        </div>
                  </div>
                  <div class="col-md-3">
                        <div class="featurecard">
                              <div class="featureicon">
                                    <i class="fas fa-user-shield"></i>
                              </div>
                              <div class="featureheading">
                                    <h4>Secure Payment</h4>
                              </div>
                              <hr>
                              <div class="featurecontent">
                                    <p>Ensures the confidentiality of private information</p>
                              </div>
                        </div>
                  </div>
                  <div class="col-md-3">
                        <div class="featurecard">
                              <div class="featureicon">
                                    <i class="fas fa-hand-holding-usd"></i>
                              </div>
                              <div class="featureheading">
                                    <h4>Moneyback Gaurantee</h4>
                              </div>
                              <hr>
                              <div class="featurecontent">
                                    <p>A promise that the money a person spent on a product will be returned if the product is not good enough</p>
                              </div>
                        </div>
                  </div>
                  <div class="col-md-3">
                        <div class="featurecard">
                              <div class="featureicon">
                                    <i class="fas fa-info-circle"></i>
                              </div>
                              <div class="featureheading">
                                    <h4>Online Support</h4>
                              </div>
                              <hr>
                              <div class="featurecontent">
                                    <p> Providing customer service and helping customers resolve various issues</p>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<br>
<br>
<br>

<footer>

      <img src="./assets/js-logo.png" alt="">

      <div class="links">
            <ul>
                  <li><i class="fab fa-facebook-square"></i></li>
                  <li><i class="fab fa-instagram"></i></li>
                  <li><i class="fab fa-twitter"></i></li>
            </ul>
            <ul>
                  <li>Info</li>
                  <li>Support</i></li>
                  <li>Marketing</i></li>
            </ul>
            
      </div>
      <center><p>COPYRIGHT &copy; - 2022: Chinmay Limje</p></center>
</footer>
</body>
</html>