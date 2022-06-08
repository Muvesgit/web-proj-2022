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
 
mysqli_close($link);
?>