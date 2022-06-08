<?php
    session_start();

    if(isset($_SESSION['logged'])){
        $log = $_SESSION['logged'];
    }
    else{
      $log = false;
    }
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $fname = $_SESSION['fname'];
        $lname = $_SESSION['lname'];
        $img = $_SESSION['img'];
    }
    else{
        $email = null;
        $fname = null;
        $lname = null;
        $img = null;
    }

    session_write_close();
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

<div class="accountShowcase">
    <h1>Account Information:</h1>

    <div class="infoShowcase">
        <img id="accountimg" src="<?php echo $img; ?>">
        <input type="file" id="image-input" accept="image/jpeg, image/png, image/jpg">
        <div id="saveButton" class="hiddenitem accountButton">
            <h1>SAVE</h1>
        </div>

        <h2>First Name: <?php echo $fname; ?></h2>
        <h2>Last Name: <?php echo $lname; ?></h2>
        <h2>Email: <?php echo $email; ?></h2>

        <a href="logout.php" class="logoutButton">
            <div class="accountButton">
                <h1>LOG OUT</h1>
            </div>
        </a>
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

if("<?php echo $img ?>" == ""){
    document.getElementById("accountimg").src = "src/img/defaultuser.jpg";
}

document.getElementById("image-input").addEventListener("change", function() {
	var image = document.getElementById('accountimg');
	image.src = URL.createObjectURL(event.target.files[0]);

    document.getElementById("saveButton").classList.remove("hiddenitem");
    document.getElementById("saveButton").classList.add("griditem");
});

document.getElementById("saveButton").addEventListener("click", function(){
    var save = document.createElement('a');
    save.href = document.getElementById("accountimg").src;
    save.target = '_blank';
    save.download = 'photo.jpg'

    save.click();
});
</script>