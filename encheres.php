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

//BLINDER POUR QUE L'ACHETEUR NE PUISSE FAIRE QU'UNE SEULE ET UNIQUE ENCHERE
    if($IDacheteur)             //Si la session est ouverte
    {
        $enchereMax = isset($_POST['enchereMax'])? $_POST["enchereMax"] : "";       //On vérifie que l'utilisateur a fait une proposition de prix

        if(isset($_POST['enchereMax']))           //l'enchère maximale est proposée par l'acheteur
        {  
            
            //Ces variables doivent être changées pour intégrer la page 
            //$Prix = 12;
            $IDproduit = 1;
            $IDvendeur = 3;
   
            //On insère la proposition d'achat dans la table négociation
            $requete1 = "INSERT INTO `enchere`(`IDenchere`, `IDadmin`, `IDutilisateur`, `IDproduit`, `PrixCours`, `PrixMax`) VALUES (IDenchere, 1,(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur='".$IDacheteur."'), PrixCours,(SELECT IDproduit FROM produit WHERE IDproduit='".$IDproduit."'), '".$enchereMax."')";
           
            $db_handle->query($requete1);           //On effectue la requête d'insertion précédente
                                    
            echo 
        
        }
        else
        {
            echo "!!! Proposez un prix !!!";
                //Blindage
        }
            
    }
    
    else
    {
        echo "Veuillez vous connecter pour pouvoir faire des offres !";             //Blindage
    }

    mysqli_close($db_handle);
    

?>