<? session_start();
include "../config.php";
if ($_SESSION["is_admin"] != "true"){
$index='http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'index.php';
echo "Are you lost ? here ,"."<a href=$index>"." back to index"."</a>";
die();
}

if (!empty($_GET['del'])){
    $connect=mysql_connect ($db_host,$db_user,$db_pass);
    mysql_select_db ($db_name);
    $userid=mysql_real_escape_string($_GET['del']);
    mysql_query("delete from members where id='$userid'");
    mysql_query("delete from contacts where user_id='$userid'");
    echo "<script>alert(\"User has been deleted !\")</script>";
}
if (!empty($_GET['setadmin'])){
    $connect=mysql_connect ($db_host,$db_user,$db_pass);
    mysql_select_db ($db_name);
    $userid=mysql_real_escape_string($_GET['setadmin']);
    mysql_query("update members set is_admin='true' where id='$userid'");
    echo "<script>alert(\"Selected user is now admin !\")</script>";
}

if (!empty($_GET['pass'])){
    $connect=mysql_connect ($db_host,$db_user,$db_pass);
    mysql_select_db ($db_name);
    $userid=mysql_real_escape_string($_GET['pass']);
    mysql_query("update members set pass ='c8837b23ff8aaa8a2dde915473ce0991' where id='$userid'");
    echo "<script>alert(\"Password has been reset to 123321 !\")</script>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel - Users</title>
<link rel="shortcut icon" type="image/x-icon" href="../resourses/images/title_icon.png">
<link rel="stylesheet" href="../resourses/styles/users_style.css">
</head>
<body>
<?php
if(!isset($_SESSION["id"]))
{
include "../config.php";
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'index.php?error=4');
die("<br><h1>logged to the server ~!</h1><br>");
}
?>
<section class="users">
<div class="upper_title">
<div class="go_back">
<a href="
<?php
include "../config.php";echo 'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Control.php';?>">
<img src="../resourses/images/back.png" alt="Go back">
</a> </div>
<div class="title">
Users </div>
</div>
<label class="label"> You Have The Following Users :</label>
<?php
include "../config.php";
$connect=mysql_connect ($db_host,$db_user,$db_pass);
mysql_select_db ($db_name);
$query = "SELECT * FROM members ";
$result=mysql_query($query);
$number=mysql_num_rows($result);

if ($number == 0) {
echo "<div style='margin:auto; padding-top:110px;font-family:Arial;color:#bfbfbf; font-weight: bold;font-size: 17px;
        text-align:center;width: 550px;
        height: 340px;'>You have no Users !</div>";}
else {
while($row = mysql_fetch_array($result)){
$perm="User";
if ($row['is_admin'] == "true"){$perm="<span style='color:#349e92'>Super User</span>";}
 echo "<details class='label'> <summary>".$row['username']."</summary>"."<p> ID :".$row['id']."&nbsp;,&nbsp;".$perm."
&nbsp;<a href='?setadmin=".$row['id']."'><img src='../resourses/images/admin.png' alt='Set as admin' class='side_image' title='Set As Admin'></a>
<a href='?del=".$row['id']."'><img src='../resourses/images/delete.png' alt='Delete user' class='side_image' title='Delete User'></a>
<a href='?pass=".$row['id']."'><img src='../resourses/images/pass.png' alt='Reset Password' class='side_image' title='Reset Password'></a>
 </p></details>";


}
}
?>
<br><br>
</section>
 </body>
</html>
