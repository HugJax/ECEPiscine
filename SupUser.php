<?php
session_start();

$iduser = isset($_POST["sup"])?$_POST["sup"] : "";

$sql = "DELETE FROM utilisateur WHERE IDutilisateur=".$iduser;
$db = mysqli_connect('localhost', 'root', '', 'ebayece');
mysqli_query($db, $sql);


// idéalement envoyer un mail à l'utilisateur


header('Location: AdminUserList.php?result=User_supprime='.$iduser);

?>