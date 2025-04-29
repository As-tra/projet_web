<?php
// Enable error reporting for debugging (remove in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'includes/database.php';

    $address = $_POST['address'] ?? '';
    $city_id = $_POST['city_id'] ?? ''; // Fetch city_id, not city name
    $card_number = $_POST['card_number'] ?? '';
    $expiry = $_POST['expiry'] ?? '';
    $cvc = $_POST['cvc'] ?? '';

    if (empty($address) || empty($city_id) || empty($card_number) || empty($expiry) || empty($cvc)) {
        echo json_encode(['success' => false, 'error' => 'All fields are required']);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO payments (address, city_id, card_number, exp_date, cvc) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $address, $city_id, $card_number, $expiry, $cvc);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
