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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="product-heading">
        <h2>Search Result</h2>
    </div>
    <div class="product-container">
        <?php if (count($search_results) > 0) : ?>
            <?php foreach ($search_results as $result) : ?>
                <div class="product-box">
                    <img src="images/<?php echo htmlspecialchars($result['file']); ?>" alt="<?php echo htmlspecialchars($result['name']); ?>" />
                    <strong><?php echo htmlspecialchars($result['name']); ?></strong>
                    <span class="quantity"><?php echo htmlspecialchars($result['weight']); ?> KG</span>
                    <span class="price"><?php echo htmlspecialchars($result['price']); ?> TK</span>
                    <div class="cart-btn">Add Cart</div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No results found for your search.</p>
        <?php endif; ?>
    </div>
    <script src="product.js"></script>
</body>

</html>
