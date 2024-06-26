<?php 
include 'connection.php';

session_start();


if (isset($_POST['login'])) {
    $name = $_POST['a_name'];
    $pass = $_POST['a_pass'];

    $query = "SELECT * FROM admin WHERE a_name = ? AND a_pass = ?";
    $stmt = mysqli_prepare($db_connect, $query);
    
    if ($stmt === false) {
        echo "Error preparing statement: " . mysqli_error($db_connect);
    } else {
        mysqli_stmt_bind_param($stmt, 'ss', $name, $pass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            // Username and password match
            $_SESSION['a_name'] = $name;
            header('Location: insert.php');
            exit;
        } else {
            // Username and password do not match
        }

        mysqli_stmt_close($stmt);
        mysqli_close($db_connect);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <section class="admin">
        <h1>Admin Login</h1>
        <form method="post" action="admin.php" id="login-form">
            <div class="admin-input">
                <div class="username">
                    <input type="text" name="a_name" id="username" class="item" placeholder="Username" required>
                </div>
                <div class="password">
                    <input type="password" name="a_pass" id="password" class="item" placeholder="Password" required>
                </div>
            </div>
            <br>
            <div class="btn">
            <button type="submit" name="login" class="button-89">Login</button>            </div>
        </form>
    </section>
    <script src="login.js"></script>
</body>

</html>
