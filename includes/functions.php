

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




