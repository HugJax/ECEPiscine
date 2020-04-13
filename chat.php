<?php

    
    session_start();

    //Connexion à la base de données 
    $db = mysqli_connect('localhost', 'root', '', 'ebayece')
           or die('could not connect to database');
    
    $propositions = 5;
    
//SUREMENT COMMANDE NECESSAIRE POUR IDVENDEUR
    
    $IDacheteur = session_id();     //On trouve la session en cours d'utilisation
    $IDvendeur = isset($_POST['IDproduit'])? $_POST["IDproduit"] : ""; //On trouve le vendeur du produit par l'identifiant de ce dernier 

    if($IDacheteur)             //Si la session est ouverte
    {
        echo "session trouvée";
        $prixPropose = isset($_POST['prixPropose'])? $_POST["prixPropose"] : "";
        
        

        if(isset($_POST['prixPropose']))           //le prix est proposé par l'acheteur
        {        echo "CCCCCC";

            $requete1 = "INSERT INTO `negociation`(`Commentaire`) VALUES ('".$prixPropose."')";          ////On injecte la donnée saisie par l'utilisateur dans la table
         
            $exec_requete1 = mysql_query($requete1);

            echo "Je vous propose". $prixPropose. euros;
                        
            $requete2 = "SELECT Acceptation FROM negociation";
         
            $exec_requete2 = mysql_query($db,$requete2);

       
            while(nbchances != 0)       //Tant qu'on est à moins de 5 propositions
            {
                if($sql1 == true)               //Si le vendeur accepte l'offre
                {
                    echo "Bravo, votre offre a été acceptez par l'acheteur";
                    //Supprimer de la table
                    $requete3 = "DELETE FROM `negociation`(`Commentaire`) VALUES ('".$prixPropose."')";       
                    $exec_requete3 = mysql_query($db,$requete3);

                    
                }
                else                    //Si le vendeur refuse l'offre
                {
                    propositions-1;    //Décrémentation du nombre de propositions 
                    echo "Votre offre n'a pas été acceptée, proposez plus, il vous reste " .propositions. "propositions";
                    //Supprimer de la table
                    $requete = "DELETE FROM `negociation`(`Commentaire`) VALUES ('".$prixPropose."')";  
                    $exec_requete4 = mysql_query($db,$requete4);

                }
            }
                
            
        }
    
    }
    

?>