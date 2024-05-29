<?php
session_start();
include 'connection.php';

if (isset($_POST['search'])) {
    $search_term = mysqli_real_escape_string($db_connect, $_POST['search_term']);
    
    $query = "
        (SELECT 'Veg' AS category, name, price, weight, file FROM items WHERE name LIKE '%$search_term%')
        UNION
        (SELECT 'meat' AS category, name, price, weight, file FROM item2 WHERE name LIKE '%$search_term%')
    ";

    $result = mysqli_query($db_connect, $query);

    if ($result) {
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $_SESSION['search_results'] = $results;
        header("Location: product.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($db_connect);
    }
} else {
    header("Location: index.php");
    exit();
}
?>

