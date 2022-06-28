<?php

include "../connect.php";
session_start();

$email = $_SESSION['email'];
if(!isset($email))
{
    echo "<script>alert('Please Login'); window.location.href='/User'</script>";
}

$cartQuery = "SELECT * FROM cart WHERE name = '$email'";
$cartResult = mysqli_query($conn, $cartQuery);



if(mysqli_num_rows($cartResult) > 0)
{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

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
                                    <li><a href="#"><i class="fab fa-opencart"></i></a></li>
                                    <li><a href="/User"><?php
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


<div class="container">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($cart = mysqli_fetch_assoc($cartResult))
            {
                
            
        ?>
        <tr>
            <td>
                <div class="row">
                    <div class="col-md-2">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-10">
                        <h4><?php echo $cart['product_name'] ?></h4>
                        <p>Category: <?php echo $cart['product_category'] ?></p>
                        <p>ID: <?php echo $cart['id'] ?></p>
                    </div>
                </div>
            </td>
            <td><?php echo $cart['price'] ?>/-</td>
            <td>
        </tr>
        <?php
            }

    
        }
        else
        {
            echo "<script>alert('No items in Cart'); window.location.href='/'</script>";
        }

        ?>
    </tbody>
    </table>

    <div class="totalBox">
        <?php

            $totalQuery = "SELECT SUM(price) FROM cart WHERE name='$email'";
            $totalResult = mysqli_query($conn, $totalQuery);

            while($total = mysqli_fetch_assoc($totalResult))
            {
                $amount = $total['SUM(price)'];
            }

            $tax = 300;

        ?>
        <h5>Sub Total: <?php echo $amount; ?>/-</h5>
        <h5>Tax: <?php echo $tax ?>/-</h5>
        <h4>Final Amount: <?php echo $amount+$tax ?>/-</h4>
    </div>
</div>

<br>
<br>
<br>    
</body>
</html>