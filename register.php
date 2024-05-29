<?php 
include 'connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['u_name'];
    $pass = $_POST['u_pass'];
    $num = $_POST['p_num'];
    $email = $_POST['email'];
    $loc = $_POST['location'];

    // Corrected column name in SQL query
    $insert_query = "INSERT INTO user(u_name, u_pass, p_num, email, location) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($db_connect, $insert_query);
    
    // Binding parameters correctly
    mysqli_stmt_bind_param($stmt, 'sssss', $name, $pass, $num, $email, $loc);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($db_connect);
        // Redirect to login.php after successful submission
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($db_connect);
        mysqli_stmt_close($stmt);
        mysqli_close($db_connect);
    }
}
?>
