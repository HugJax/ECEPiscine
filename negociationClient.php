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
        
        
        
                <!-------Code dédié à la contre offre du vendeur-------->
        <!------------------------------------------------->
        <!------------------------------------------------->
        <!------------------------------------------------->
        
        <!--Style entête-->
        
                <style type=text/css>
            
            h1{
                font-family: fantasy;
                text-align: center;
            }
                    
            h3{
                font-family: fantasy;
                text-align: center;
            }
            
            p{
                font-family:cursive;
                text-align: center;
                color: blue;
            }
            
            tr{
                align-content: center;
            }
        
        </style>
        
        <!--Texte présentation page-->
        
        <h1> Bonjour, des clients vous propose d'acheter vos produit ! </h1>
        <p>Le client vous propose un prix, vous n'êtes pas tenu de l'accepter.</p>
        <p>Trois possibilités s'offrent à vous, vous pouvez accepter l'offre du client la décliner ou bien faire une contre-offre </p>
        <p>!!! Attention, le client ne peut vous proposer que 5 prix différents, soyez habile dans vos propositions !!!</p>
        <br><br><br><br>
        <p> </p>
        
        
        <!--PHP affichant l'ensemble des offres d'achat reçus par le vendeur connecté-->
        
        <?php
        
            //Connexion à la base de données
    
            $database = 'ebayece';

            $db_handle = mysqli_connect('localhost','root', '');

            $db_found = mysqli_select_db($db_handle, $database);
            
            $IDvendeur = isset($_SESSION['IDutilisateur']) ? $_SESSION['IDutilisateur'] : NULL;

            $IDvendeur = $_SESSION['ID'];     //On trouve l'ID du propriétaire (le vendeur) de la session en cours d'utilisation

            if($IDvendeur)             //Si la session du vendeur est reconnue
            {
        
        
                //////////////////////////POUR LA VERSION INTEGREE CREER UNE RECUPERATION DE LA VALEUR DE IDproduitAchete grâce au clic sur l'annonce
        
                // $IDproduitAchete = 4;           //cette variable doit être adaptée aux futures vrais annonces
        
                //Requête récupérant les données contenues dans la table négociation considérant l'identité de la personne connecté
                $requete ="SELECT negociation.IDnegociation, negociation.IDnegociation, negociation.IDproduit,              negociation.IDutilisateur, negociation.Commentaire, negociation.Prix, negociation.EtatVente, negociation.Prix, negociation.Acceptation 
                    FROM negociation 
                    INNER JOIN produit ON negociation.IDproduit = produit.IDproduit 
                    INNER JOIN utilisateur ON negociation.IDutilisateur = utilisateur.IDutilisateur
                    WHERE ((produit.IDutilisateur = '".$IDvendeur."'))";
        
                //(negociation.IDproduit= '".$IDproduitAchete."')

                //si la BDD existe, affichage des données de la table 
                if($db_found) {
                    $result = mysqli_query($db_handle, $requete);
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "IDnegociation: ". $data['IDnegociation']."<br>";
                    echo "IDproduit: ". $data['IDproduit']."<br>";
                    echo "IDutilisateur: ". $data['IDutilisateur']."<br>";
                    echo "Commentaire: ". $data['Commentaire']."<br>";
                    echo "Prix: ". $data['Prix']."<br>";
                    echo "EtatVente: ". $data['EtatVente']."<br>";
                    echo "Acceptation: ". $data['Acceptation']."<br><br>";
            
                }
                } else {
                    echo "Vous n'avez aucune nouvelle annonce";
                }
    
        
        /*
        
        FAIRE CONDITION DE SELECTION DE L'ANNONCE AVEC IDENTIFIANT NEGOCIATION
        
        if()              //RECUPERER LA VALEUR ENTRée par l'utilisateur
        {
            
            $nouveauPrix = isset($_POST['nouveauPrix'])? $_POST["nouveauPrix"] : "";       //On vérifie que l'utilisateur a fait une proposition et on récupère sa valeur 

            
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
        
        }*/
        
    }
    else 
    {
        echo "Veuillez vous connecter pour voir vos annonces";
    }




?>

        <!-- Le vendeur sélectionne une option -->
       <form action="ContreOffre.php" method="post"> 
            
           <h3>Entrez l'identifiant de l'annonce à laquelle vous voulez répondre : </h3>
           <br><br>
           <input type="number" name="idAnnonce" id="idAnnonce"/>
           
           <h3>Répondez favorablement, négativement ou faites une contre-offre : </h3>
           <table>
               
               <tr>
                    <td>Chosissez une option :</td>
               
                    <td>
                        <div>
                            <input type="radio" id="Oui" name="drone" value="Oui">
                            <label for="Oui">Oui</label>
                        </div>
                        <div>
                            <input type="radio" id="Non" name="drone" value="Non">
                            <label for="Non">Non</label>
                        </div>
                        <div>
                            
                            <!--Code Javascript pour faire apparaître la zone de texte-->
                            <script type="text/javascript">
                                    function testClic(radio, zone) {
                                        if(radio.checked == true) {
                                            document.getElementById(zone).style.display = "block";
                                            } else {
                                            document.getElementById(zone).style.display = "none";
                                            }
                                    }
                            </script>
                            
                            <input type="radio" id="contreProposition" name="drone" value="contreProposition" onclick="testClic(this, 'zone1')"/>
                            <label for="contreProposition">Contre Offre (Entrez un prix en euros)</label>
                            <div id="zone1" style="display:none" ><input type="text" name="drone" value="nouveauPrix"/> </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="answer"></td>

                </tr>
               
            </table>
           
                
        </form>
        
        <!------------------------------------------------->
        <!------------------------------------------------->
        <!---------- --------------------------------------->
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