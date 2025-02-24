<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
<div class="container">
    <h1>Order Confirmation</h1>

<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $qty) {
            $sql = "SELECT * FROM products WHERE id = $id";
            $result = $conn->query($sql);

            if ($result && $product = $result->fetch_assoc()) {
                $product_name = $product['name'];
                $price = (float)$product['price'];
                $total = $price * (int)$qty;

                $insertOrder = "INSERT INTO orders (name, email, address, product_name, price, quantity, total)
                                VALUES ('$name', '$email', '$address', '$product_name', '$price', '$qty', '$total')";

                if ($conn->query($insertOrder)) {
                    echo "<p class='success'>Order placed successfully for <strong>$product_name</strong>! Quantity: <strong>$qty</strong>, Total: ₹<strong>$total</strong>.</p>";
                } else {
                    echo "<p class='error'>Error: " . $conn->error . "</p>";
                }
            }
        }

        // Clear cart after successful order
        unset($_SESSION['cart']);
        echo "<p><a href='index.php'>Back to Home</a></p>";
    } else {
        echo "<p class='error'>Your cart is empty!</p>";
    }
} else {
    echo "<p class='error'>Invalid request!</p>";
}

$conn->close();
?>
</div>
</body>
</html>