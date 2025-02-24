<?php
session_start();
include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet"
    href="style.css">
</head>
<body>
    <h1>Checkout Page</h1>

 <?php
// Check if the cart is not empty
if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty! <a href='index.php'>Back to Home</a></p>";
    exit;
}
$grandTotal = 0;
echo "<table>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>";

foreach ($_SESSION['cart'] as $id => $qty) {
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $product = $result->fetch_assoc()) {
        $name = $product['name'];
        $price = (float)$product['price'];
        $total = $price * (int)$qty;
        $grandTotal += $total;

        echo "<tr>
                <td>$name</td>
                <td>₹$price</td>
                <td>$qty</td>
                <td>₹$total</td>
              </tr>";
    }
}

echo "</table>";

echo "<h3>Grand Total: ₹$grandTotal</h3>";
?>

<!-- Checkout Form -->
<h3>Billing Information</h3>
<form method="post" action="place_order.php">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Address:</label><br>
    <textarea name="address" required></textarea><br><br>

    <input type="hidden" name="total_amount" value="<?php echo $grandTotal; ?>">

    <input type="submit" name="place_order" value="Place Order">
</form>

<p><a href="index.php">Back to Home</a></p>
</body>
</html>