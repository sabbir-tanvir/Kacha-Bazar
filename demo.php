<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Feedback</title>
</head>
<body>
    <h1>Submit Your Feedback</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Enter your name" required>
        <br>
        <input type="file" name="image" required>
        <br>
        <textarea name="comment" placeholder="Enter your comment" required></textarea>
        <br>
        <input type="text" name="pos" placeholder="Enter position" required>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    include 'connection.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $star = $_POST['star'];
        $pos = $_POST['pos'];
        
        // File upload handling
        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'images/'.$file_name;

        // Move the uploaded file to the specified folder
        move_uploaded_file($tempname, $folder);

        // Insert data into the database
        $insert_query = "INSERT INTO feedback(name, file, comment,star, pos) VALUES ('$name', '$file_name', '$comment','$star', '$pos')";
        if (mysqli_query($db_connect, $insert_query)) {
        } else {
            echo "Error: " . $insert_query . "<br>" . mysqli_error($db_connect);
        }
    }
    ?>

    <h1>Feedbacks</h1>
    <?php
    // Fetch data from the database
    $select_query = "SELECT * FROM feedback";
    $result = mysqli_query($db_connect, $select_query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<h2>" . $row['name'] . "</h2>";
            echo "<p>" . $row['comment'] . "</p>";
            echo "<img src='images/" . $row['file'] . "' alt='Image' width='100'>";
            echo "<p>Position: " . $row['pos'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No feedback found.";
    }






    

    mysqli_close($db_connect);
    ?>
</body>
</html>
