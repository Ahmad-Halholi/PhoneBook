<?php
session_start();
if(isset($_SESSION['id'])) /* if the user is not holding a session and directly accessed the link he will be redirected */
    {
    unset($_SESSION['id']);
    unset($_SESSION['is_admin']);
    session_destroy();
    include "config.php";
    header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'index.php?error=3');
    }
    else {
	    /* just in case of direct entry */
echo "<script>document.documentElement.innerHTML=\"<h3>You shall not access this page unless you are logged in , your attempt was logged !!</h3>\";</script>";
die("<br><h1>logout direct - logged to the server ~!</h1><br>");
}


	   
?>
