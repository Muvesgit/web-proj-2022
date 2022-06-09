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

if(isset($_POST['posteditem'])){
    $var = $_POST['posteditem'];

    $sql = "SELECT * FROM `items` WHERE full_name = '$var'";
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
}
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
        <a href="index.php"><img src="src/img/dblogo.png"></a>
    </div>

    <div class="headernav">
        <a href="index.php">HOME</a>
        <a href="about.php">ABOUT</a>
        <a id="shoplink" href="#">SHOP</a>
    </div>

    <a id="accountButton" href="account.php">
        <div class="accountButton">
            <h1>ACCOUNT</h1>
        </div>
    </a>
</div>

<div class="itemShowcase">   
    <div class="itemPres" id="item">
        <img src="">
        <h1></h1>
        <h2></h2>
        <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h2>
    </div>
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
}
else{
    document.getElementById("accountButton").href = "login.php";
    document.getElementById("shoplink").href = "login.php";
}

document.getElementById("item").children[0].src = "<?php echo $savedData[0]['imgsrc']?>";
document.getElementById("item").children[1].innerHTML = "<?php echo $savedData[0]['full_name']?>";
document.getElementById("item").children[2].innerHTML = "<?php echo $savedData[0]['price']?>" + " RON";
</script>