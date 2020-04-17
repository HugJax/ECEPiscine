<?php
    
    session_start();

    //Connexion à la base de données version 1
    //$db = mysqli_connect('localhost', 'root', '', 'ebayece')
      //     or die('could not connect to database');

    //Connexion à la base de données version 2
    $database = 'ebayece';

    $db_handle = mysqli_connect('localhost','root', '');

    $db_found = mysqli_select_db($db_handle, $database);

    $IDacheteur = isset($_SESSION['IDutilisateur']) ? $_SESSION['IDutilisateur'] : NULL;

    $IDacheteur = $_SESSION['ID'];     //On trouve l'ID du propriétaire de la session en cours d'utilisation

//POUR LA VERSION FINALE AVEC DE VRAI PRODUITS    $IDvendeur = isset($_POST['$IDproduit'])? $_POST["$IDproduit"] : ""; //On trouve le vendeur du produit par l'identifiant de ce dernier 


    if($IDacheteur)             //Si la session est ouverte
    {
        $prixPropose = isset($_POST['prixPropose'])? $_POST["prixPropose"] : "";       //On vérifie que l'utilisateur a fait une proposition de prix
        $commentaire = isset($_POST['commentaire'])? $_POST["commentaire"] : "";        //On regarde si l'utilisateur a ajouté un commentaire
        
        if(isset($_POST['prixPropose'])||(isset($_POST['commentaire'])))           //le prix est proposé par l'acheteur
        {  
            
            //Ces variables doivent être changées pour intégrer la page 
            //$Prix = 12;
            $IDproduit = 1;
            $IDvendeur = 3;
            
            $propositions = "SELECT COUNT(*)  FROM `negociation` WHERE ((IDutilisateur='".$IDacheteur."') AND (IDproduit='".$IDproduit."'))";      //On compte le nombre de demandes effectuées par un acheteur sur un produit donné
            
            //On créer la variable permettant de connaître le nombre de propositions
            $exec_requete = mysqli_query($db_handle,$propositions);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['COUNT(*)'];
            
            if($count < 5 )       //Si on est à moins de 5 propositions
            {
           
                //On insère la proposition d'achat dans la table négociation
                $requete1 = "INSERT INTO `negociation`(`IDproduit`, `IDutilisateur`, `Commentaire`, `Prix`, `EtatVente`, `Acceptation`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit='".$IDproduit."'), (SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur='".$IDacheteur."'), '".$commentaire."', '".$prixPropose."' ,0,0)";
           
                $db_handle->query($requete1);           //On effectue la requête d'insertion précédente
      
                echo "Je vous propose". $prixPropose. "euros";
                        
            
                //On récupère le booléen spécifiant si la proposition de l'acheteur connecté est satisfaite
                $acceptation = "SELECT Acceptation FROM negociation WHERE (IDutilisateur = '".$IDacheteur."' AND IDproduit='".$IDproduit."') "; 
            
               // $db_handle->query($acceptation);           //On effectue la requête précédente 
            
                $exec_requete = mysqli_query($db_handle,$acceptation);
                $reponse      = mysqli_fetch_array($exec_requete);
                $count = $reponse['Acceptation'];
                
                if($acceptation == 1)               //Si le vendeur accepte l'offre
                {
                    echo "Bravo, votre offre a été acceptée par l'acheteur";
                    //Suppression de votre ancienne proposition de la table
                    $requete3 = "DELETE FROM `negociation` WHERE IDutilisateur='".$IDacheteur."' ";       
                    $db_handle->query($requete3);

                }
                if($acceptation == 0)                     //Si le vendeur refuse l'offre
                {
                    echo "Votre offre n'a pas été acceptée, Le vendeur va vous faire une contre-offre, il vous reste " .$count. "propositions";
                    //Suppression de votre ancienne proposition de la table 
                    $requete4 = "DELETE FROM `negociation`(`Commentaire`) VALUES ('".$prixPropose."')";  
                    $db_handle->query($requete4);
         
                }
            }
            else
            {
                echo "Vous avez déjà fait cinq offres pour ce produit, désolé mais vous ne pouvez plus acheter ce produit";
            }
            
        }
    
    }
    else
    {
        echo "Veuillez vous connecter pour pouvoir faire des offres !";
    }

    mysqli_close($db_handle);
    

?>