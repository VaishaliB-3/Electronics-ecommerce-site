<?php
session_start();
include('db.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet"
    href="style.css">
</head>
<body>

<?php
if (isset($_POST['add_to_cart'])) {
    $product_id =
    $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $_SESSION['cart'][$product_id]=
    $quantity;
    echo "<p>Product added to cart successfully!<p/>";
    echo"<a href='index.php'>Back to Home</a>";
}
//display cart
echo "<div class='container'>";
echo "<h2>Your Shopping Cart:</h2>";

if (!empty($_SESSION['cart'])) {
    echo "<table class='cart-table'>";
    echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Total</th></tr>";

    foreach ($_SESSION['cart'] as $id => $qty) {
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $conn->query($sql);

        if ($result && $product = $result->fetch_assoc()) {
            $name = $product['name'];
            $price = $product['price'];
            $total = (float)$price * (int)$qty;

            echo "<tr>
                    <td class='product-name'>$name</td>
                    <td class='product-price'>₹$price</td>
                    <td><input type='number' class='quantity-input' value='$qty' min='1'></td>
                    <td>₹$total</td>
                  </tr>";
        }
    }

    echo "</table>";
    echo "<a href='checkout.php' class='checkout-btn'>Proceed to Checkout</a>";
} else {
    echo "<p>Your cart is empty!</p>";
}
echo "</div>";
?>

</body>
</html>