<?php
include 'connection.php';

if (!$db_connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = "";
$price = "";
$updateid = 0;

if (isset($_GET['id'])) {
    $updateid = $_GET['id'];

    $sql = "SELECT * FROM items WHERE id=$updateid";
    $result = mysqli_query($db_connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $name = $row['name'];
        $price = $row['price']; // Corrected variable name
    } else {
        echo "Item not found!";
        exit();
    }
} else {
    echo "Invalid item ID";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price']; // Corrected variable name
    $updateid = $_POST['updateid'];

    $sql = "UPDATE items SET name='$name', price='$price' WHERE id=$updateid"; // Corrected variable name
    $run = mysqli_query($db_connect, $sql) or die(mysqli_error($db_connect));

    if ($run) {
        header("Location: insert.php");
        exit();
    } else {
        echo "<h1>Error Updating Data</h1>";
    }
}

mysqli_close($db_connect);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Item</title> <!-- Corrected title -->
    <link rel="stylesheet" type="text/css" href="edit.css">
</head>

<body>
    <h1>Update</h1>
    <div class="form-container">
        <form action="edit.php?id=<?php echo $updateid; ?>" method="POST" style="background-color: #f0f0f0; padding: 30px; border-radius: 5px; width: 400px; margin: 20px;box-shadow: 5px 5px 10px 15px rgba(0, 0, 0, 0.4);">
            <input type="hidden" name="updateid" value="<?php echo $updateid; ?>">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" style="width: 94%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;"><br>

            <label for="price">Price:</label><br> <!-- Corrected label -->
            <input type="text" id="price" name="price" value="<?php echo $price; ?>" style="width: 94%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;"><br> <!-- Corrected input field name and ID -->
            <div class="btn">
                <input type="submit" class="button" value="Update">
            </div>
        </form>
    </div>
</body>

</html>