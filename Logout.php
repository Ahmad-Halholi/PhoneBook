<?php
session_start();
if(isset($_SESSION['id']))
    {
    unset($_SESSION['id']);
    session_destroy();
    include "config.php";
    header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'index.php?error=3');
    }
    else {
echo "<script>document.documentElement.innerHTML=\"<h3>You shall not access this page unless you are logged in , your attempt was logged !!</h3>\";</script>";
die("<br><h1>logout direct - logged to the server ~!</h1><br>");
}


	   
?>