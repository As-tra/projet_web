<?php
include_once "includes/database.php";
include_once "includes/functions.php";

header('Content-Type: application/json');

if (isset($_GET['state_id'])) {
    $state_id = $_GET['state_id'];
    $cities = fetchCitiesByState($conn, $state_id);
    echo json_encode($cities);
} else {
    echo json_encode([]);
}
?>
