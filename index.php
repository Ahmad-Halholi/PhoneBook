<?session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PhoneBook - Login</title>
<link rel="shortcut icon" type="image/x-icon" href="resourses/images/title_icon.png">
<link rel="stylesheet" href="resourses/styles/login_style.css">
</head>
<body>

<?php
include "config.php";
if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Control.php');
exit;
}
if (!empty($_GET['error'])){

if ($_GET['error']==1) {
    echo "<script>alert(\"Invalid username or password !\")</script>";
}
else if ($_GET['error']==2){
echo "<script>alert(\"Registered successfully please login\")</script>";
}
else if ($_GET['error']==3){
   echo "<script>alert(\"Logged out successfully  \")</script>";
}
else if ($_GET['error']==4){
   echo "<script>alert(\"You must login first !  \")</script>";
}
else {
echo "<script>alert(\"an error occured , please contact the website Admin\")</script>";
}
}
?>

<section class="login">
    <a href="<?php include "config.php";echo 'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'index.php'; ?>">
    <img src="resourses/images/Logo.png" width="200" height="200" alt="" class="logo"></a>
	<div class="title">PhoneBook Login</div>
	<form action="Login.php" method="post">
    	<input type="text" name="username" required title="Username required" placeholder="Username" autocomplete="off" autofocus >
        <input type="password" name="password" required title="Password required" placeholder="Password" autocomplete="off" >
        <div class="downlow">
    <div class="col"><a href="<?php
   include "config.php";
   echo 'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Register.php';
   ?>" title="Just click already !">New Here ? Click To Register !</a>
   </div>
         
        </div>
       <input type="submit" class="submit" value="Login !">
    </form>
</section>

</body>
</html>
