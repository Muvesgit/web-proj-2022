<html>
<head>
    <link rel="stylesheet" href="src/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>


<body>

<div class="phpmessage">

<?php
$redirect = "account.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitlogin";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$passw = $_POST['passw'];

$sql = "SELECT * FROM `users` WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['password'] == $passw){
      echo "<h1>Successful login!</h1>";
      
      session_start();

      $_SESSION["logged"] = true;
      $_SESSION["email"] = $_POST['email'];
      $_SESSION["fname"] = $row['first_name'];
      $_SESSION["lname"] = $row['last_name'];

      session_write_close();

      break;
    }
    else{
      echo "<h1>Wrong password!</h1>";
      $redirect = "login.php";
    }
  }
} else {
  echo "<h1>Wrong email!</h1>";
  $redirect = "login.php";
}

$conn->close();

unset($_POST['email']);
unset($_POST['passw']);

header( "refresh:3;url=$redirect" );
?>

</div>

</body>
</html>