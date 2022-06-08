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
        <a href="index.php"><img src="src/img/dblogo.png"></a>
    </div>

    <div class="headernav">
        <a href="index.php">HOME</a>
        <a href="#">ABOUT</a>
        <a id="shoplink" href="#">SHOP</a>
    </div>

    <a id="accountButton" href="account.php">
        <div class="accountButton">
            <h1>ACCOUNT</h1>
        </div>
    </a>
</div>

<div id="shopShowcase" class="shopShowcase">
    <h1>Shop</h1>
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

var numOfItems = "<?php echo $index;?>";

var savedData = <?php echo json_encode($savedData); ?>;
// console.log(savedData);
var currentid = 0;

for(let i = 0; i < numOfItems; ++i){
    if(i % 3 == 0){
        currentid++;

        let row = document.createElement("div");
        row.classList.add("itemRow");
        row.id = currentid;
        document.getElementById("shopShowcase").appendChild(row);
    }


    let img = document.createElement("img");
    img.src = savedData[i].imgsrc;

    let h1 = document.createElement("h1");
    h1.innerHTML = savedData[i].full_name;

    let h2 = document.createElement("h2");
    h2.innerHTML = savedData[i].price;

    let a = document.createElement("a");
    let h22 = document.createElement("h2");
    h22.innerHTML = "Add to cart";
    a.appendChild(h22);
    a.href = "";

    let card = document.createElement("div");
    card.classList.add("itemCard");

    card.appendChild(img);
    card.appendChild(h1);
    card.appendChild(h2);
    card.appendChild(a);
    
    document.getElementById(currentid).appendChild(card);
}

</script>