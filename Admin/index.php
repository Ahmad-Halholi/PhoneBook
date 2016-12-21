<?
session_start();
include "../config.php";
$index='http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'index.php';
echo "Are you lost ? here ,"."<a href=$index>"." back to index"."</a>";
?>
