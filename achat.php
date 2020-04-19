<?php
    session_start();
?>

<html>
    <head>
        <link rel="icon" href="images/favicon.ico">
        <title>eBay ECE :: Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="sheet.css" rel="stylesheet" type="text/css">
        <style>
            .bg {
              background-image: url("images/fond2.png");
              height: 14%; 
                width: 100%;
                right: 0;
              padding: 0;
              margin: 0;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
            }
            .footer {
               left: 0;
                right: 0;
               bottom: 0;
                padding: 0;
                margin: 0;
               width: 100%;
               font-size: 0.8em;
               background-color:#00264d;
               color: white;
               text-align: center;
            }
            .nav-bar{
                background: #008080;
                height:40px;
                right: 0;
                left: 0;
                font-size: 17px;
                text-align: center;
                margin-bottom:25px;
                margin-top: 0;
                padding: 0;
                margin-left: 0;
                margin-right: 0;
            }
            .nav-bar.fixed{
              position:fixed;
              top:0;
                right: 0;
                left: 0;
              z-index: 1;
            }
            .bar-categorie{
            background:#008080;
            height:120px;
            width: 200px;
            text-align: center;
            font-family: comic sans ms;
            border-width:1px;
            border-style:solid;
            border-color:white;
            position:fixed;
            }

            .categorie{
            color:white;
            font-family: comic sans ms;
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
        <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.j s"> </script>

        <script>
            $(window).scroll(function (event) {
            var y = $(this).scrollTop(); 
            if (y >= 125) {
              $('.nav-bar').addClass('fixed');
            } else {
              $('.nav-bar').removeClass('fixed');
            }
          });

            jQuery(document).ready(function($) {
                                
                    $('.categorie').mouseenter(function(){
                        $('.categorie').html('<div class="bar-categorie"><a href="Categorie.html"><div class="categorie">Féraille ou Trésor</div><a href="Categorie.html"><div class="categorie">Bon pour le Musée</div><a href="Categorie.html"><div class="categorie">Accessoire VIP</div></div>');
                    });

                    $('.categorie').mouseleave(function(){
                        $('.categorie').html('Catégories');
                        });
            });
            

        </script>
    </head>
    
    <body>
        <!--Header de la page commune à toutes les pages-->
        <div class="bg"></div>
        <div class="header-home">
            <div class="nav-bar">
                <ul>
                    <li style="margin-right: 60px; margin-left: 60px;">
                        <a class="underlineHover" href="Home.php" style='text-decoration:none;'>
                            <div style='color:white;font-family: comic sans ms;'>Accueil</div>
                        </a>
                    </li>
                    <li style="margin-right: 60px;">
                        <a class="underlineHover" href="#" style='text-decoration:none;'>
                            <div style='color:white;font-family: comic sans ms;'><div class="categorie">Catégories</div></div>
                        </a>
                    </li>
                    <li style="margin-right: 60px;">
                        <a class="underlineHover" href="#" style='text-decoration:none;'>
                            <div style='color:white;font-family: comic sans ms;'>Vendre</div>
                        </a>
                    </li>
                    <?php
                        if(isset($_SESSION['ID']))
                        {
                            echo "<li style='float: right; margin-right: 30px'><a class='underlineHover' href='logout.php?logout=true' style='text-decoration:none;'><div style='color:white;font-family: comic sans ms;'>Déconnexion</div></a></li><li style='float: right; margin-right: 30px'><a class='underlineHover' href='#' style='text-decoration:none;'><div style='color:white;font-family: comic sans ms;'>Panier</div></a></li><li style='float: right; margin-right: 30px'><a class='underlineHover' href='DisplayAccount.php' style='text-decoration:none;'><div style='color:white;font-family: comic sans ms';'>".$_SESSION['Nom']." ".$_SESSION['Prenom']."</div></a></li>";
                        }
                    else
                    {
                        echo "<li style='float: right; margin-right: 30px'><a class='underlineHover' href='newuser.html' style='text-decoration:none;'><div style='color:white;font-family: comic sans ms;'>Nouveau compte</div></a></li><li style='float: right; margin-right: 30px'><a class='underlineHover' href='logIn.html' style='text-decoration:none;'><div style='color:white;font-family: comic sans ms;'>Se connecter</div></a></li>";
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
        
        <!--ZONE DE CODAGE-->

        
        
        <!-------Code dédié au chat de négociation -------->
        <!------------------------------------------------->
        <!------------------------------------------------->
        <!------------------------------------------------->
        
        <?php
    
            //session_start();

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
                    //VARIABLE A IMPLEMENTER DANS LA VERSION DEFINITIVE
                    //$IDproduit = isset($_POST['ID']); ou faire une requpete ça dépend du code de thomas
            
            
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
        
        <!------------------------------------------------->
        <!------------------------------------------------->
        <!------------------------------------------------->
        <!------Fin  du chat de négociation--------------->
        
        

        <!--ZONE DE CODAGE-->
        
    </body>
    
    <footer>
        <!--Footer de la page commune à toutes les pages-->
            <table class="footer">
                <tr>
                    <td height=60px><img src="images/logo.png" style="height:40px;width:40px" alt="logo">
                    EBay ECE</td>
                    <td><b>Découvrez EBay ECE</b></td>
                    <td><b>Catégories</b></td>
                    <td><b>Nous contacter</b></td>
                </tr>
                <tr>
                    <td>Web Dynamique 2020</td>
                    <td><a href="ConditionGenerales.php" style="color:white">Conditions générales de vente</a></td>
                    <td><a href="#" style="color:white">Ferraille ou trésor</a></td>
                    <td><a href="ContactForm.php" style="color:white">Nous envoyer un message</a></td>
                </tr>
                <tr>
                    <td>Groupe 1 Projet Piscine</td>
                    <td><a href="Apropos.php" style="color:white">A propos de EBay ECE</a></td>
                    <td><a href="#" style="color:white">Bon pour le musée</a></td>
                    <td>37 Quai de Grennelle, 75015 Paris</td>
                </tr>
                <tr>
                    <td>ECE Paris ING3 TD5</td>
                    <td><a href="https://github.com/HugJax/ECEPiscine.git" style="color:white">Accès GitHub</a></td>
                    <td><a href="#" style="color:white">Accessoires VIP</a></td>
                    <td></td>
                </tr>
                <tr>
                    <td height=30px colspan=4></td>
                </tr>
                <tr>
                    <td height=60px colspan=4>©2020, EBay ECE, Inc. ou ses filiales</td>
                </tr>
            </table>
    </footer>
</html>