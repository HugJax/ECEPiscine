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
            
            //CES VARIABLES DOIVENT ÊTRE MODIFIEES DANS LA VERSION FINALE CAR IL FAUT RECUPERER L'IDENTIFIANT DU PRODUIT PUIS CELUI DE SON VENDEUR
            $IDproduit = 2;
            $IDvendeur = 3;
            
            $propositions = "SELECT COUNT(*)  FROM `negociation` WHERE ((IDutilisateur='".$IDacheteur."') AND (IDproduit='".$IDproduit."'))";      //On compte le nombre de demandes effectuées par un acheteur sur un produit donné
            
            //On créer la variable permettant de connaître le nombre de propositions
            $exec_requete = mysqli_query($db_handle,$propositions);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['COUNT(*)'];
            
            
            //On récupère le booléen spécifiant si la proposition de l'acheteur connecté est satisfaite
            $etatVente = "SELECT Vendu FROM produit WHERE (IDproduit='".$IDproduit."') "; 
            
            // $db_handle->query($acceptation);           //On effectue la requête précédente 
            
            $exec_requete = mysqli_query($db_handle,$etatVente);
            $reponse      = mysqli_fetch_array($exec_requete);
            $achat = $reponse['Vendu'];
            
            ///////////////////////////////////////
            ///////////////////////////////////////
            /////////////////////////////////////////
            /////////////////////////////////////////////
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
                

            $datetime = date("Y-m-d H:i:s");          //Récupération de la date du jour

            $prix = "SELECT Prix FROM negociation WHERE ((IDproduit='".$IDproduit."') AND Acceptation=1 AND EtatVente=1) "; 
            
            $exec_requete = mysqli_query($db_handle,$prix);
            $reponse      = mysqli_fetch_array($exec_requete);
            $prixAchat = $reponse['Prix'];            
            
            
            
            ////////////////////////////////
                        ///////////////////////////////
            /////////////////////////////////////
            //////////////////////////////////////
            /////////////////////////////////////
                        
            if($achat == 0)                 //Si le produit est toujours disponible à la vente 
            {
                if($count < 5 )       //Si on est à moins de 5 propositions
                {
           
                    //On insère la proposition d'achat dans la table négociation
                    $requete1 = "INSERT INTO `negociation`(`IDproduit`, `IDutilisateur`, `Commentaire`, `Prix`, `EtatVente`, `Acceptation`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit='".$IDproduit."'), (SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur='".$IDacheteur."'), '".$commentaire."', '".$prixPropose."' ,0,0)";
           
                    $db_handle->query($requete1);           //On effectue la requête d'insertion précédente
      
                    echo "Je vous propose". $prixPropose. "euros";
                        
            
                    //On récupère le booléen spécifiant si la proposition de l'acheteur connecté est satisfaite
                    $acceptation = "SELECT Acceptation FROM negociation WHERE (IDutilisateur = '".$IDacheteur."' AND IDproduit='".$IDproduit."') "; 
                        
                    $exec_requete = mysqli_query($db_handle,$acceptation);
                    $reponse      = mysqli_fetch_array($exec_requete);
                    $count = $reponse['Acceptation'];
                                    
                    if($count == 1)               //Si le vendeur accepte l'offre
                    {
                        echo "Bravo, votre offre a été acceptée par l'acheteur";
                        //Suppression de votre ancienne proposition de la table
                        $requete3 = "DELETE FROM `negociation` WHERE IDutilisateur='".$IDacheteur."' ";       
                        $db_handle->query($requete3);
                        
                        
                        if($verification1 == 1)             //Si l'adresse de l'acheteur est bien enregistrée
                        {
                            if($verification2 == 1)        //Si les coordonnées  bancaires de l'acheteur sont bien enregistrées
                            {
                                //Insertion de la transaction dans la table transaction 
                                $confirmationAchat = "INSERT INTO `transaction`(`IDtransaction`, `IDproduit`, `IDutilisateur`, `Prix`, `Date`) VALUES (IDtransaction,".$IDproduit.",'".$IDacheteur."','".$prixAchat."', '".$datetime."')";  
                                $db_handle->query($confirmationAchat);
                        
                                //On notifie que le produit a été vendu
                                $modificationStatutVenteProduit = " UPDATE produit SET Vendu = 1 WHERE IDproduit='".$IDproduit."' ";      
                                $db_handle->query($modificationStatutVenteProduit);
                                
                                echo "Bravo, votre nouvelle acquisition a été prise en compte";
                        
                            }
                            else
                            {
                                echo "Veuillez ajouter vos coordonnées bancaires";
                            }
                        
                        }   
                        else
                        {
                            echo "Veuillez ajouter une adresse de livraison";
                        }

                    }
                    if($count == 0)                     //Si le vendeur refuse l'offre
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
                    //Blindage
                }
            
            }
            else
            {
                echo "Désolé, ce produit a déjà été acheté par un autre utilisateur";
            }
            
        }
    
    }
    else
    {
        echo "Veuillez vous connecter pour pouvoir faire des offres !";             //Blindage
    }

    mysqli_close($db_handle);
    

?>