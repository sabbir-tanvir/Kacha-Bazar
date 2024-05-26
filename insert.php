<?php 
include 'connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $file = $_POST['file'];
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
        header('Location: login.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($db_connect);
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
    <title>Document</title>
    <link rel="stylesheet" href="insert.css">
</head>

<body>
    <section class="contact">
        <h2>
            Upload the Image and Price
        </h2>
        <br>
        <form method="post" enctype="multipart/form-data" class="form">
            <div class="box">
                <div class="input-box">
                    <div class="input-field">
                        <input type="text" placeholder="Name" id="name" name="name" class="item" autocomplete="off">
                        <span class="focus"></span>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-field">
                        <input type="text" placeholder="Price" id="jobTitle" name="pos" class="item" autocomplete="off">
                        <span class="focus"></span>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-field">
                        <input type="text" placeholder="Weight" id="userImage" name="image" class="item" autocomplete="off">
                        <span class="focus"></span>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-field">
                        <input type="file" placeholder="Image URL" id="userImage" name="image" class="item" autocomplete="off">
                        <span class="focus"></span>
                    </div>
                </div>
                <br>

                <div class="btn-box">
                    <button type="submit" name="submit" class="button-89">Submit</button>
                </div>
            </div>
        </form>

    </section>

</body>

</html>