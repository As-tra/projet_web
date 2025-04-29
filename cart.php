<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    if (isset($_POST['increment'])) {
        $_SESSION['cart'][$product_id]['quantity']++;
    } elseif (isset($_POST['decrement'])) {
        if ($_SESSION['cart'][$product_id]['quantity'] > 1) {
            $_SESSION['cart'][$product_id]['quantity']--;
        } else {
            unset($_SESSION['cart'][$product_id]); // Remove item if quantity is 0
        }
    } elseif (isset($_POST['remove'])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

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
    <title>Shopping Cart</title>
</head>

<body>

    <header>
        <div class="container">
            <i class="fa-solid fa-gem">Vortex</i>
            <div class="links">
                <i class="fa-solid fa-bars"></i>
                <ul>
                    <li class="coffer"><a href="#"><i class="fa-solid fa-user"></i></a></li>
                    <li class="coffer"><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
                </ul>
            </div>
        </div>
    </header>

    <main class="wrapper ">

        <h1 class="title">Shopping Cart</h1>
        <div class="cart">
            <div class="cart-items">
                <?php if (!empty($_SESSION['cart'])): ?>
                    <?php foreach ($_SESSION['cart'] as $product_id => $product): ?>
                        <div class="cart-item">
                            <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>">
                            <div class="item-info">
                                <p class="item-name"><?php echo $product['name']; ?></p>
                                <p class="item-price">
                                    <span class="new-price">$<?php echo number_format($product['price'], 2); ?></span>
                                </p>
                            </div>
                            <div class="quantity">
                                <form method="POST" action="" style="display:inline;">
                                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                    <button type="submit" name="decrement" class="quantity-btn">-</button>
                                </form>
                                <span><?php echo $product['quantity']; ?></span>
                                <form method="POST" action="" style="display:inline;">
                                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                    <button type="submit" name="increment" class="quantity-btn">+</button>
                                </form>
                            </div>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <button type="submit" name="remove" class="delete-btn">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Your cart is empty.</p>
                <?php endif; ?>
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