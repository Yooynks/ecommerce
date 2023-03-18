<!DOCTYPE html>
<html>
<head>
	<title>Sheesh-lingan</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<h1>Sheesh_lingan</h1>

	<?php
include_once 'db_conn.php';

	$query = "SELECT * FROM meals";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo
			"<div>
				<h2>" . $row['meal_name'] . "</h2>
				<p>Price: ₱" . $row['meal_price'] . "</p>
				<button><a href=order_form.php?product_id=" . $row['meal_id'] . ">Buy Now</a></button>;
			</div>";
		}
	}

	mysqli_close($conn);
	?>

</body>
<script src="js/bootstrap.js"></script>
</html>