<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'ebayece')
           or die('could not connect to database');
    $requete = "SELECT count(*) FROM produit WHERE Vendu=0";
    $exec_requete = mysqli_query($db,$requete);
    $reponse      = mysqli_fetch_array($exec_requete);
    $count = $reponse['count(*)'];
    $i=0;
    $produit = array();
    if($count!=0) {
        $requete = "SELECT * FROM produit WHERE Vendu=0";
        $exec_requete = mysqli_query($db, $requete);
        while($reponse = mysqli_fetch_assoc($exec_requete)) {
            $sqlbis = "SELECT Lien FROM image WHERE IDproduit=".$reponse['IDproduit'];
            $exec_requetesql = mysqli_query($db,$sqlbis);
            $reponsesql      = mysqli_fetch_assoc($exec_requetesql);
            $lien = $reponsesql['Lien'];
            $requetebis = "SELECT Nom, Prenom FROM utilisateur WHERE IDutilisateur=".$reponse['IDutilisateur'];
            $exec_requetebis = mysqli_query($db,$requetebis);
            $reponsebis      = mysqli_fetch_array($exec_requetebis);
            $vendeur = $reponsebis['Nom']." ".$reponsebis['Prenom'];
            $produit[$i] = array($reponse['IDproduit'], $reponse['Nom'], $reponse['Categorie'], $reponse['Prix'], $reponse['DateMiseEnLigne'], $reponse['OffreSpeciale'], $vendeur, $lien);
            $i++;
        }
    }
?>

<html>
    <head>
        <link rel="icon" href="images/favicon.ico">
        <title>eBay ECE :: Ventes disponibles</title>
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
            .but {
              background-color: #b30000;
              border: none;
              color: white;
              padding: 15px 15px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              text-transform: uppercase;
              font-size: 12px;
              -webkit-border-radius: 5px 5px 5px 5px;
              border-radius: 5px 5px 5px 5px;
              margin: 5px 5px 5px 5px;
            }
            .footer {
               left: 0;
                right: 0;
               bottom: 0;
                padding: 0;
                margin: 0;
                margin-top: 70px;
               width: 100%;
               font-size: 0.8em;
               background-color:#00264d;
               color: white;
               text-align: center;
                bottom: 0;
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
        </script>
    </head>
    
    <body>
        <!--Header de la page commune à toutes les pages-->
        <div class="bg"></div>
        <div class="header-home">
            <div class="nav-bar">
                <ul>
                    <li style="margin-right: 60px; margin-left: 60px;">
                        <a class="underlineHover" href="AdminVente.php" style='text-decoration:none;'>
                            <div style='color:white;font-family: comic sans ms;'>Ventes disponibles</div>
                        </a>
                    </li>
                    <li style="margin-right: 60px;">
                        <a class="underlineHover" href="AdminEnchere.php" style='text-decoration:none;'>
                            <div style='color:white;font-family: comic sans ms;'><div class="categorie">Page des enchères</div></div>
                        </a>
                    </li>
                    <li style="margin-right: 60px;">
                        <a class="underlineHover" href="AdminDemandeVendeur.php" style='text-decoration:none;'>
                            <div style='color:white;font-family: comic sans ms;'>Demandes du statut vendeur</div>
                        </a>
                    </li>
                    <li style="margin-right: 60px;">
                        <a class="underlineHover" href="AdminUserList.php" style='text-decoration:none;'>
                            <div style='color:white;font-family: comic sans ms;'>Liste des utilisateurs</div>
                        </a>
                    </li>
                    <li style='float: right; margin-right: 30px'>
                        <a class="underlineHover" href="logout.php?logout=true" style='text-decoration:none;'>
                            <div style='color:white;font-family: comic sans ms;'>Déconnexion</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!--ZONE DE CODAGE-->

        <?php
            for($x=0; $x<=($count-1); $x++) {
                echo '<div id="formContent" style="float:right;padding:30px;max-width:none;width:80%;margin-right:10%;margin-top:20px;margin-bottom:20px;height:auto;"><table><tr><td width=200px><img class="media-object dp img-circle" src='.$produit[$x][7].' style="width: 180px;height:180px;"></td><td width=300px><h4>'.utf8_encode($produit[$x][1]).'</h4></td><td width=140px>'.utf8_encode($produit[$x][2]).'</td><td width=140px>'.utf8_encode($produit[$x][3]).'€</td><td width=140px>'.utf8_encode($produit[$x][4]).'</td><td width=140px>'.utf8_encode($produit[$x][6]).'</td></tr><tr><td colspan=6 align=right><form action="SupArticle.php" method="post"><button name="sup" type="submit" class="but" value="'.$produit[$x][0].'">SUPPRIMER ARTICLE</button></td></tr></table></div>';
            }
        ?>

        <!--ZONE DE CODAGE-->
        
    </body>
    
    <footer>
        <!--Footer de la page commune à toutes les pages-->
            <table class="footer">
                <tr>
                    <td height=60px><img src="images/logo.png" style="height:40px;width:40px" alt="logo">
                    EBay ECE</td>
                    <td><b>Découvrez EBay ECE</b></td>
                </tr>
                <tr>
                    <td>Web Dynamique 2020</td>
                </tr>
                <tr>
                    <td>Groupe 1 Projet Piscine</td>
                    <td>37 Quai de Grennelle, 75015 Paris</td>
                </tr>
                <tr>
                    <td>ECE Paris ING3 TD5</td>
                    <td><a href="https://github.com/HugJax/ECEPiscine.git" style="color:white">Accès GitHub</a></td>
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