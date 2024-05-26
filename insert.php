<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];

    // File upload handling
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'images/' . $file_name;

    // Check if file is uploaded and move it to the specified folder
    if (move_uploaded_file($tempname, $folder)) {
        // Insert data into the database
        $insert_query = "INSERT INTO items(name, price, weight, file) VALUES ('$name','$price','$weight', '$file_name')";
        if (mysqli_query($db_connect, $insert_query)) {
        } else {
            echo "Error: " . $insert_query . "<br>" . mysqli_error($db_connect);
        }
    } else {
        echo "Failed to upload image.";
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
                        <input type="text" placeholder="Price" id="jobTitle" name="price" class="item" autocomplete="off">
                        <span class="focus"></span>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-field">
                        <input type="text" placeholder="Weight" id="userImage" name="weight" class="item" autocomplete="off">
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
            
                <h3>Are You done? Boss 🫣<a href="index.php">Go Back</a></h3>

            </div>
        </form>

    </section>

</body>

</html>