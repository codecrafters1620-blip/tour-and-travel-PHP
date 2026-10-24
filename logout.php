<?php

session_start();

unset($_SESSION["email"]);
header("LOCATION:index.php");
  
?>