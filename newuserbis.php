<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'ebayece')
           or die('could not connect to database');
$requete = "SELECT * FROM utilisateur where Email = '".$_SESSION['Email']."'";
$exec_requete = mysqli_query($db,$requete);
$reponse      = mysqli_fetch_assoc($exec_requete);
$_SESSION['ID'] = $reponse['IDutilisateur'];
$_SESSION['Nom'] = $reponse['Nom'];
$_SESSION['Prenom'] = $reponse['Prenom'];
$_SESSION['Email'] = $reponse['Email'];
$_SESSION['MDP'] = $reponse['MotDePasse'];
$_SESSION['Photo'] = $reponse['Photo'];
$_SESSION['ImageFond'] = $reponse['ImageFond'];
$_SESSION['Telephone'] = $reponse['Telephone'];
$_SESSION['Vendeur'] = $reponse['vendeur'];

header('location: Home.php');


?>