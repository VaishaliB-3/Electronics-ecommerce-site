<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronics Store</title>
    <link rel="stylesheet"
    href="style.css">
</head>
<body>
<nav>
        <ul>
            <li><a
            href="index.php">Home</a></li>
            <li><a
            href="about.php">About</a></li>
            <li><a
            href="contact.php">contact</a></li>
        </ul>
    </nav>

    <h1>Welcome to Electronics Store</h1>

    <!--product display section-->
    <div class="product-container">
        <?php
        $sql = "SELECT * from products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo"
                <div class='product'>
                <img src='images/
{$row['image']}' alt='{$row['name']}' />
                <h3>{$row['name']}</h3>
                <p>{$row['description']}</p>
                <p><strong>Price:</strong> ₹{$row['price']}</p>
                <form method='post' action='cart.php'>
                    <input type='hidden' name='product_id' value='{$row['id']}'>
                    <label>Quantity:</label>
                    <input type='number' name='quantity' value='1' min='1'>
                    <button type='submit' name='add_to_cart'>Add to Cart</button>
                </form>
            </div>";
        }
    } else {
        echo "<p>No products available!</p>";
    }
    ?>
<footer class="footer">
    <div class="footer-container">
        <p>&copy; <?php echo date("Y"); ?> Electronics Store. All rights reserved.</p>
        <div class="footer-links">
            <a href="index.php">Home</a> |
            <a href="about.php">About Us</a> |
            <a href="contact.php">Contact Us</a> |
            <a href="privacy.php">Privacy Policy</a>
        </div>
        <p>Follow us on:
            <a href="https://www.facebook.com" target="_blank">Facebook</a> |
            <a href="https://www.instagram.com" target="_blank">Instagram</a> |
            <a href="https://www.twitter.com" target="_blank">Twitter</a>
        </p>
    </div>
</footer>
</body>
</html>
    