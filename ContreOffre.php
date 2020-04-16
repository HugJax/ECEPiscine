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

        
        $requete ="SELECT negociation.IDnegociation 
                    FROM negociation 
                    INNER JOIN produit ON negociation.IDproduit = produit.IDproduit 
                    INNER JOIN utilisateur ON negociation.IDutilisateur = utilisateur.IDutilisateur
                    WHERE ((produit.IDutilisateur = '".$IDvendeur."') AND (negociation.IDnegociation = '".$idAnnonce."'))";
       // $db_handle;
  
    
        
        if($idAnnonce= $db_handle->query($requete))              //Si le vendeur entre une contre-offre
        {
            
            echo "salutttt";
                //identification de la réponse du vendeur 
                if (isset ($_POST['Oui']))
                {
                    $answer = "Oui";
                }

                else if (isset ($_POST['Non']))
                {
                    $answer = "Non";
                }   
            
                else if (isset ($_POST['contreProposition']))
                {
                    $answer = "contreProposition";
                } else {
                    
                    $answer = null;
                }

                        
///////////////////////////////REMPLACER PAR DES IF avec un choix multiple dans le html//////////////////////////
            
            if($answer == "Oui")            //Si le vendeur accepte l'offre 
            { 
                echo "hijhbhjijuhbhjjh";
                //$requete4 = " UPDATE negociation SET EtatVente = 1, Acceptation = 1 WHERE IDnegociation='".$idAnnonce"' ";      //Acceptation de la demande du client
                //$db_handle->query($requete4);
                echo "Bravo, vous venez de vendre votre produit";
            } 
            else if($answer == "Non")            //Si le vendeur décline l'offre           
            {
                //$requete5 = " UPDATE negociation SET EtatVente = 1, Acceptation = 0 WHERE IDnegociation='".$idAnnonce"'";      //Acceptation de la demande du client
                //$db_handle->query($requete5);
                echo "Vous avez refusé la proposition du client";
            }
            else if($answer == "contreProposition")              //Si le vendeur fait une contre offre
            {
                if($_POST['nouveauPrix'])       //Si une contre-offre est proposé par le vendeur du produit
                {
                    //Insertion de la contre-offre dans la base de données
                    //$requete6 = " UPDATE negociation SET Commentaire = '".$nouveauPrix."',Prix = '".$nouveauPrix."' WHERE IDnegociation='".$idAnnonce"' ";      
                    //$db_handle->query($requete6);
                    echo "L'offre que vous avez fait au client concerné à bien été enregistrée";
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
        
        
    }

    


?>