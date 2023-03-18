<?php
// Connect to database
include_once 'db_conn.php';
?>

<form>
<?php
$sql = "SELECT o.order_id, o.user_id, o.meal_id, o.order_date, o.quantity, o.order_status, 
			od.quantity, 
			m.meal_name, m.meal_price
	FROM orders o
	JOIN order_details od ON o.meal_id = od.meal_id
	JOIN products p ON od.meal_id = p.meal_id
	WHERE o.order_id";
	
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    "Product: " . $row['meal_name'] . "<br>
    Quantity: " . $row['quantity'] . "<br>
    Price: " . $row['meal_price'] . "<br>
    Name: " . $row['name'] . "<br>
    Address: " . $row['address'] . "<br>
    Email: " . $row['contact'] . "<br><br>
		Total Price: " . $row['total'] . "<br><br>";
    }
} else {
    echo "No orders found.";
}
?>

</form>


<html>
<head>
	<meta charset="UTF-8">
	<title>View Order</title>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<form action="index.php" method="post">
	<input type="submit" value="Buy Again">
	</form>

</body>
<script src="js/bootstrap.js"></script>
</html>