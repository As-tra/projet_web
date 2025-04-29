<?php
session_start();
// print_r($_SESSION['cart']);
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=League+Spartan:wght@300;400;600;700;800&family=Open+Sans:ital,wght@0,400;0,700;1,800&family=Poppins:ital,wght@0,200;0,400;0,500;0,600;1,200;1,300;1,400&family=Ubuntu:wght@500&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Shopping Car</title>
</head>

<body>

    <header>
        <div class="container">
            <a class="first" href="index.php"><i class="fa-solid fa-gem">Vortex</i></a>
            <div class="links">
                <i class="fa-solid fa-bars"></i>
                <ul>
                    <li class="coffer"><a href="#"><i class="fa-solid fa-user"></i></a></li>
                    <li class="coffer"><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
                </ul>
            </div>
        </div>
    </header>

    <main class="wrapper">
        <h1 class="title">Shopping Cart</h1>
        <div class="cart">
            <div class="cart-items">
                <?php
                foreach ($_SESSION['cart'] as $product) {
                    echo '<div class="cart-item">';
                    echo '<input type="checkbox">';
                    echo '<img src=' . $product['image_url'] . ' alt="Vantela Republic Low Black Gum">';
                    echo '<div class="item-info">';
                    echo '<p class="item-name">' . $product['name'] . '</p>';
                    echo '<p class="item-price">';
                    echo '<span class="old-price">Rp' . $product['old_price'] . '</span>';
                    echo '<span class="new-price">Rp' . $product['price'] . '</span>';
                    echo '</p>';
                    echo '</div>';
                    echo '<div class="quantity">';
                    echo '<button>-</button>';
                    echo '<span>' . $product['quantity'] . '</span>';
                    echo '<button>+</button>';
                    echo '</div>';
                    echo '<i class="fa-solid fa-trash-can"></i>';
                    echo '</div>';
                }
                ?>

            </div>

            <div class="order-summary">
                <h2>Order Summary</h2>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $item) {
                    $total += $item['price'] * $item['quantity'];
                }
                ?>
                <p>Total: <span class="summary-price">$<?php echo number_format($total, 2); ?></span></p>
                <button class="checkout-btn">Check out</button>
            </div>

        </div>
    </main>



</body>

</html>