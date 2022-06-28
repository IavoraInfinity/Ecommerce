<?php

include "../connect.php";
session_start();

    $id = $_GET['id'];
    if(isset($id))
    {
        $sql = "SELECT * FROM products WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $category = $row['category'];
                $image = $row['image'];
                $name = $row['name'];
                $price = $row['price'];
                $desc = $row['description'];
                $status = $row['status'];
            }
        }
    }
    else
    {
        header("Location:/");
    }

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

    $cartQuery = "SELECT * FROM cart WHERE name = '$email'";
    $cartResult = mysqli_query($conn, $cartQuery);

    if(mysqli_num_rows($cartResult) > 0)
    {
        while($cartItem = mysqli_fetch_assoc($cartResult))
        {
            $itemID = $cartItem['product_id'];
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
                    <ul class="unorder">
                        <li class="item"><a href="/">Home</a> </li>
                        <li class="item"><a href="#">Category</a> </li>
                        <li class="item"><a href="#">Latest</a> </li>
                        <li class="item"><a href="#">Contact</a> </li>
                        <li class="item"><a href="#"><i class="fab fa-opencart"></i></a></li>
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



<div class="product">
    <div class="productbox">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="imgbox">
                        <img src="/assets/Pure Brasso/<?php echo $image ?>" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="description">
                        <a href="/">Home</a><br>
                        <a href="./gallery.php?name=<?php echo $category; ?>">Back</a>
                        <p>NEW ARRIVAL</p>
                        <h3>Saree Type: <?php echo $name ?></h3>
                        <h5>Price: INR <?php echo $price ?>/-</h5>
                        <?php

                        if($status == 'instock'){
                        ?>
                        <h6 style="color:green">In Stock</h6>
                        <button name="addtocart" class="btn btn-primary" onclick="window.location.href='addToCart.php?id=<?php echo $id; ?>&email=<?php echo $email; ?>'">Add to Cart</button>

                        <?php
                        }
                        else
                        {
                        ?>
                        <h6 style="color:red;">Out of Stock</h6>
                        <button class="btn btn-primary" disabled>Buy Now</button>
                        <?php
                        }
                        ?>
                        
                        <br><br>
                        <h4>Description</h4>
                        <p><?php echo $desc ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<br>
<br>
<br>
<br>
    
</body>
</html>