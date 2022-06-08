<?php
session_start();
unset($_SESSION['logged']);
session_write_close();

header( "refresh:0;url=index.php" );
?>