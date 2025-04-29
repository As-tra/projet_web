<?php
include_once "includes/database.php";
include_once "includes/functions.php";

if (isset($_GET['city_id'])) {
    $city_id = $_GET['city_id'];
    $postal_code = fetchPostalCodeByCity($conn, $city_id);
    echo $postal_code;
} else {
    echo '';
}
?>
