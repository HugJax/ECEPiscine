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
              height: 13%; 
              padding: 0;
              margin: 0;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
            }
            .footer {
               position: fixed;
               left: 0;
               bottom: 0;
               width: 100%;
               font-size: 0.8em;
               background-color:#52527a;
               color: white;
               text-align: center;
            }
            .nav-bar{
                background: #29a3a3;
                color: aliceblue;
                height:40px;
                text-align: center;
                margin-bottom:15px;
                margin-top: 0;
                padding: 0;
            }
        </style>
        <link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript" src="navbar.js"></script>
        <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
        <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.j s"> </script>
        <script><?php
            session_start();
        ?> </script>
    </head>
    
    <body>
        <div class="bg"></div>
        <div class="header-home">
            <div class="nav-bar">
                <ul>
                    <li>
                        <a class="underlineHover" href="Home.php">
                            <img src="images/boutonAccueil.png">
                        </a>
                    </li>
                    <li>
                        <a class="underlineHover" href="#">
                            <img src="images/boutonCategorie.png">
                        </a>
                    </li>
                    <li>
                        <a class="underlineHover" href="#">
                            <img src="images/boutonVendre.png">
                        </a>
                    </li>
                    <?php
                        if(isset($_SESSION['ID']))
                        {
                            echo "<li style='float: right; margin-right: 30px'><a class='underlineHover' href='logout.php?logout=true'><img src='images/boutonDeconnexion.png'></a></li><li style='float: right; margin-right: 30px'><a class='underlineHover' href='#'><img src='images/boutonPanier.png'></a></li><li style='float: right; margin-right: 30px'><a class='underlineHover' href='#'><div style='color:white;font-family: comic sans ms';'>".$_SESSION['Nom']." ".$_SESSION['Prenom']."</div></a></li>";
                        }
                    else
                    {
                        echo "<li style='float: right; margin-right: 30px'><a class='underlineHover' href='newuser.html'><img src='images/boutonNouveauCompte.png'></a></li><li style='float: right; margin-right: 30px'><a class='underlineHover' href='logIn.html'><img src='images/boutonSeConnecter.png'></a></li>";
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
        
        
        <!--Récupération des données-->
        <p>
            <?php
                echo $_SESSION['ID']."<br>";
                echo $_SESSION['Nom']."<br>";
                echo $_SESSION['Prenom']."<br>";
                echo $_SESSION['Email']."<br>";
                echo $_SESSION['MDP']."<br>";
                echo $_SESSION['Photo']."<br>";
                echo $_SESSION['ImageFond']."<br>";
                echo "+33 ".$_SESSION['Telephone']."<br>";
            ?>
        </p>
        
        
        
        <div class="footer">
            <table class="footer">
                <tr>
                    <td>Catégories</td>
                    <td>Nous contacter</td>
                </tr>
                <tr>
                    <td>Ferraille ou trésor</td>
                    <td>Tèl:00000000</td>
                </tr>
                <tr>
                    <td>Bon pour le musée</td>
                    <td>Mail:hdfgdhfghdgfh</td>
                </tr>
                <tr>
                    <td>Accessoires VIP</td>
                </tr>
            </table>
        </div>
    </body>
</html>