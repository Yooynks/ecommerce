<?php
// Connect to database
include_once 'db_conn.php';

// Retrieve form data
$name = $_POST['name'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$products = $_POST['quantity'];

// Calculate order total
$total = 0;
foreach ($products as $id => $quantity) {
  $sql = "SELECT prod_price FROM products WHERE prod_id = '$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $price = $row['prod_price'];
  $total += $price * $quantity;
}

// Insert order into database
$status = 'P'; // set status as 'P' for pending
$timestamp = date("Y-m-d H:i:s"); // get current timestamp
$sql = "INSERT INTO orders (name, address, contact, total, order_status, date_purchased_ts) VALUES ('$name', '$address', '$contact', $total, '$status', '$timestamp')";
mysqli_query($conn, $sql);
$order_id = mysqli_insert_id($conn);

// Insert order details into database
foreach ($products as $id => $quantity) {
  if ($quantity > 0) {
    $sql = "INSERT INTO order_details (order_id, meal_id, quantity) VALUES ($order_id, $id, $quantity)";
    mysqli_query($conn, $sql);
  }
}

$conn->close();
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Submit Order</title>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<h1>ORDER PLACED!</h1>
	<form action="order_list.php" method="post">
	<input type="submit" value="View Order">
	</form>

</body>
<script src="js/bootstrap.js"></script>
</html>