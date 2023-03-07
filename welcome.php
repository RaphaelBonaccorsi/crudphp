<html>
<head>
  <title>Crud</title>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
E-mail: <input type="text" name="email"><br>
Password: <input type="text" name="password"><br>
<input type="submit" name ="submit" value="Submit">
<input type="submit" name ="update" value="Update">
</form>


<?php

// Write or update case
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST["submit"]) == false or empty($_POST["update"]) == false) {
  $error = '';
  $password = $_POST["password"];
  $email = $_POST["email"];
  // Validate input from user
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid email!')</script>";
    $error = true;
  }
  if (strlen($password) > 32 or strlen($password) < 4) {
    echo "<script>alert('Invalid password!')</script>";
    $error = true;
  }
  
  // Submit case
  if (empty($_POST["submit"]) == false && empty($error)){
    // Create connection
    require 'connect.php';
    require 'write.php';
  }

  // Update case
  if (empty($_POST["update"]) == false && empty($error)){
    require 'connect.php';
    require 'update.php';
  }
} 

// Delete case
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST["remove"]) == false ) {
  echo "Removendo ".explode(' ',$_POST['remove'])[1]."<br>";
  require 'connect.php';
  require 'delete.php';
}

// Retrieve case

require 'connect.php';

// Return all data from table
$sql = "SELECT * FROM Users ORDER BY id";
$result = $conn -> query($sql);

// Fetch all
$result -> fetch_all(MYSQLI_ASSOC);
echo "Retrieved table succesfully<br>";
// Output as html elements
$remove = array();
foreach ($result as $line) {
  echo '<form method="post" action=', htmlspecialchars($_SERVER["PHP_SELF"]) ,'>';
  echo '<h4>| ';
  foreach($line as $value){
    echo $value." | ";
  }
  echo '<input type="submit" name="remove" value="Remover '.$line["id"].'"></input></form><br>';
}
?>
</body>
</html>