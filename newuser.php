<?php
session_start();

// initializing variables
$nom = "";
$prenom = "";
$mail = "";
$mdp = "";
$tel = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'ebayece');

// REGISTER USER
// receive all input values from the form
$nom = mysqli_real_escape_string($db, $_POST['nom']);
$prenom = mysqli_real_escape_string($db, $_POST['prenom']);
$mail = mysqli_real_escape_string($db, $_POST['mail']);
$mdp = mysqli_real_escape_string($db, $_POST['mdp']);
$tel = mysqli_real_escape_string($db, $_POST['telephone']);
$lienphoto='images/user/' . basename($_POST['prenom']).'.jpg';
move_uploaded_file($_FILES['Photo']['tmp_name'], $lienphoto);
$lienimagefond='images/user/' ."fond". basename($_POST['prenom']).'.jpg';
move_uploaded_file($_FILES['ImageFond']['tmp_name'], $lienimagefond);

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($nom)) { array_push($errors, "Besoin d'un nom"); }
if (empty($prenom)) { array_push($errors, "Besoin d'un prénom"); }
if (empty($mail)) { array_push($errors, "Besoin d'un mail"); }
if (empty($mdp)) { array_push($errors, "Mot de passe oublié"); }
if (empty($tel)) { array_push($errors, "Besoin d'un numéro"); }

$_SESSION['Email'] = $mail;

// Finally, register user if there are no errors in the form
if (count($errors) == 0) {
    $query = "INSERT INTO utilisateur (Nom, Prenom, Email, MotDePasse, Photo, ImageFond, Telephone) 
              VALUES('".$nom."', '".$prenom."', '".$mail."', '".$mdp."', '".$lienphoto."', '".$lienimagefond."', ".$tel.");";
    mysqli_query($db, $query);
    
    header('location: newuserbis.php');
}
?>