<?php
session_start();
include 'config.php'; // Include your database configuration file

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: account.php');
    exit();
}

// Fetch user details from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<?php include('includes/header.php'); ?>

<div class="container">
    <h1>Votre Pannier</h1>
    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php foreach ($_SESSION['cart'] as $item) : ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td>$<?php echo number_format($item['price'], 2); ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                <td>
                    <a href="remove-from-cart.php?id=<?php echo $item['id']; ?>">Supprimé</a>
                </td>
            </tr>
            <?php $total += $item['price'] * $item['quantity']; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Total: $<?php echo number_format($total, 2); ?></h2>
    <a href="checkout.php" class="btn btn-primary">Payé</a>
    <?php else : ?>
    <p>Votre pannier est vide</p>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>