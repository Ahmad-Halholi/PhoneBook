<? session_start();?>
<!DOCTYPE HTML>
<html>
<head>
<title>Control Panel - Main</title>
<link rel="shortcut icon" type="image/x-icon" href="resourses/images/title_icon.png">
<link rel="stylesheet" href="resourses/styles/control_style.css">
</head>
<body>
<?php
if(!isset($_SESSION["id"]))
{
include "config.php";
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'index.php?error=4');
die("<br><h1>logged to the server ~!</h1><br>");}
?>
<?
if ($_SESSION['is_admin']=="true"){
include "config.php";
$statistics='http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Admin/'.'Statistics.php';
$users='http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Admin/'.'Users.php';
echo '<br><div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="'.$statistics.'">Statistics</a>
    <a href="'.$users.'">Users</a>
    <a href="#">Close Website</a>
</div>
<span style="font-size:15px;cursor:pointer" onclick="openNav()">&#9776;&nbsp;Admin Panel</span>

<script>
function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
}
</script>';
}
?>
<section class="control_main">
<div class="title">Control Panel</div>
<div class="icons_space">
<div class="first_row">
<div class="img">
<a href="
<?php
include "config.php";echo 'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Add.php';?>">
<img src="resourses/images/add.png" alt="add contact" />
</a>
<div class="caption"> Add New </div>
</div>
<div class="img">
<a href="
<?php
include "config.php";echo 'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'View.php';?>">
<img src="resourses/images/view.png" alt="view contacts" />
</a>
<div class="caption">View All</div>
</div>
</div>
<div class="second_row">
<div class="img">
<a href="<?php
include "config.php";echo 'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Search.php';?>">
<img src="resourses/images/search.png" alt="search for contacts" />
</a>
<div class="caption"> Search </div>
</div>
<div class="img">
<a href="<?php
include "config.php";echo 'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Manage.php';?>">
<img src="resourses/images/remove.png" alt="Add a Contact" />
</a>
<div class="caption">Manage</div>
</div>
</div>
<div class="third_row">
<div class="img" id="center_logout">
<a href="<?php
include "config.php";echo 'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Logout.php';?>">
<img src="resourses/images/logout.png" alt="Logout" />
</a>
<div class="caption"> Logout  </div>
</div>
</div>
</div>
</section>
 </body>
</html>