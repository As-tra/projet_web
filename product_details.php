<?php
session_start();
// session_unset();
// Destroy the session
// session_destroy();
include_once "includes/database.php";
include_once "includes/functions.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $product = fetchProductById($conn, $product_id);

    if (!$product) {
        die('Product not found.');
    }
} else {
    die('No product ID provided.');
}

// fazet el cart lena
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];


    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }


    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        $_SESSION['cart'][$product_id] = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'image_url' => $product['image_url'],
            'old_price' => $product['old_price'],
            'discount' => $product['discount'],
            'quantity' => 1,
        ];
    }
    // header('Location: cart.php');
    // exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=League+Spartan:wght@300;400;600;700;800&family=Open+Sans:ital,wght@0,400;0,700;1,800&family=Poppins:ital,wght@0,200;0,400;0,500;0,600;1,200;1,300;1,400&family=Ubuntu:wght@500&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/product_details.css">
</head>

<body>
    <header>
        <div class="container">
            <i class="fa-solid fa-gem" onclick="window.location.href='index.php'">Vortex</i>
            <div class="links">
                <i class="fa-solid fa-bars"></i>
                <ul>
                    <li class="coffer"><a href="signup.html"><i class="fa-solid fa-user"></i></a></li>
                    <li class="coffer"><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="product-details-container">
        <div class="container">
            <div class="product-image">
                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            </div>

            <div class="product-details">
                <?php if (!empty($product['price'])): ?>
                    <div class="badge">Disc <?php echo htmlspecialchars($product['discount']); ?>%</div>
                <?php endif; ?>
                <div class="product-name"><?php echo htmlspecialchars($product['name']); ?></div>
                <div class="old-price"><?php echo 'Rp ' . number_format($product['old_price']); ?></div>
                <div class="new-price"><?php echo 'Rp ' . number_format($product['price']); ?></div>

                <div class="sizes">
                    <p>Select a size:</p>
                    <button class="selected">38</button>
                    <button>39</button>
                    <button>40</button>
                    <button>41</button>
                    <button>42</button>
                    <button>43</button>
                </div>

                <div class="buttons">
                    <button class="heart general"><i class="fa-regular fa-heart"></i></button>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <button type="submit" class="add-to-cart general">+ Add to cart</button>
                    </form>
                    <button class="buy-now general">Buy now</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="details">Details</div>
        <div class="description">
            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
            <p><?php echo htmlspecialchars($product['description']); ?></p>
            <ul class="details-list">
                <li>Pay over time in interest-free installments with Affirm, Klarna or Afterpay.</li>
                <li>Join adiClub to get unlimited free standard shipping, returns, & exchanges.</li>
            </ul>
        </div>
    </div>

</body>
<script>
    const sizeButtons = document.querySelectorAll('.sizes button');
    sizeButtons.forEach(button => {
        button.addEventListener('click', () => {
            sizeButtons.forEach(btn => btn.classList.remove('selected'));
            button.classList.add('selected');
        });
    });

    const heartButton = document.querySelector('.heart');
    const heartIcon = heartButton.querySelector('i');
    heartButton.addEventListener('click', () => {
        heartButton.classList.toggle('filled');
        if (heartButton.classList.contains('filled')) {
            heartIcon.className = 'fa-solid fa-heart';
        } else {
            heartIcon.className = 'fa-regular fa-heart';
        }
    });
</script>

</html>