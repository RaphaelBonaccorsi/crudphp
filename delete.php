<?php
$sql = "DELETE FROM Users WHERE id=".explode(' ',$_POST['remove'])[1];
if ($conn->query($sql) === TRUE) {
echo "Removed entry successfully<br>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}