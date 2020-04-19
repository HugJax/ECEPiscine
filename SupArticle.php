<?php
session_start();

$idproduit = isset($_POST["sup"])?$_POST["sup"] : "";

$sql = "DELETE FROM produit WHERE IDproduit=".$idproduit;
$db = mysqli_connect('localhost', 'root', '', 'ebayece');
mysqli_query($db, $sql);


// idéalement envoyer un mail au vendeur


header('Location: AdminVente.php?result=IDproduit_supprime='.$idproduit);

?>