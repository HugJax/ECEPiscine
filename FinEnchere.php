<?php
session_start();

$idenchere = isset($_POST["end"])?$_POST["end"] : "";
$db = mysqli_connect('localhost', 'root', '', 'ebayece');

$req = "SELECT * FROM enchere WHERE IDenchere=".$idenchere;
$result = mysqli_query($db, $req);
$res = mysqli_fetch_assoc($result);

// valeur vendu=1 dans la table produit
// modifier valeur du prix dans la table produit
$sql = "UPADTE produit SET Vendu=1 AND Prix=".$res['PrixMax'];
mysqli_query($db, $sql);

// ajouter au panier de l'acheteur
$sql2 = "INSERT INTO panier(IDproduit, IDutilisateur) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=".$res['IDproduit']."), (SELECT IDproduit FROM produit WHERE IDproduit=".$res['IDutilisateur']."))";
mysqli_query($db, $sql2);

// supprimer des enchères
$sql3 = "DELETE FROM enchere WHERE IDenchere=".$idenchere;
mysqli_query($db, $sql3);


// idéalement envoyer un mail à l'acheteur
// idéalement envoyer un mail au vendeur


header('Location: AdminEnchere.php?result=Enchere_terminee='.$idenchere);

?>