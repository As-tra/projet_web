<?php
include 'includes/database.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['full_name'];
    $username = $_POST['username'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $sql = "INSERT INTO users (full_name, username, dob, email, password, phone, city, address) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssssss", $fullName, $username, $dob, $email, $password, $phone, $city, $address);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php?signup=success");
            exit(); 
        } else {
            echo "Error: Could not execute the query.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Could not prepare the query.";
    }
}

mysqli_close($conn);
?>
