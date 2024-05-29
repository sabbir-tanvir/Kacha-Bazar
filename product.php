<?php
session_start();
if (!isset($_SESSION['search_results'])) {
    header("Location: home.php");
    exit();
}

$search_results = $_SESSION['search_results'];
unset($_SESSION['search_results']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="product.css">
</head>

<body>
    <div class="results-container">
        <h1>Search Results</h1>
        <?php if (count($search_results) > 0) : ?>
            <table border="1">
                <tr>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Weight</th>
                    <th>Image</th>
                </tr>
                <?php foreach ($search_results as $result) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($result['category']); ?></td>
                        <td><?php echo htmlspecialchars($result['name']); ?></td>
                        <td><?php echo htmlspecialchars($result['price']); ?> TK</td>
                        <td><?php echo htmlspecialchars($result['weight']); ?> KG</td>
                        <td><img src="images/<?php echo htmlspecialchars($result['file']); ?>" alt="<?php echo htmlspecialchars($result['name']); ?>" width="100"></td>

                    </tr>

                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>No results found for your search.</p>
        <?php endif; ?>
        <a href="#" class="cart-btn">
            <i class="fas fa-shopping-bag"></i> Add Cart
        </a>
    </div>
</body>

</html>