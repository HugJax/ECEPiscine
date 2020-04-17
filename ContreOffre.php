<?php
    
    session_start();
    
    //Connexion à la base de données
    
    $database = 'ebayece';

    $db_handle = mysqli_connect('localhost','root', '');

    $db_found = mysqli_select_db($db_handle, $database);
            
    $IDvendeur = isset($_SESSION['IDutilisateur']) ? $_SESSION['IDutilisateur'] : NULL;

    $IDvendeur = $_SESSION['ID'];     //On trouve l'ID du propriétaire (le vendeur) de la session en cours d'utilisation

    $idAnnonce = isset($_POST['idAnnonce']) ? $_POST['idAnnonce'] : NULL; //On récupère l'annonce du propriétaire



    if($IDvendeur)             //Si la session du vendeur est reconnue
    {
        
        //Requête sélectionnant les demande d'achat concernant le vendeur connecté
        $requete ="SELECT negociation.IDnegociation AS var
                    FROM negociation 
                    INNER JOIN produit ON negociation.IDproduit = produit.IDproduit 
                    INNER JOIN utilisateur ON negociation.IDutilisateur = utilisateur.IDutilisateur
                    WHERE ((produit.IDutilisateur = '".$IDvendeur."') AND (negociation.IDnegociation = '".$idAnnonce."'))";
              
        //On créer la variable permettant de connaître le nombre de propositions
        $exec_requete = mysqli_query($db_handle,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $nego = $reponse['var'];
        

        
            if($idAnnonce == $nego)              //Si le vendeur entre une contre-offre et qu'elle est en accord avec la liste au-dessus
            {

 
                    //Récupération des réponses
                    $Oui = isset($_POST['oui'])? $_POST['oui'] : "";       
                    $Non = isset($_POST['non'])? $_POST['non'] : "";
                
                    $nouveauPrix = isset($_POST['contreProposition'])? $_POST['nouveauPrix'] : "";
                
                
                    if($Oui)            //Si le vendeur accepte l'offre 
                    { 
                        
                        $requete4 = " UPDATE negociation SET EtatVente = 1, Acceptation = 1 WHERE IDnegociation='".$idAnnonce."' ";      //Acceptation de la demande du client
                        //$produitVendu = " UPDATE produit SET Vendu = 1 WHERE IDnegociation='".$idAnnonce."' ";
                        /////AJOUTER UNE REQUETE POUR MODIFIER LE STATUT DE Vendu dans la table produit
                        $db_handle->query($requete4);
                        echo "Bravo, vous venez de vendre votre produit";
                    } 
                    else if($Non)            //Si le vendeur décline l'offre           
                    {
                        $requete5 = " UPDATE negociation SET EtatVente = 1, Acceptation = 0 WHERE IDnegociation='".$idAnnonce."'";   //Acceptation de la demande du client
                        $db_handle->query($requete5);
                        echo "Vous avez refusé la proposition du client";
                    }
                    else if($nouveauPrix)              //Si le vendeur fait une contre offre
                    {
                        $contreProposition = isset($_POST['contreProposition'])? $_POST['contreProposition'] : "";  
                        
                        if($_POST['contreProposition'])       //Si une contre-offre est proposé par le vendeur du produit
                        {
                            echo "Le prix proposé par le vendeur est :" .$contreProposition ;
                            //Insertion de la contre-offre dans la base de données
                            $requete6 = " UPDATE negociation SET Commentaire = '".$contreProposition."',Prix = '".$contreProposition."' WHERE IDnegociation='".$idAnnonce."' ";      
                            $db_handle->query($requete6);
                            echo "L'offre que vous avez faite au client concerné à bien été enregistrée";
                        }
                    }
        
            }
            else if  ($idAnnonce = "")
            {
                echo "Veuillez entrer l'identifiant d'une annonce";
            }
            else
            {
                echo "La demande d'achat sélectionnée n'existe pas";
            }
        
        
      //  }
        
    }
        
         


?>