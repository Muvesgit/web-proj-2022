<?php
session_start();

if(isset($_SESSION['logged'])){
    $log = $_SESSION['logged'];
}
else{
    $log = false;
}

session_write_close();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitlogin";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `items`";
$result = $conn->query($sql);
$index = 0;

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $savedData[$index]['id'] = $row['id'];
        $savedData[$index]['full_name'] = $row['full_name'];
        $savedData[$index]['price'] = $row['price'];
        $savedData[$index]['imgsrc'] = $row['imgsrc'];

        $index++;

        if($index == 3){break;}
    }
}

$conn->close();
?>

<html>
<head>
    <link rel="stylesheet" href="src/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>


<body>

<div class="header">
    <div class="logoPart">
        <a href="#"><img src="src/img/dblogo.png"></a>
    </div>

    <div class="headernav">
        <a href="#">HOME</a>
        <a href="#">ABOUT</a>
        <a id="shoplink" href="#">SHOP</a>
    </div>

    <a id="accountButton" href="account.php">
        <div class="accountButton">
            <h1>ACCOUNT</h1>
        </div>
    </a>
</div>

<div class="banner">
    <img src="src/img/redbanner.jpg">
</div>

<div class="homeShowcase">
    <div class="itemCard" id="first">
        <img src="">
        <h1></h1>
        <h2></h2>
        <a id="shoplink2" href="#"><h2>See more!</h2></a>
    </div>
    <div class="itemCard" id="second">
        <img src="">
        <h1></h1>
        <h2></h2>
        <a id="shoplink3" href="#"><h2>See more!</h2></a>
    </div>
    <div class="itemCard" id="third">
        <img src="">
        <h1></h1>
        <h2></h2>
        <a id="shoplink4" href="#"><h2>See more!</h2></a>
    </div>
</div>

<div class="welcome">
    <h1>Interested in our products?</h1>
    <a id="regLink" href="register.php"><div class="makewe"><h1>Make an account!</h1></div></a>
</div>




<div class="footer">
    <h1>© Kőműves Dávid-Márk - Sapientia Informatika II. év, 2022</h1>
</div>

</body>
</html>

<script>
if("<?php echo $log ?>"){
    document.getElementById("accountButton").href = "account.php";
    document.getElementById("shoplink").href = "shop.php";
    document.getElementById("shoplink2").href = "shop.php";
    document.getElementById("shoplink3").href = "shop.php";
    document.getElementById("shoplink4").href = "shop.php";
    document.getElementById("regLink").href = "account.php";
}
else{
    document.getElementById("accountButton").href = "login.php";
    document.getElementById("shoplink").href = "login.php";
    document.getElementById("shoplink2").href = "login.php";
    document.getElementById("shoplink3").href = "login.php";
    document.getElementById("shoplink4").href = "login.php";
    document.getElementById("regLink").href = "register.php";
}

document.getElementById("first").children[0].src = "<?php echo $savedData[0]['imgsrc']?>";
document.getElementById("first").children[1].innerHTML = "<?php echo $savedData[0]['full_name']?>";
document.getElementById("first").children[2].innerHTML = "<?php echo $savedData[0]['price']?>" + " RON";

document.getElementById("second").children[0].src = "<?php echo $savedData[1]['imgsrc']?>";
document.getElementById("second").children[1].innerHTML = "<?php echo $savedData[1]['full_name']?>";
document.getElementById("second").children[2].innerHTML = "<?php echo $savedData[1]['price']?>" + " RON";

document.getElementById("third").children[0].src = "<?php echo $savedData[2]['imgsrc']?>";
document.getElementById("third").children[1].innerHTML = "<?php echo $savedData[2]['full_name']?>";
document.getElementById("third").children[2].innerHTML = "<?php echo $savedData[2]['price']?>" + " RON";

</script>