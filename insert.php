<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['cat'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];

    // File upload handling
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'images/' . $file_name;

    // Check if file is uploaded and move it to the specified folder
    if (move_uploaded_file($tempname, $folder)) {
        // Determine the table based on the category
        if ($category == 'veg') {
            $insert_query = "INSERT INTO items(name, cat, price, weight, file) VALUES ('$name', '$category', '$price', '$weight', '$file_name')";
        } elseif ($category == 'meat') {
            $insert_query = "INSERT INTO item2(name, cat, price, weight, file) VALUES ('$name', '$category', '$price', '$weight', '$file_name')";
        }

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
                        <select id="cat" name="cat" class="item" autocomplete="off">
                            <option value="veg">Vegetable</option>
                            <option value="meat">Meat / Fish</option>
                        </select>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-field">
                        <input type="text" placeholder="Price" id="price" name="price" class="item" autocomplete="off">
                        <span class="focus"></span>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-field">
                        <input type="text" placeholder="Weight" id="weight" name="weight" class="item" autocomplete="off">
                        <span class="focus"></span>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-field">
                        <input type="file" placeholder="Image URL" id="image" name="image" class="item" autocomplete="off">
                        <span class="focus"></span>
                    </div>
                </div>
                <br>

                <div class="btn-box">
                    <button type="submit" name="submit" class="button-89">Submit</button>
                </div>

                <h3>Are You done? Boss 🫣<a href="home.php">Go Back</a></h3>

            </div>
        </form>

    </section>
    <div class="output">
        <h2>User Information</h2>
        <?php
        if (isset($_GET['deleteid'])) {
            $id = $_GET['deleteid'];

            $sql = "DELETE FROM user WHERE id='$id'";
            $run = mysqli_query($db_connect, $sql);

            if ($run) {
                echo "<h1>Data Deleted</h1>";
                header("Location: insert.php");
                exit();
            } else {
                echo "<h1>Data not Deleted</h1>";
            }
        }

        $sql = "SELECT * FROM user";

        $result = mysqli_query($db_connect, $sql);

        if (mysqli_num_rows($result) > 0) {

            echo "<table>";
            echo "<tr><th>ID</th><th>User Name</th><th>Password</th><th>Email</th><th>Edit</th><th>Delete</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["u_name"] . "</td>";
                echo "<td>" . $row["u_pass"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a></td>";
                echo "<td><a href='insert.php?deleteid=" . $row["id"] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No students found";
        }
        ?>

    </div>

    <div class="output">
        <h2>Feedback Information</h2>
        <?php
        if (isset($_GET['deleteid1'])) {
            $id = $_GET['deleteid1'];

            $sql = "DELETE FROM feedback WHERE id='$id'";
            $run = mysqli_query($db_connect, $sql);

            if ($run) {
                echo "<h1>Data Deleted</h1>";
                header("Location: insert.php");
                exit();
            } else {
                echo "<h1>Data not Deleted</h1>";
            }
        }
        $sql = "SELECT * FROM feedback";

        $result = mysqli_query($db_connect, $sql);

        if (mysqli_num_rows($result) > 0) {

            echo "<table >";
            echo "<tr><th>ID</th><th>User Name</th><th>Position</th><th>File</th><th>Edit</th><th>Delete</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["pos"] . "</td>";
                echo "<td>" . $row["file"] . "</td>";
                echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a></td>";
                echo "<td><a href='insert.php?deleteid1=" . $row["id"] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No students found";
        }


        mysqli_close($db_connect);
        ?>
    </div>

</body>

</html>