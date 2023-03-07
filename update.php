<?php
$sql = "UPDATE users SET pass ='".$password."' WHERE email ='".$email."'";

if ($conn->query($sql) === TRUE) {
  echo "Updated entry successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}