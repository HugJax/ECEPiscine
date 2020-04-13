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
              background-image: url("images/fond.jpg");
              height: 20%; 
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
               background-color:darkslateblue;
               color: white;
               text-align: center;
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
                    <li><a class="underlineHover" href="#">Catégories</a></li>
                    <li><a class="underlineHover" href="#">Vendre</a></li>
                    <li style="float: right; margin-right: 30px"><a class="underlineHover" href="logout.php?logout=true"><span><?php 
                            if(isset($_SESSION['login'])){
                            echo 'Se déconnecter';}
                            else {echo "Créer un compte";}
                        ?></span></a></li>
                    <li style="float: right"><a class="underlineHover" href="#"><?php 
                            if(isset($_SESSION['login'])){
                            echo 'Panier';}
                        ?></a></li>
                    <li style="float: right"><a class="underlineHover" href="#">
                        <?php 
                            if(isset($_SESSION['login'])){
                            echo $_SESSION['login'];}
                            else {echo "Se connecter";}
                        ?>
                        </a></li>
                </ul>
            </div>
        </div>
        
        
        
        
        
        
        
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