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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitlogin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$passw = $_POST['passw'];

$sql = "INSERT INTO users (first_name, last_name, email, password)
VALUES ('$firstname', '$lastname', '$email', '$passw')";

if ($conn->query($sql) === TRUE) {
  echo "<h1>New account created successfully!</h1>";
} else {
  echo "<h1>Error creating new account! Please try again later!</h1>";
}

$conn->close();

unset($_POST['fname']);
unset($_POST['lname']);
unset($_POST['email']);
unset($_POST['passw']);

header( "refresh:3;url=index.php" );
?>

</div>

</body>
</html>