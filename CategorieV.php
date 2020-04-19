<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'ebayece')
           or die('could not connect to database');
    $db_found = mysqli_select_db($db, 'ebayece');
    $requete = "SELECT count(*) FROM produit WHERE Categorie='Accessoire VIP' ";
    $exec_requete = mysqli_query($db, $requete);
    $reponse = mysqli_fetch_array($exec_requete);
    $count  = $reponse['count(*)'];

    $carroussel = array();
    $prestigeMusee = array();
    $i=0;
    $j=0;
    $k=0;
    $w=0;
    if($db_found) {
        $sql3="SELECT IDproduit,Nom,Description,Prix,Categorie,Qualite,Defaut,OffreSpeciale,IDutilisateur FROM produit WHERE Categorie='Accessoire VIP' ORDER BY DateMiseEnLigne DESC;";
        $result3 = mysqli_query($db, $sql3);
        while ($data = mysqli_fetch_assoc($result3)) {
            $sqlbis = "SELECT Lien FROM image WHERE IDproduit='".$data['IDproduit']."';";
            $exec_requete = mysqli_query($db,$sqlbis);
            $reponsebis      = mysqli_fetch_assoc($exec_requete);

            $sqlter = "SELECT IDutilisateur,Nom,Prenom,Email,Telephone FROM utilisateur WHERE IDutilisateur='".$data['IDutilisateur']."';";
            $exec_requete = mysqli_query($db,$sqlter);
            $reponseter      = mysqli_fetch_assoc($exec_requete);
            
            
            $prestigeMusee[$j] = array($data['IDproduit'], $data['Nom'], $data['Description'], $data['Prix'], $data['Categorie'],$data['Qualite'],$data['Defaut'], $reponsebis['Lien'],$reponseter['Nom'],$reponseter['Prenom'],$reponseter['Email'],$reponseter['Telephone']);
            $j++;
        }
    }

?>

<html>
    <head>
        <link rel="icon" href="images/favicon.ico">
        <title>eBay ECE :: Votre compte</title>
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
            body {
              background-image: url('<?php echo $_SESSION['ImageFond'] ?>');
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-size: 100% 100%;
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
                z-index: 1;
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
                        $('.categorie').html('<div class="bar-categorie"><a href="CategorieF.php"><div class="categorie">Féraille ou Trésor</div><a href="CategorieM.php"><div class="categorie">Bon pour le Musée</div><a href="CategorieV.php"><div class="categorie">Accessoire VIP</div></div>');
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

        <!--ZONE POUR CODER-->
        <div class="container">
                    <h2 class="title">Les plus récentes</h2><br>
                    <?php
                    for($i=0;$i<$count;$i++)
                    {
                         echo "<div class=\"produit$\">
                                <form action=\"produit.php\" method=\"post\" >
                                    <button type=\"submit\"  name=\"".$prestigeMusee[$i][0]."\">
                                        <table ><tr>
                                            <td><div style=\"height:300px;width:250\">
                                                    <img class=\"img-thumbnail\" src=\"".utf8_encode($prestigeMusee[$i][7])."\" style=\"height:300px;width:250px\">
                                                </div></td>
                                                    <td width=\"2000px\"><div><h4 style=\"text-align:center;weight:500px\" >".utf8_encode($prestigeMusee[$i][1])."</h4>
                                                            <p ><strong slyle=\"\">".utf8_encode($prestigeMusee[$i][3]).".00 euros</strong><br><br>".utf8_encode($prestigeMusee[$i][2])."</p>
                                                        </div></td>
                                                </tr>
                                        </table>
                                    </button>
                                </form>
                            </div>";
                    }
                    ?>         
                    
        </div>

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
                    <td>37 Quai de Grenelle, 75015 Paris</td>
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