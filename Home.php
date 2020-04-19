<!--https://www.pierre-giraud.com/bootstrap-apprendre-cours/carrousel/-->

<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'ebayece')
           or die('could not connect to database');
    $db_found = mysqli_select_db($db, 'ebayece');
    $sql = "SELECT IDproduit,Nom,Description,Prix,Categorie FROM produit WHERE Vendu=0 ORDER BY DateMiseEnLigne DESC";
    $carroussel = array();
    $prestigeFerraille = array();
    $prestigeMusee = array();
    $prestigeVIP = array();
    $i=0;
    $j=0;
    $k=0;
    $w=0;
    $date= date('Y-m-d');
    if($db_found) {
        $result = mysqli_query($db, $sql);
        while ($data = mysqli_fetch_assoc($result)) {
            $sqlbis = "SELECT Lien FROM image WHERE IDproduit='".$data['IDproduit']."';";
            $exec_requete = mysqli_query($db,$sqlbis);
            $reponse      = mysqli_fetch_assoc($exec_requete);
            $carroussel[$i] = array($data['IDproduit'], $data['Nom'], $data['Description'], $data['Prix'], $data['Categorie'], $reponse['Lien']);
            $i++;
        }
    } else {
        echo "Database not found";
    }
    if($db_found) {
        $sql3="SELECT IDproduit,Nom,Description,Prix,Categorie FROM produit WHERE Categorie='Bon pour le musee' ORDER BY Prix DESC;";
        $result3 = mysqli_query($db, $sql3);
        while ($data = mysqli_fetch_assoc($result3)) {
            $sqlbis = "SELECT Lien FROM image WHERE IDproduit='".$data['IDproduit']."';";
            $exec_requete = mysqli_query($db,$sqlbis);
            $reponse      = mysqli_fetch_assoc($exec_requete);
            $prestigeMusee[$j] = array($data['IDproduit'], $data['Nom'], $data['Description'], $data['Prix'], $data['Categorie'], $reponse['Lien']);
            $j++;
        }
    }
    if($db_found) {
        $sql2="SELECT IDproduit,Nom,Description,Prix,Categorie FROM produit WHERE Categorie='Ferraille ou tresor' ORDER BY Prix DESC;";
        $result2 = mysqli_query($db, $sql2);
        while ($data2 = mysqli_fetch_assoc($result2)) {
            $sqlbis2 = "SELECT Lien FROM image WHERE IDproduit='".$data2['IDproduit']."';";
            $exec_requete2 = mysqli_query($db,$sqlbis2);
            $reponse2      = mysqli_fetch_assoc($exec_requete2);
            $prestigeFerraille[$k] = array($data2['IDproduit'], $data2['Nom'], $data2['Description'], $data2['Prix'], $data2['Categorie'], $reponse2['Lien']);
            $k++;
        }
    }
    if($db_found) {
        $sql4="SELECT IDproduit,Nom,Description,Prix,Categorie FROM produit WHERE Categorie='Accessoire VIP' ORDER BY Prix DESC;";
        $result4 = mysqli_query($db, $sql4);
        while ($data = mysqli_fetch_assoc($result4)) {
            $sqlbis = "SELECT Lien FROM image WHERE IDproduit='".$data['IDproduit']."';";
            $exec_requete = mysqli_query($db,$sqlbis);
            $reponse      = mysqli_fetch_assoc($exec_requete);
            $prestigeVIP[$w] = array($data['IDproduit'], $data['Nom'], $data['Description'], $data['Prix'], $data['Categorie'], $reponse['Lien']);
            $w++;
        }
}

    $req = "SELECT * FROM enchere WHERE DateFin>=".$date;
    $res = mysqli_query($db, $req);
    $dat = mysqli_fetch_assoc($res);

    // valeur vendu=1 dans la table produit
    // modifier valeur du prix dans la table produit
    $sql = "UPADTE produit SET Vendu=1 AND Prix=".$dat['PrixMax'];
    mysqli_query($db, $sql);

    // ajouter au panier de l'acheteur
    $sql2 = "INSERT INTO panier(IDproduit, IDutilisateur) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=".$dat['IDproduit']."), (SELECT IDproduit FROM produit WHERE IDproduit=".$dat['IDutilisateur']."))";
    mysqli_query($db, $sql2);

    // supprimer des enchères
    $sql3 = "DELETE FROM enchere WHERE IDenchere=".$dat['IDenchere'];
    mysqli_query($db, $sql3);

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
        
        <!--Affichage des annonces les plus prestigieuses pour chaque catégorie-->
        <div class="container">
            <h2 class="title">A ne pas manquer !</h2><br>
            <div class="row text-center text-lg-center">
                <div class="col-md-4">
                    Ferraille ou trésor<br>
                    <form action="#" method="post"><button type="submit" style="background-color:transparent" value="<?php echo $prestigeFerraille[0][0]; ?>">
                    <img class="img-fluid img-thumbnail" src="<?php echo utf8_encode($prestigeFerraille[0][5])?>" style="max-height:200px"></button></form>
                    <p><?php echo utf8_encode($prestigeFerraille[0][1])?></p>
                </div>
                <div class="col-md-4">
                    Bon pour le musée<br>
                    <form action="#" method="post"><button type="submit" style="background:transparent" value="<?php echo $prestigeMusee[0][0]; ?>">
                    <img class="img-thumbnail" src="<?php echo utf8_encode($prestigeMusee[0][5])?>" style="max-height:200px"></button></form>
                    <p><?php echo utf8_encode($prestigeMusee[0][1])?></p>
                </div>
                <div class="col-md-4">
                    Accessoire VIP<br>
                    <form action="#" method="post"><button type="submit" style="background:transparent" value="<?php echo $prestigeVIP[0][0]; ?>">
                    <img class="img-thumbnail" src="<?php echo utf8_encode($prestigeVIP[0][5])?>" style="max-height:200px"></button></form>
                    <p><?php echo utf8_encode($prestigeVIP[0][1])?></p>
                </div>
            </div>
        </div>
        
        <!--Affichage d'un carroussel qui montre les dernières arrivées-->
        <div class="container">
            <h2 class="title">Nos derniers arrivages !</h2>
            <div class="shadow-lg p-3 mb-5 bg-white">
                
                <div id="demo" class="carousel slide" data-ride="carousel">
                <!-- Indicateurs -->
                <ul class="carousel-indicators" style="color:black;">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                    <li data-target="#demo" data-slide-to="3"></li>
                    <li data-target="#demo" data-slide-to="4"></li>
                    <li data-target="#demo" data-slide-to="5"></li>
                    <li data-target="#demo" data-slide-to="6"></li>
                    <li data-target="#demo" data-slide-to="7"></li>
                    <li data-target="#demo" data-slide-to="8"></li>
                    <li data-target="#demo" data-slide-to="9"></li>
                </ul>

                <!-- Carrousel -->
                <div class="carousel-inner" style="background-color:#008080">
                  <div class="carousel-item active">
                      <table><tr><td>
                      <div class="img-fluid img-thumbnail" style="height:400px; width:350px;">
                        <img src="<?php echo utf8_encode($carroussel[1][5]); ?>" alt="Carrousel slide 1" class="d-block w-100" style="height:400px; width:400px;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                      </div>
                          </td>
                          <td width=35px> </td>
                          <td>
                            <h4 style="color:white;text-align:center;text-shadow: 1px 1px 2px black;"><?php echo utf8_encode($carroussel[1][1]); ?></h4><br><br>
                            <p style="color:white"><?php echo utf8_encode($carroussel[1][4]); ?></p>
                              <p style="color:white; font-size:0.7em"><i><?php echo utf8_encode($carroussel[1][3]) ?> €</i></p>
                              <br>
                              <p style="color:white" class="text-justify"><?php echo utf8_encode($carroussel[1][2]) ?></p>
                          </td>
                          <td width=35px> </td>
                        </tr>
                      </table>
                  </div>
                  <div class="carousel-item">
                      <table><tr><td>
                      <div class="img-fluid img-thumbnail" style="height:400px; width:350px;">
                    <img src="<?php echo utf8_encode($carroussel[2][5]); ?>" alt="Carrousel slide 1" class="d-block w-100" style="height:400px; width:400px;">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                          </td>
                          <td width=35px> </td>
                          <td>
                            <h4 style="color:white;text-align:center;text-shadow: 1px 1px 2px black;"><?php echo utf8_encode($carroussel[2][1]); ?></h4><br><br>
                            <p style="color:white"><?php echo utf8_encode($carroussel[2][4]); ?></p>
                              <p style="color:white; font-size:0.7em"><i><?php echo utf8_encode($carroussel[2][3]) ?> €</i></p>
                              <br>
                              <p style="color:white" class="text-justify"><?php echo utf8_encode($carroussel[2][2]) ?></p>
                          </td>
                          <td width=35px> </td>
                        </tr>
                      </table>
                  </div>
                  <div class="carousel-item">
                      <table><tr><td>
                      <div class="img-fluid img-thumbnail" style="height:400px; width:350px;">
                    <img src="<?php echo utf8_encode($carroussel[3][5]); ?>" alt="Carrousel slide 1" class="d-block w-100" style="height:400px; width:400px;">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                          </td>
                          <td width=35px> </td>
                          <td>
                            <h4 style="color:white;text-align:center;text-shadow: 1px 1px 2px black;"><?php echo utf8_encode($carroussel[3][1]); ?></h4><br><br>
                            <p style="color:white"><?php echo utf8_encode($carroussel[3][4]); ?></p>
                              <p style="color:white; font-size:0.7em"><i><?php echo utf8_encode($carroussel[3][3]) ?> €</i></p>
                              <br>
                              <p style="color:white" class="text-justify"><?php echo utf8_encode($carroussel[3][2]) ?></p>
                          </td>
                          <td width=35px> </td>
                        </tr>
                      </table>
                  </div>
                  <div class="carousel-item">
                      <table><tr><td>
                      <div class="img-fluid img-thumbnail" style="height:400px; width:350px;">
                    <img src="<?php echo utf8_encode($carroussel[4][5]); ?>" alt="Carrousel slide 1" class="d-block w-100" style="height:400px; width:400px;">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                          </td>
                          <td width=35px> </td>
                          <td>
                            <h4 style="color:white;text-align:center;text-shadow: 1px 1px 2px black;"><?php echo utf8_encode($carroussel[4][1]); ?></h4><br><br>
                            <p style="color:white"><?php echo utf8_encode($carroussel[4][4]); ?></p>
                              <p style="color:white; font-size:0.7em"><i><?php echo utf8_encode($carroussel[4][3]) ?> €</i></p>
                              <br>
                              <p style="color:white" class="text-justify"><?php echo utf8_encode($carroussel[4][2]) ?></p>
                          </td>
                          <td width=35px> </td>
                        </tr>
                      </table>
                  </div>
                  <div class="carousel-item">
                      <table><tr><td>
                      <div class="img-fluid img-thumbnail" style="height:400px; width:350px;">
                    <img src="<?php echo utf8_encode($carroussel[5][5]); ?>" alt="Carrousel slide 1" class="d-block w-100" style="height:400px; width:400px;">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                          </td>
                          <td width=35px> </td>
                          <td>
                            <h4 style="color:white;text-align:center;text-shadow: 1px 1px 2px black;"><?php echo utf8_encode($carroussel[5][1]); ?></h4><br><br>
                            <p style="color:white"><?php echo utf8_encode($carroussel[5][4]); ?></p>
                              <p style="color:white; font-size:0.7em"><i><?php echo utf8_encode($carroussel[5][3]) ?> €</i></p>
                              <br>
                              <p style="color:white" class="text-justify"><?php echo utf8_encode($carroussel[5][2]) ?></p>
                          </td>
                          <td width=35px> </td>
                        </tr>
                      </table>
                  </div>
                  <div class="carousel-item">
                      <table><tr><td>
                      <div class="img-fluid img-thumbnail" style="height:400px; width:350px;">
                    <img src="<?php echo utf8_encode($carroussel[6][5]); ?>" alt="Carrousel slide 1" class="d-block w-100" style="height:400px; width:400px;">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                          </td>
                          <td width=35px> </td>
                          <td>
                            <h4 style="color:white;text-align:center;text-shadow: 1px 1px 2px black;"><?php echo utf8_encode($carroussel[6][1]); ?></h4><br><br>
                            <p style="color:white"><?php echo utf8_encode($carroussel[6][4]); ?></p>
                              <p style="color:white; font-size:0.7em"><i><?php echo utf8_encode($carroussel[6][3]) ?> €</i></p>
                              <br>
                              <p style="color:white" class="text-justify"><?php echo utf8_encode($carroussel[6][2]) ?></p>
                          </td>
                          <td width=35px> </td>
                        </tr>
                      </table>
                  </div>
                  <div class="carousel-item">
                      <table><tr><td>
                      <div class="img-fluid img-thumbnail" style="height:400px; width:350px;">
                    <img src="<?php echo utf8_encode($carroussel[7][5]); ?>" alt="Carrousel slide 1" class="d-block w-100" sstyle="height:400px; width:400px;">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                          </td>
                          <td width=35px> </td>
                          <td>
                            <h4 style="color:white;text-align:center;text-shadow: 1px 1px 2px black;"><?php echo utf8_encode($carroussel[7][1]); ?></h4><br><br>
                            <p style="color:white"><?php echo utf8_encode($carroussel[7][4]); ?></p>
                              <p style="color:white; font-size:0.7em"><i><?php echo utf8_encode($carroussel[7][3]) ?> €</i></p>
                              <br>
                              <p style="color:white" class="text-justify"><?php echo utf8_encode($carroussel[7][2]) ?></p>
                          </td>
                          <td width=35px> </td>
                        </tr>
                      </table>
                  </div>
                  <div class="carousel-item">
                      <table><tr><td>
                      <div class="img-fluid img-thumbnail" style="height:400px; width:350px;">
                    <img src="<?php echo utf8_encode($carroussel[8][5]); ?>" alt="Carrousel slide 1" class="d-block w-100" style="height:400px; width:400px;">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                          </td>
                          <td width=35px> </td>
                          <td>
                            <h4 style="color:white;text-align:center;text-shadow: 1px 1px 2px black;"><?php echo utf8_encode($carroussel[8][1]); ?></h4><br><br>
                            <p style="color:white"><?php echo utf8_encode($carroussel[8][4]); ?></p>
                              <p style="color:white; font-size:0.7em"><i><?php echo utf8_encode($carroussel[8][3]) ?> €</i></p>
                              <br>
                              <p style="color:white" class="text-justify"><?php echo utf8_encode($carroussel[8][2]) ?></p>
                          </td>
                          <td width=35px> </td>
                        </tr>
                      </table>
                  </div>
                  <div class="carousel-item">
                      <table><tr><td>
                      <div class="img-fluid img-thumbnail" style="height:400px; width:350px;">
                    <img src="<?php echo utf8_encode($carroussel[9][5]); ?>" alt="Carrousel slide 1" class="d-block w-100" style="height:400px; width:400px;">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                          </td>
                          <td width=35px> </td>
                          <td>
                            <h4 style="color:white;text-align:center;text-shadow: 1px 1px 2px black;"><?php echo utf8_encode($carroussel[9][1]); ?></h4><br><br>
                            <p style="color:white"><?php echo utf8_encode($carroussel[9][4]); ?></p>
                              <p style="color:white; font-size:0.7em"><i><?php echo utf8_encode($carroussel[9][3]) ?> €</i></p>
                              <br>
                              <p style="color:white" class="text-justify"><?php echo utf8_encode($carroussel[9][2]) ?></p>
                          </td>
                          <td width=35px> </td>
                        </tr>
                      </table>
                  </div>
                  <div class="carousel-item">
                      <table><tr><td>
                      <div class="img-fluid img-thumbnail" style="height:400px; width:350px;">
                    <img src="<?php echo utf8_encode($carroussel[10][5]); ?>" alt="Carrousel slide 1" class="d-block w-100" style="height:400px; width:400px;">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                </td>
                          <td width=35px> </td>
                          <td>
                            <h4 style="color:white;text-align:center;text-shadow: 1px 1px 2px black;"><?php echo utf8_encode($carroussel[10][1]); ?></h4><br><br>
                            <p style="color:white"><?php echo utf8_encode($carroussel[10][4]); ?></p>
                              <p style="color:white; font-size:0.7em"><i><?php echo utf8_encode($carroussel[10][3]) ?> €</i></p>
                              <br>
                              <p style="color:white" class="text-justify"><?php echo utf8_encode($carroussel[10][2]) ?></p>
                          </td>
                          <td width=35px> </td>
                        </tr>
                      </table>
                  </div>
                    </div>

                <!-- Contrôles -->
                <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true" style="color:%23fff;"></span>
                  <span class="sr-only">Précédent</span>
                </a>
                <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Suivant</span>
                </a>
              </div>
            </div>
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
                    <td><a href="#" style="color:white">Nous envoyer un message</a></td>
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