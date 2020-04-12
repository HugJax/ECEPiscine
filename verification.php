<?php
session_start();
$_SESSION['login'] = 'null';

if(isset($_POST['login']) && isset($_POST['password']))
{
    $db = mysqli_connect('localhost', 'root', '', 'piscine')
           or die('could not connect to database');
    
    $login = isset($_POST["login"])?$_POST["login"] : "";
    $password = isset($_POST["password"])?$_POST["password"] : "";
    
    if($login !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM user where 
        username = '".$login."' and password = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['login'] = $login;
           header('Location: Home.html');
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