<?php
    session_start();

    if(isset($_SESSION['logged'])){
        $log = $_SESSION['logged'];
    }
    else{
      $log = false;
    }

    session_write_close();
?>

<html>
<head>
    <link rel="stylesheet" href="src/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Fitlogin - Login</title>
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

<div class="accountShowcase">   
    <div class="formwrapper">
        <h1>Login</h1>
        <form action="checkLogData.php" method="post" name="loginform" id="loginform">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Email">

            <label for="passw">Password:</label>
            <input type="password" name="passw" id="passw" placeholder="Password">

            <div id="submitButton" class="accountButton">
                <h1>LOG IN</h1>
            </div>
        </form>
    </div>

    <h1 id="emptyWarning" class="hiddenitem">Please fill all the fields before sending!</h1>
    <h1 id="referreg">No account? Register <a href="register.php">here.</a></h1>
    <h1 id="referreg">You need to be logged in to access the shop.</a></h1>
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

function checkForm(){
  if(document.getElementById("email").value == '' || document.getElementById("passw").value == ''){
    document.getElementById("emptyWarning").classList.remove("hiddenitem");
    document.getElementById("emptyWarning").classList.remove("shownitem");
    document.getElementById("emptyWarning").classList.add("shownitem");
  }
  else{
    document.getElementById("emptyWarning").classList.remove("shownitem");
    document.getElementById("emptyWarning").classList.remove("hiddenitem");
    document.getElementById("emptyWarning").classList.add("hiddenitem");

    document.getElementById("loginform").submit();
  }
}

document.getElementById("submitButton").addEventListener("click", checkForm);

</script>