<?php


if(isset($_SESSION["email"])){
    if($_SESSION["email"]==""){
        header("LOCATION:login.php");
    }
}else{
    header("LOCATION:login.php");

}
?>