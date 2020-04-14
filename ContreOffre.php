<?php
    
    session_start();
    
    //Connexion à la base de données
    
    $database = 'ebayece';

    $db_handle = mysqli_connect('localhost','root', '');

    $db_found = mysqli_select_db($db_handle, $database);
            
    $IDvendeur = isset($_SESSION['IDutilisateur']) ? $_SESSION['IDutilisateur'] : NULL;

    $IDvendeur = $_SESSION['login'];     //On trouve l'ID du propriétaire (le vendeur) de la session en cours d'utilisation


        $IDacheteur = isset($_SESSION['IDutilisateur']) ? $_SESSION['IDutilisateur'] : NULL;

    $IDacheteur = $_SESSION['login'];     //On trouve l'ID du propriétaire de la session en cours d'utilisation


    //identifier la fonction désirée
    if (isset ($_POST['oui']))
    {
        $answer = "oui";
    }

    if (isset ($_POST['non']))
    {
        $answer = "non";
    }

    if (isset ($_POST['contreProposition']))
    {
        $answer = "contreProposition";
    }

    if($IDvendeur)             //Si la session du vendeur est reconnue
    {
        
        $choixVendeur = 0;
        
        $IDproduit;
        
        
        $requete1 = "(SELECT IDutilisateur FROM produit WHERE IDutilisateur='".$IDvendeur."')" ;        //On cherche l'identifiant du vendeur dans la table produit
        $db_handle->query($requete1);           //Exécution de la requête 1
        
        $requete2 = "SELECT IDproduit FROM produit WHERE IDproduit = '".$IDproduit."'";         //On cherche que l'on traite 
        $db_handle->query($requete2);           //Exécution de la requête 2
        
        $requete3 = "SELECT IDproduit FROM negociation";
        $db_handle->query($requete3);           //Exécution de la requête 3
        
        if($requete2 == $requete3)              //Si le vendeur connecté
        {
            $nouveauPrix = isset($_POST['nouveauPrix'])? $_POST["nouveauPrix"] : "";       //On vérifie que l'utilisateur a fait une proposition

            
            echo "Un utilisateur vous a fait une offre d'achat";
                        
///////////////////////////////REMPLACER PAR DES IF avec un choix multiple dans le html//////////////////////////
            
            if($answer == "oui")
            {
                $requete4 = " UPDATE negociation SET EtatVente = 1, Acceptation = 1 ";      //Acceptation de la demande du client
                $db_handle->query($requete4);
                echo "Votre propoition a bien été enregistrée";
            }
            
            if($answer == "non")            
            {
                $requete5 = " UPDATE negociation SET EtatVente = 1, Acceptation = 0 ";      //Acceptation de la demande du client
                $db_handle->query($requete5);
                echo "Votre propoition a bien été enregistrée";
            }
            
            if($answer == "contreProposition")
            {
                if($_POST['nouveauPrix'])       //Si une contre-offre est proposé par le vendeur du produit
                {
                    //Acceptation de la demande du client
                    $requete6 = " UPDATE negociation SET Commentaire = '".$nouveauPrix."',Prix = '".$nouveauPrix."'";      
                    $db_handle->query($requete6);
                    echo "Votre propoition a bien été enregistrée";
                }
            }
        
        }
        
    }




?>