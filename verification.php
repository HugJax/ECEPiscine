<?php
session_start();

if(isset($_POST['login']) && isset($_POST['password']))
{
    $db = mysqli_connect('localhost', 'root', '', 'ebayece')
           or die('could not connect to database');
    
    $login = isset($_POST["login"])?$_POST["login"] : "";
    $password = isset($_POST["password"])?$_POST["password"] : "";
    
    if($login !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur where 
        Email = '".$login."' and MotDePasse = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
            $requete = "SELECT * FROM utilisateur where Email = '".$login."' and MotDePasse = '".$password."' ";
            $exec_requete = mysqli_query($db,$requete);
            $reponse      = mysqli_fetch_assoc($exec_requete);
            $_SESSION['ID'] = $login;
            $_SESSION['Nom'] = $reponse['Nom'];
            $_SESSION['Prenom'] = $reponse['Prenom'];
            $_SESSION['Email'] = $reponse['Email'];
            $_SESSION['MDP'] = $password;
            $_SESSION['Photo'] = $reponse['Photo'];
            $_SESSION['ImageFond'] = $reponse['ImageFond'];
            $_SESSION['Telephone'] = $reponse['Telephone'];
            header('Location: Home.php');
        }
        else
        {
           header('Location: logIn.html?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: logIn.html?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: logIn.html');
}
mysqli_close($db); // fermer la connexion
?>