<?php
include_once 'db_conn.php';

$sql = "SELECT * FROM meals";
$result = mysqli_query($conn, $sql);

echo 
"<form action='submit_order.php' method='post'>
<table>
<tr><th>Product</th><th>Quantity</th><th>Price</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo 
  "<tr>
    <td>" . $row["meal_name"] . "</td>
    <td><input type='number' name='quantity[" . $row["meal_id"] . "]' value='0'></td>
    <td>$" . $row['meal_price'] . "</td>
  </tr>";
}
echo 
"</table>
<label for='name'>Name:</label>
<input type='text' name='name' required>

<label for='address>Address:</label>
<input type='text' name='address' required>

<label for='email'>Email:</label>
<input type='email' name='email' required>

<input type='submit' value='Submit Order'>
</form>";

mysqli_close($conn);
?>