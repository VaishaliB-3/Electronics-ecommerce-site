<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Electronics Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navigation Bar -->
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</nav>

<!-- Contact Us Section -->
<section class="contact-us">
    <h1>Contact Us</h1>
    <p>Have questions? Reach out to us and we'll get back to you as soon as possible!</p>

    <div class="contact-form">
        <form action="submit_contact.php" method="POST">
            <label for="name">Full Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email Address:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="subject">Subject:</label><br>
            <input type="text" id="subject" name="subject" required><br><br>

            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="5" required></textarea><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</section>

<!-- Contact Info -->
<section class="contact-info">
    <h2>Our Contact Details</h2>
    <p><strong>Email:</strong> support@electronicsstore.com</p>
    <p><strong>Phone:</strong> +91 98765 43210</p>
    <p><strong>Address:</strong> 123, Electronics Plaza, Jabalpur, India</p>
</section>

<!-- Footer Section -->
<footer>
    <p>&copy; 2025 Electronics Store. All rights reserved.</p>
</footer>

</body>
</html>