<?php
include_once "includes/database.php";
include_once "includes/functions.php";

$states = fetchStates($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Method</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/payment_style.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=League+Spartan:wght@300;400;600;700;800&family=Open+Sans:ital,wght@0,400;0,700;1,800&family=Poppins:ital,wght@0,200;0,400;0,500;0,600;1,200;1,300;1,400&family=Ubuntu:wght@500&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
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
                    <li class="coffer"><a href="#"><i class="fa-solid fa-bag-shopping"></i></a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="payment-container">
        <div class="container">
                <h1>Payment Method</h1>
                <hr>
                <div class="payment-content">
                    <form id="payment-form">
                        <div class="form-group">
                            <label>Shipping Address <span>*</span></label>
                            <input type="text" name="address" placeholder="Jl. Bojong timur no 65, Bumi datar, kapuas">
                        </div>
                        <div class="form-group">
                            <label>State / Province <span>*</span></label>
                            <select name="state" id="state" required>
                                <option value="">Select a State</option>
                                <?php foreach ($states as $state): ?>
                                    <option value="<?= $state['id'] ?>"><?= htmlspecialchars($state['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>City <span>*</span></label>
                            <select name="city" id="city" required>
                                <option value="">Select a City</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Postal Code <span>*</span></label>
                            <input type="text" name="postal_code" id="postal_code" readonly>
                        </div>
                        <div class="form-group">
                            <label>Card Number <span>*</span></label>
                            <input type="password" name="card_number" placeholder="**** **** **** ****">
                        </div>
                        <div class="form-group">
                            <label>Expiration Date<span>*</span> </label>
                            <input type="text" name="expiry" placeholder="MM / YY">
                        </div>
                        <div class="form-group">
                            <label>CVC <span>*</span></label>
                            <input type="text" name="cvc" placeholder="CVC">
                        </div>
                    </form>

                    <div class="order-summary">
                        <h2>Order Summary</h2>
                        <div class="summary-line">
                            <span>Subtotal</span>
                            <span>Rp 149.995</span>
                        </div>
                        <div class="summary-line">
                            <span>Shipping</span>
                            <span>Rp 33.000</span>
                        </div>
                        <div class="total">
                            <span>Total</span>
                            <span>Rp 149.995</span>
                        </div>
                        <button class="checkout-btn">Check out</button>
                    </div>
                </div>
        </div>
        <div id="popup" style="display: none;">
            <div class="popup-content">
                <h2>Commande Confirmée !</h2>
                <p>Merci pour votre achat !</p>
                <button id="closePopup">Fermer</button>
                </div>
        </div> 
    </div>
    <script src="js/payment.js"></script>
</body>
<script>
document.getElementById("state").addEventListener("change", function() {
    const stateId = this.value;

    // Reset city and postal code when state changes
    document.getElementById("city").innerHTML = '<option value="">Select a City</option>';
    document.getElementById("postal_code").value = '';  // Clear postal code

    if (!stateId) {
        return;
    }

    fetch(`get_cities.php?state_id=${stateId}`)
        .then(res => res.json())
        .then(data => {
            const citySelect = document.getElementById("city");
            data.forEach(city => {
                const option = document.createElement("option");
                option.value = city.id;
                option.textContent = city.name;
                citySelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching cities:', error));
});

document.getElementById("city").addEventListener("change", function() {
    const cityId = this.value;

    if (!cityId) {
        document.getElementById("postal_code").value = '';  // Clear postal code if no city is selected
        return;
    }

    fetch(`get_postal_code.php?city_id=${cityId}`)
        .then(res => res.text())
        .then(postalCode => {
            document.getElementById("postal_code").value = postalCode;
        })
        .catch(error => console.error('Error fetching postal code:', error));
});
</script>

</html>