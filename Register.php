<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PhoneBook - Register</title>
<link rel="shortcut icon" type="image/x-icon" href="resourses/images/title_icon.png"> 
 <link rel="stylesheet" href="resourses/styles/register_style.css">
</head>
<body>
<?php
if (!empty($_POST['username']) || !empty($_POST['password']) || !empty($_POST['repeatpass']) || !empty($_POST['email']) ){
include('config.php');
$connect=mysql_connect ($db_host,$db_user,$db_pass);
mysql_select_db($db_name);
$username=mysql_real_escape_string($_POST['username']);
$sqlQuery="select * from members where username='$username' ";
$result=mysql_query($sqlQuery);
$usersnumber=mysql_num_rows($result);
$email=mysql_real_escape_string($_POST['email']);
$sqlQuery="select * from members where email='$email' ";
$result=mysql_query($sqlQuery);
$emailsnumber=mysql_num_rows($result);

if ($_POST['repeatpass'] !== $_POST['password']){
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Register.php?error=1');
}
if ($usersnumber > 0){
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Register.php?error=2');
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Register.php?error=3');
}
if (!preg_match("/[A-Za-z0-9]+/",$_POST['username'])) {
 header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Register.php?error=4');
}
if ($emailsnumber > 0){
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Register.php?error=5');
}
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['repeatpass']) && !empty($_POST['email']) ){
$connect=mysql_connect ($db_host,$db_user,$db_pass);
mysql_select_db($db_name);
$username=mysql_real_escape_string($_POST['username']);
$password=mysql_real_escape_string(md5($_POST['password']));
$email=mysql_real_escape_string($_POST['email']);
$sqlQuery="insert into members values(null,'$username' ,'$password', '$email','false')" ;
$result=mysql_query($sqlQuery);
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'index.php?error=2');
}



////////////////
}
if (!empty($_GET['error'])){

if ($_GET['error']==1) {
    echo "<script>alert(\"password does not match !\")</script>";
}
else if ($_GET['error']==2){
    echo "<script>alert(\"username already exist , try again !\")</script>";
}
else if ($_GET['error']==3){
    echo "<script>alert(\"invalid email ! \")</script>";
}
else if ($_GET['error']==4){
    echo "<script>alert(\"Only letters and white space allowed for username \")</script>";
}
else if ($_GET['error']==5){
    echo "<script>alert(\"Email already exist , try again ! \")</script>";
}
else {
echo "<script>alert(\"an error occured , please contact the website Admin\")</script>";
}
}
?>
<section class="register">
	<div class="title">PhoneBook Register </div>
<form action="Register.php" method="post" >
<input type="email" name="email" required title="Email required" placeholder="example@gmail.com" autocomplete="off" >
<input type="text" name="username" required title="Username required" placeholder="Username" autocomplete="off">
<input type="password" name="password" required title="Password required" placeholder="Password" autocomplete="off">
<input type="password" name="repeatpass" required title="Password required" placeholder="Repeat Password" autocomplete="off">
<input type="submit" class="submit" value="Register !" title="Go for it !">

 </form>
	</section>
	
</body>
</html>
