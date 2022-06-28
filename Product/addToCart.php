<?php

include "../connect.php";
$email = $_GET['email'];
$id = $_GET['id'];

if(isset($email))
{
    if(isset($id))
    {
        $productQuery = "SELECT * FROM products WHERE id = '$id'";
        $productResult = mysqli_query($conn, $productQuery);

        if(mysqli_num_rows($productResult) > 0)
        {
            while($product = mysqli_fetch_assoc($productResult))
            {
                $category = $product['category'];
                $name = $product['name'];
                $price = $product['price'];

            }
        }

        $product_id = crypt($id, $email);

        $addVerify = "SELECT * FROM cart WHERE id = '$product_id'";
        $addResult = mysqli_query($conn, $addVerify);

        if(mysqli_num_rows($addResult) > 0)
        {
            echo "<script>alert('Item already existed in cart'); window.location.href='/User/cart.php'</script>";
        }
        else
        {
            $addQuery = "INSERT INTO cart VALUES ('$product_id', '$email', '$id', '$category', '$name', '$price' )";
        
            if(mysqli_query($conn, $addQuery))
            {
                header("Location:/User/cart.php");
            }
            else
            {
                
                echo mysqli_error($conn);
            }

        }

    }
    else
    {
        echo 'not';
    }

    

}
else
{
    echo "<script>alert('please Login'); window.location.href='/User'</script>";
}




?>