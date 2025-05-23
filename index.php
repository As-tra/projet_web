<?php
include_once "includes/database.php";
include_once "includes/functions.php";

$men_sneakers = fetchMenSneakers($conn);
$women_sneakers = fetchWomenSneakers($conn);
$showPopup = isset($_GET['signup']) && $_GET['signup'] === 'success';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=League+Spartan:wght@300;400;600;700;800&family=Open+Sans:ital,wght@0,400;0,700;1,800&family=Poppins:ital,wght@0,200;0,400;0,500;0,600;1,200;1,300;1,400&family=Ubuntu:wght@500&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Vortex</title>
</head>

<body>
    <?php if ($showPopup): ?>
    <div class="popup-overlay" id="popup">
        <div class="popup-box">
        <h2>Signup Successful!</h2>
        <p>Welcome! You are now registered.</p>
        </div>
    </div>

    <script>
        setTimeout(() => {
        document.getElementById('popup').classList.add('hidden');
        // Optionally remove the URL parameter after hiding
        const url = new URL(window.location);
        url.searchParams.delete('signup');
        window.history.replaceState({}, document.title, url);
        }, 3000);
    </script>
    <?php endif; ?>
    <header>
        <div class="container">
            <i class="fa-solid fa-gem">Vortex</i>
            <div class="links">
                <i class="fa-solid fa-bars"></i>
                <ul>
                    <li><a href="#feature">Features</a></li>
                    <li><a href="#men">Men</a></li>
                    <li><a href="#women">Women</a></li>
                    <li><a href="#about">About us</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="coffer"><a href="signup.html"><i class="fa-solid fa-user"></i></a></li>
                    <li class="coffer"><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="view">
        <div class="container">
            <div class="text">
                <p>If You Want The Best You Are In The Right Place</p>
                <h1>New Sneaker</h1>
                <h2>Solde UP To 90%</h2>
                <p>Available at <span>Vortex</span> Store</p>
                <button><a href="#men">Shop Now</a></button>
            </div>
            <div class="image">
                <img src="image/jordan.png" alt="">
            </div>
        </div>
    </div>
    <div id="feature" id="feature">
        <div class="container">
            <h1>Features</h1>
            <div class="content">
                <div class="fe-box">
                    <i class="fa-solid fa-award"></i>
                    <h3>Top Quality</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Quia porro quam quaerat perspiciatis
                        numquam accusamus
                    </p>
                </div>
                <div class="fe-box">
                    <i class="fa-solid fa-laptop"></i>
                    <h3>Online Order</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Quia porro quam quaerat perspiciatis
                        numquam accusamus
                    </p>
                </div>
                <div class="fe-box">
                    <i class="fa-solid fa-piggy-bank"></i>
                    <h3>Save Money</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Quia porro quam quaerat perspiciatis
                        numquam accusamus
                    </p>
                </div>
                <div class="fe-box">
                    <i class="fa-solid fa-stopwatch"></i>
                    <h3>Save Time</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Quia porro quam quaerat perspiciatis
                        numquam accusamus
                    </p>
                </div>
                <div class="fe-box">
                    <i class="fa-solid fa-store"></i>
                    <h3>large choice</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Quia porro quam quaerat perspiciatis
                        numquam accusamus
                    </p>
                </div>
                <div class="fe-box">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    <h3>beauty and robust</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Quia porro quam quaerat perspiciatis
                        numquam accusamus
                    </p>
                </div>
            </div>
        </div>
    </div>
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
                    $idProduct = $product['id'];
                    echo '<a href="product_details.php?id=' . $idProduct . '"><i class="fas fa-shopping-cart"></i></a>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="banner">
        <div class="container">
            <div class="content">
                <h1>New Arrival</h1>
                <h2>PUBLIC HIGH GUM NATURAL</h2>
                <p>Up to <span> 90%</span> Off- All Sneakers & Accessories</p>
                <button onclick="window.location.href='more_view.php';">Explore More</button>
            </div>
            <img src="image/sportbanner" alt="">
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
                    $idProduct = $product['id'];
                    echo '<a href="product_details.php?id=' . $idProduct . '"><i class="fas fa-shopping-cart"></i></a>';
                    echo '</div>';
                }
                ?>

            </div>
        </div>
    </div>
    <div class="about" id="about">
        <div class="container">
            <h1>About Us</h1>
            <div class="content">
                <div class="image">
                    <img src="image/Shopping-rafiki.png" alt="">
                </div>
                <div class="text">
                    <h2>We Are Vortex Brand</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Ad, sit aliquid saepe cumque qui in soluta impedit obcaecati
                        nobis iure necessitatibus optio, quibusdam magni. Blanditiis
                        pariatur nulla exercitationem quod rerum.</p>
                    <hr>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Ad, sit aliquid saepe cumque qui in soluta impedit obcaecati
                        nobis iure necessitatibus optio, quibusdam magni. Blanditiis
                        pariatur nulla exercitationem quod rerum.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="contact" id="contact">
        <div class="container">
            <h1>Contact</h1>
            <div class="blog">
                <div class="icons">
                    <i class="fa-solid fa-location-dot"></i>
                    <i class="fa-solid fa-envelope"></i>
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="get">
                    <p>Tunisia,Ariana 2080</p>
                    <p>Vortex@shop.com</p>
                    <p>+216 46 123 321</p>
                </div>
                <div class="place">
                    <form action="">
                        <input type="text" name="email" id="" placeholder="Subject">
                        <br>
                        <input type="text" name="email" id="" placeholder="Example@gmail.com">
                        <br>
                        <textarea cols="30" rows="7" placeholder="Feel free to contact us">
                        </textarea>
                        <br>
                        <button>Send</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <footer>
        <div class="info">
            <div class="col">
                <i class="fa-solid fa-gem king">Vortex</i>
                <h4>Contact</h4>
                <p><strong>Adresse:</strong> 2080 Ariana,Ariana</p>
                <p><strong>Phone:</strong> +216 27 723 076</p>
                <p><strong>Hours:</strong> 08:00-20:00,Mon-Sat</p>
                <div class="follow">
                    <h4>Follow us</h4>
                    <div class="icon">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-pinterest"></i>
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <h4>About</h4>
                <a href="#">About Us</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Contact Us</a>
            </div>
            <div class="col">
                <h4>My Account</h4>
                <a href="#">Sign in</a>
                <a href="#">View Cart</a>
                <a href="#">My Wishlist</a>
                <a href="#">Track My Order</a>
                <a href="#">Help</a>
            </div>
            <div class="col install">
                <h4>Install App</h4>
                <p>From App Store or Google Play</p>
                <div class="row">
                    <img src="image/app.jpg" alt="">
                    <img src="image/play.jpg" alt="">
                </div>
                <p>Secured Payment Gateways</p>
                <img src="image/pay.png" alt="">
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2025, Vortex etc -By,Vortex team</p>
        </div>
    </footer>
</body>

</html>