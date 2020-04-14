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
            .nav-bar.fixed{
              position:fixed;
              top:0;
                right: 0;
                left: 0;
              z-index: auto;
            }
        </style>
        <link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript" src="navbar.js"></script>
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
                            <div style='color:white;font-family: comic sans ms;'>Catégories</div>
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
                            echo "<li style='float: right; margin-right: 30px'><a class='underlineHover' href='logout.php?logout=true' style='text-decoration:none;'><div style='color:white;font-family: comic sans ms;'>Déconnexion</div></a></li><li style='float: right; margin-right: 30px'><a class='underlineHover' href='#' style='text-decoration:none;'><div style='color:white;font-family: comic sans ms;'>Panier</div></a></li><li style='float: right; margin-right: 30px'><a class='underlineHover' href='#' style='text-decoration:none;'><div style='color:white;font-family: comic sans ms';'>".$_SESSION['Nom']." ".$_SESSION['Prenom']."</div></a></li>";
                        }
                    else
                    {
                        echo "<li style='float: right; margin-right: 30px'><a class='underlineHover' href='newuser.html' style='text-decoration:none;'><div style='color:white;font-family: comic sans ms;'>Nouveau compte</div></a></li><li style='float: right; margin-right: 30px'><a class='underlineHover' href='logIn.html' style='text-decoration:none;'><div style='color:white;font-family: comic sans ms;'>Se connecter</div></a></li>";
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
        
        
        
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

          
       <form action="ContreOffre.php" method="post"> 
            
           <h1>Faites votre choix : </h1>
            
           <table>
            <tr>
                    <td>
                        <div>
                            <input type="radio" id="" name="oui" value="" checked>
                            <label for="Oui">Oui</label>
                        </div>
         
                        <div>
                            <input type="radio" id="" name="non" value="">
                            <label for="Non">Non</label>
                        </div>
                        
                        <div>
                            <input type="text" id="" name="contreProposition" value="">
                            <label for=""></label>
                            
                            <label for="nouveauPrix">Proposez un prix au client </label> : <input type="text" name="nouveauPrix" id="nouveauPrix" /> euros <br />
                            <input type="submit" value="Envoyer" />
                        </div>
  
                    </td>
                 
                </tr>
                
                <tr>
                    <td><input type="submit" name="answer"></td>

                </tr>
            </table>
        
        
        <!------------------------------------------------->
        <!------------------------------------------------->
        <!------------------------------------------------->
        <!------Fin  du chat de négociation--------------->
        
        

        
        
        
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