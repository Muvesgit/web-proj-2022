<?php
$link = mysqli_connect("localhost", "root", "", "fitlogin");
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "CREATE TABLE `users`(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    password VARCHAR(70) NOT NULL UNIQUE
)";

if(mysqli_query($link, $sql)){
    echo "Table 'users' created successfully.";
} else{
    echo "ERROR: Was not able to execute $sql. " . mysqli_error($link);
}

$sql = "INSERT INTO users (first_name, last_name, email, password)
VALUES ('test', 'tester', 'test@tester.com', 'test')";

if ($link->query($sql) === TRUE) {
  echo "<h1>Default account created successfully!</h1>";
} else {
  echo "<h1>Error creating default account! Please try again later!</h1>";
}

$sql2 = "CREATE TABLE `items`(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(50) NOT NULL,
    price FLOAT(10) NOT NULL,
    imgsrc VARCHAR(100) NOT NULL UNIQUE
)";

if(mysqli_query($link, $sql2)){
    echo "Table 'items' created successfully.";
} else{
    echo "ERROR: Was not able to execute $sql2. " . mysqli_error($link);
}

$sql = "INSERT INTO `items` (full_name, price, imgsrc)
VALUES ('Dumbbells', '150', 'src/img/dumbbell.jpeg')";

if ($link->query($sql) === TRUE) {
  echo "<h1>Dummy record added successfully!</h1>";
} else {
  echo "<h1>Error creating new account! Please try again later!</h1>";
}

$sql = "INSERT INTO `items` (full_name, price, imgsrc)
VALUES ('Barbell', '400', 'src/img/barbell.jpg')";

if ($link->query($sql) === TRUE) {
  echo "<h1>Dummy record added successfully!</h1>";
} else {
  echo "<h1>Error creating new account! Please try again later!</h1>";
}

$sql = "INSERT INTO `items` (full_name, price, imgsrc)
VALUES ('Bench Press', '1000', 'src/img/benchpress.jpg')";

if ($link->query($sql) === TRUE) {
  echo "<h1>Dummy record added successfully!</h1>";
} else {
  echo "<h1>Error creating new account! Please try again later!</h1>";
}

$sql = "INSERT INTO `items` (full_name, price, imgsrc)
VALUES ('Shoulder Press', '800', 'src/img/shoulderpress.png')";

if ($link->query($sql) === TRUE) {
  echo "<h1>Dummy record added successfully!</h1>";
} else {
  echo "<h1>Error creating new account! Please try again later!</h1>";
}

$sql = "INSERT INTO `items` (full_name, price, imgsrc)
VALUES ('Squat Rack', '1800', 'src/img/squatrack.jpg')";

if ($link->query($sql) === TRUE) {
  echo "<h1>Dummy record added successfully!</h1>";
} else {
  echo "<h1>Error creating new account! Please try again later!</h1>";
}

mysqli_close($link);
?>