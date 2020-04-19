<?php
session_start();

$iduser = isset($_POST["add"])?$_POST["add"] : "";

$sql = "UPDATE utilisateur SET Vendeur=1 WHERE IDutilisateur=".$iduser;

$db = mysqli_connect('localhost', 'root', '', 'ebayece');
mysqli_query($db, $sql);

$sql = "DELETE FROM notifvendeur WHERE IDutilisateur=".$iduser;

$db = mysqli_connect('localhost', 'root', '', 'ebayece');
mysqli_query($db, $sql);

// idéalement envoyer un mail à l'utilisateur pour le prévenir


header('Location: AdminDemandeVendeur.php?result=IDuser_obtain_vendeur='.$iduser);

?>