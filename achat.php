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
        
        if($_POST['comptant'])           //Si l'acheteur utilise l'option "achat direct" Récupérer la la valeur de la donnée entrée
        {  
            
            //Ces variables doivent être changées pour intégrer la page 
            $IDproduit = 8;
            
            //On récupère le prix du produit concerné
            $prix = "SELECT Prix FROM produit WHERE (IDproduit='".$IDproduit."') "; 
            
            $exec_requete = mysqli_query($db_handle,$prix);
            $reponse      = mysqli_fetch_array($exec_requete);
            $prixAchat = $reponse['Prix'];
            
            //On récupère le booléen spécifiant si la proposition de l'acheteur connecté est satisfaite
            $etatVente = "SELECT Vendu FROM produit WHERE (IDproduit='".$IDproduit."') "; 
            
            // $db_handle->query($acceptation);           //On effectue la requête précédente 
            
            $exec_requete = mysqli_query($db_handle,$etatVente);
            $reponse      = mysqli_fetch_array($exec_requete);
            $achat = $reponse['Vendu'];
            
            $datetime = date("Y-m-d H:i:s");          //Récupération de la date du jour

            if($achat == 0)                 //Si le produit est toujours disponible à la vente 
            {
                //On vérifie que les coordonnées de l'acheteur sont bien enregistrées dans la BDD
                
                $verification1 ="SELECT adresse.IDadresse 
                    FROM adresse 
                    INNER JOIN utilisateur ON adresse.IDadresse = utilisateur.IDadresse 
                    WHERE (utilisateur.IDutilisateur = '".$IDacheteur."')";
                
                
                $exec_requete = mysqli_query($db_handle,$verification1);
                $reponse      = mysqli_fetch_array($exec_requete);
                $coordonneesA = $reponse['IDadresse'];
                
                
                $verification2 ="SELECT paiement.IDpaiement 
                    FROM paiement 
                    INNER JOIN utilisateur ON paiement.IDpaiement = utilisateur.IDpaiement 
                    WHERE (utilisateur.IDutilisateur = '".$IDacheteur."')";

                $exec_requete = mysqli_query($db_handle,$verification2);
                $reponse      = mysqli_fetch_array($exec_requete);
                $coordonneesP = $reponse['IDpaiement'];
                
                
                if($verification1 == 0)             //Si l'adresse de l'acheteur est bien enregistrée
                {
                    if($verification2 == 0)        //Si les coordonnées de l'acheteur sont bien enregistrées
                    {
                        //Insertion de la transaction dans la table transaction 
                        $confirmationAchat = "INSERT INTO `transaction`(`IDtransaction`, `IDproduit`, `IDutilisateur`, `Prix`, `Date`) VALUES (IDtransaction,".$IDproduit.",'".$IDacheteur."','".$prixAchat."', '".$datetime."')"; 
                         $db_handle->query($confirmationAchat);
                        
                        
                        //On notifie que le produit a été vendu
                        $modificationStatutVenteProduit = " UPDATE produit SET Vendu = 1 WHERE IDproduit='".$IDproduit."' ";      
                        $db_handle->query($modificationStatutVenteProduit);
                        
                        
                        echo "Félicitation pour votre achat, vous le recevrez dans les prochains jours";
                        
                    }
                    else
                    {
                        echo "Veuillez enregistrer vos coordonnées bancaires avant de procéder au paiement";        //Blindage
                    }
                            
                }
                else
                {
                    echo "Veuillez enregistrer votre adresse avant de payer";
                }
                
            }
            else
            {
                echo "Désolé mais ce produit  à déjà été acquis par un autre utilisateur";      //Blindage
            }           

                
    }
    else
    {
        echo "Veuillez vous connecter pour pouvoir acheter un article !";             //Blindage
    }

    mysqli_close($db_handle);
    }

?>