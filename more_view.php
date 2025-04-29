<?php
include_once "includes/database.php";
include_once "includes/functions.php";

$men_sneakers = fetchMenSneakers($conn);
$women_sneakers = fetchWomenSneakers($conn);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/more_view.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=League+Spartan:wght@300;400;600;700;800&family=Open+Sans:ital,wght@0,400;0,700;1,800&family=Poppins:ital,wght@0,200;0,400;0,500;0,600;1,200;1,300;1,400&family=Ubuntu:wght@500&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Vortex</title>
</head>

<body>
    <header>
        <div class="container">
        <a class="first" href="index.php"><i class="fa-solid fa-gem">Vortex</i></a>
            <div class="links">
                <i class="fa-solid fa-bars"></i>
                <ul>
                    <li class="coffer"><a href="signup.html"><i class="fa-solid fa-user"></i></a></li>
                    <li class="coffer"><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="men" id="men">
        <div class="container">
            <h1>Men Products</h1>
            <div class="product">
                <?php
                foreach ($men_sneakers as $product) {
                    echo '<div class="pro">';
                    echo "<img src='{$product['image_url']}' alt=''>";
                    echo "<div class='des'>";
                    echo "<span>" . $product['brand'] . "</span>";
                    echo  "<h5>" . $product['name'] . "</h5>";
                    echo '<div class="star">';
                    $string = '<i class="fas fa-star"></i>';
                    echo str_repeat($string, 5);

                    echo '</div>';
                    echo '<h4>$' . $product['price']  . '</h4>';
                    echo '</div>';
                    echo '<a href="#"><i class="fas fa-shopping-cart"></i></a>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="more-banner">
        <div class="container">
            <div class="content">
               <?php 
               for ($i = 1; $i < 7; $i++) {
                    echo '<img src="image/m' . $i . '.png" alt="loading">';
                }
               ?>
            </div>
        
        </div>
    </div>
    <div class="men women" id="women">
        <div class="container">
            <h1>Women Products</h1>
            <div class="product">
                <?php
                foreach ($women_sneakers as $product) {
                    echo '<div class="pro">';
                    echo "<img src='{$product['image_url']}' alt=''>";
                    echo "<div class='des'>";
                    echo "<span>" . $product['brand'] . "</span>";
                    echo  "<h5>" . $product['name'] . "</h5>";
                    echo '<div class="star">';
                    $string = '<i class="fas fa-star"></i>';
                    echo str_repeat($string, 5);

                    echo '</div>';
                    echo '<h4>' . $product['price'] . '</h4>';
                    echo '</div>';
                    echo '<a href="#"><i class="fas fa-shopping-cart"></i></a>';
                    echo '</div>';
                }
                ?>

            </div>
        </div>
    </div>
</body>