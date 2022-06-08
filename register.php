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
</head>


<body>

<div class="header">
    <div class="logoPart">
        <a href="#"><img src="src/img/dblogo.png"></a>
    </div>

    <div class="headernav">
        <a href="index.php">HOME</a>
        <a href="#">ABOUT</a>
        <a href="#">SHOP</a>
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
        <form action="saveRegData.php" method="post" name="regform" id="regform">
            <label for="name">First Name:</label>
            <input type="text" name="fname" id="fname" placeholder="First Name">

            <label for="name">Last Name:</label>
            <input type="text" name="lname" id="lname" placeholder="Last Name">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Email">

            <label for="passw">Password:</label>
            <input type="password" name="passw" id="passw" placeholder="Password">

            <div class="radio">
                <input type="checkbox" id="agreement" name="agreement" value="1">
                <label for="agreement">I agree to have my information processed</label>
            </div>

            <div id="submitButton" class="accountButton">
                <h1>REGISTER</h1>
            </div>
        </form>
    </div>

    <h1 id="emptyWarning" class="hiddenitem">Please fill all the fields before sending!</h1>
</div>


<div class="footer">
    <h1>© Kőműves Dávid-Márk - Sapientia Informatika II. év, 2022</h1>
</div>

</body>
</html>

<script>
if("<?php echo $log ?>"){
    document.getElementById("accountButton").href = "account.php";
}
else{
    document.getElementById("accountButton").href = "login.php";
}

function checkForm(){
    if(document.getElementById("fname").value == '' || document.getElementById("lname").value == '' || document.getElementById("email").value == '' || document.getElementById("passw").value == '' || !document.getElementById("agreement").checked){
        document.getElementById("emptyWarning").classList.remove("hiddenitem");
        document.getElementById("emptyWarning").classList.remove("shownitem");
        document.getElementById("emptyWarning").classList.add("shownitem");
    }
    else{
        document.getElementById("emptyWarning").classList.remove("shownitem");
        document.getElementById("emptyWarning").classList.remove("hiddenitem");
        document.getElementById("emptyWarning").classList.add("hiddenitem");

        document.getElementById("regform").submit();
    }
}

document.getElementById("submitButton").addEventListener("click", checkForm);

</script>