<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'ebayece')
       or die('could not connect to database');
$db_found = mysqli_select_db($db, 'ebayece');

$result=isset($_POST['Supprimer']) ? $_POST['Supprimer'] : "";
echo $result;

$sql3="DELETE FROM panier WHERE IDpanier='".$result."';";
$result3 = mysqli_query($db, $sql3);

header("location:monpanier.php");

?>