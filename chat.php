<?php
    
    session_start();

    //Connexion à la base de données version 1
    //$db = mysqli_connect('localhost', 'root', '', 'ebayece')
      //     or die('could not connect to database');

    //Connexion à la base de données version 2
    $database = 'ebayece';

    $db_handle = mysqli_connect('localhost','root', '');

    $db_found = mysqli_select_db($db_handle, $database);

    
    $propositions = 0;              //nombre maximal de propositions de prix que peut faire l'acheteur 
    $IDacheteur = isset($_SESSION['IDutilisateur']) ? $_SESSION['IDutilisateur'] : NULL;

    $IDacheteur = $_SESSION['login'];     //On trouve l'ID du propriétaire de la session en cours d'utilisation

//POUR LA VERSION FINALE AVEC DE VRAI PRODUITS    $IDvendeur = isset($_POST['$IDproduit'])? $_POST["$IDproduit"] : ""; //On trouve le vendeur du produit par l'identifiant de ce dernier 


    if($IDacheteur)             //Si la session est ouverte
    {
        $prixPropose = isset($_POST['prixPropose'])? $_POST["prixPropose"] : "";       //On vérifie que l'utilisateur a fait une proposition
        
        if(isset($_POST['prixPropose']))           //le prix est proposé par l'acheteur
        {  
            
            //Ces variables doivent être changées pour intégrer la page 
            $Prix = 12;
            $EtatVente = 0;
            $Acceptation = 0;
            $IDproduit = 1;
            $IDvendeur = 3;
            
           
            //On insère la proposition d'achat dans la table négociation
            $requete1 = "INSERT INTO `negociation`(`IDproduit`, `IDutilisateur`, `Commentaire`, `Prix`, `EtatVente`, `Acceptation`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit='".$IDproduit."'), (SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur='".$IDacheteur."'), '".$prixPropose."', '".$Prix."' ,0,0)";
           
            $db_handle->query($requete1);           //On effectue la requête d'insertion précédente
      
            echo "Je vous propose". $prixPropose. "euros";
                        
            
            //On récupère le booléen spécifiant si la proposition de l'acheteur connecté est satisfaite
            $requete2 = "SELECT Acceptation FROM negociation WHERE IDutilisateur = '".$IDacheteur."' "; 
            
            $db_handle->query($requete2);           //On effectue la requête précédente 

       
            if($propositions < 5 )       //Si on est à moins de 5 propositions
            {
                
                if($requete2 == 1)               //Si le vendeur accepte l'offre
                {
                    echo "Bravo, votre offre a été acceptée par l'acheteur";
                    //Suppression de votre ancienne proposition de la table
                    $requete3 = "DELETE * FROM `negociation` WHERE IDutilisateur='".$IDacheteur."' ";       
                    $db_handle->query($requete3);

                }
                if($requete2 == 0)                     //Si le vendeur refuse l'offre
                {
                    ++$propositions;    //Incrémentation du nombre de propositions 
                    echo "Votre offre n'a pas été acceptée, Le vendeur va vous faire une contre-offre, il vous reste " .$propositions. "propositions";
                    //Suppression de votre ancienne proposition de la table 
                    $requete4 = "DELETE FROM `negociation`(`Commentaire`) VALUES ('".$prixPropose."')";  
                    $db_handle->query($requete4);
         
                }
            }
            
        }
        
    
    }

    mysqli_close($db_handle);
    

?>