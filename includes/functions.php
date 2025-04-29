<?php
function fetchMenSneakers($conn){

    $query = "SELECT * FROM Sneakers where category='MEN'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error fetching men sneakers: " . mysqli_error($conn));
    }

    $projects = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $projects[] = $row;
    }

    return $projects;
}
function fetchWomenSneakers($conn){

    $query = "SELECT * FROM Sneakers where category='WOMEN'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error fetching men sneakers: " . mysqli_error($conn));
    }

    $projects = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $projects[] = $row;
    }

    return $projects;
}


function fetchProductById($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

    $query = "SELECT * FROM Sneakers WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error fetching product: " . mysqli_error($conn));
    }

    $product = mysqli_fetch_assoc($result);

    return $product;
}

function fetchStates($conn) {
    $query = "SELECT * FROM States";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error fetching states: " . mysqli_error($conn));
    }

    $states = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $states[] = $row;
    }

    return $states;
}

function fetchCitiesByState($conn, $state_id) {
    $state_id = mysqli_real_escape_string($conn, $state_id);

    $query = "SELECT id, name FROM Cities WHERE state_id = '$state_id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error fetching cities: " . mysqli_error($conn));
    }

    $cities = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $cities[] = $row;
    }

    return $cities;
}

function fetchPostalCodeByCity($conn, $city_id) {
    $city_id = mysqli_real_escape_string($conn, $city_id);

    $query = "SELECT postal_code FROM Cities WHERE id = '$city_id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error fetching postal code: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    return $row ? $row['postal_code'] : '';
}




