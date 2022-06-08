<?php
session_start();
unset($_SESSION['logged']);
unset($_SESSION['email']);
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['img']);
session_write_close();

header( "refresh:0;url=index.php" );
?>