<!DOCTYPE HTML>
<?php
/* I could have made that in the index but I'm lazy and busy */
session_start();
?>
<html>
<head>
<title>Login - Proccesing </title>
<link rel="shortcut icon" type="image/x-icon" href="resourses/images/title_icon.png">
</head>
<body>
<?php
	/* connect to the db */
       include('config.php');
	   $connect=mysql_connect ($db_host,$db_user,$db_pass);
       mysql_select_db ($db_name);

				$username=mysql_real_escape_string($_POST['username']);
				$password=mysql_real_escape_string(md5($_POST['password']));
			    $sqlQuery="select * from members where username='$username' AND pass='$password'";
				$result=mysql_query($sqlQuery);
				$number=mysql_num_rows($result);
                  if($number>0) /* check if user clames exist */
			 {
			  /* ok you're good to login */
                $_SESSION['id']=mysql_result($result,0,"id");
                $_SESSION['is_admin']=mysql_result($result,0,"is_admin"); /* are you an admin ? */
                header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Control.php');
				}
				else
				{
					/* if no user with the used passwod then redirect with the get error */
                  header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'index.php?error=1');
                }

           ?>

</body>
</html>
