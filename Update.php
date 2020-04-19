<?php
session_start();

// initializing variables
$nom = "";
$prenom = "";
$mail = "";
$mdp = "";
$tel = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'ebayece');

// REGISTER USER
// receive all input values from the form
$nom = isset($_POST["nom"])?$_POST["nom"] : "";
$prenom = isset($_POST["prenom"])?$_POST["prenom"] : "";
$mail = isset($_POST["mail"])?$_POST["mail"] : "";
$mdp = isset($_POST["mdp"])?$_POST["mdp"] : "";
$tel = isset($_POST["telephone"])?$_POST["telephone"] : "";

$_SESSION['Nom'] = $nom;
$_SESSION['Prenom'] = $prenom;
$_SESSION['Email'] = $mail;
$_SESSION['MDP'] = $mdp;
$_SESSION['Telephone'] = $tel;

if(isset($_FILES['Photo']) && isset($_FILES['ImageFond'])) {
    $lienphoto='images/user/' . basename($_POST['prenom']).'.jpg';
    move_uploaded_file($_FILES['Photo']['tmp_name'], $lienphoto);
    $lienimagefond='images/user/' ."fond". basename($_POST['prenom']).'.jpg';
    move_uploaded_file($_FILES['ImageFond']['tmp_name'], $lienimagefond);
    
    $_SESSION['Photo'] = $lienphoto;
    $_SESSION['ImageFond'] = $lienimagefond;
    
} elseif(isset($_FILES['Photo']) && !isset($_FILES['ImageFond'])) {
    $lienphoto='images/user/' . basename($_POST['prenom']).'.jpg';
    move_uploaded_file($_FILES['Photo']['tmp_name'], $lienphoto);
    
    $_SESSION['Photo'] = $lienphoto;
    
} elseif(!isset($_FILES['Photo']) && isset($_FILES['ImageFond'])) {
    $lienimagefond='images/user/' . basename($_POST['prenom']).'.jpg';
    move_uploaded_file($_FILES['Photo']['tmp_name'], $lienimagefond);
    
    $_SESSION['ImageFond'] = $lienimagefond;
} 

$sql="UPDATE utilisateur SET Nom='".$nom."',Prenom='".$prenom."',Email='".$mail."',MotDePasse='".$mdp."',Photo='".$_SESSION['Photo']."',ImageFond='".$_SESSION['ImageFond']."',Telephone=".$tel." WHERE IDutilisateur=".$_SESSION['ID'].";";

if($db) {
    $db->query($sql);

} else {
    header('Location: MaJAccount.php?error=bdd non trouvée');
}

header('Location: MaJAccount.php');

mysqli_close($db); // fermer la connexion
?>