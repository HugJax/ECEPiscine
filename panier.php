<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'ebayece')
       or die('could not connect to database');
$db_found = mysqli_select_db($db, 'ebayece');

$requeteM = "SELECT count(*) FROM produit WHERE Categorie='Bon pour le musee' ";
$exec_requete = mysqli_query($db, $requeteM);
$reponse = mysqli_fetch_array($exec_requete);
$countM  = $reponse['count(*)'];

$requeteF = "SELECT count(*) FROM produit WHERE Categorie='Ferraille ou tresor' ";
$exec_requete = mysqli_query($db, $requeteF);
$reponse = mysqli_fetch_array($exec_requete);
$countF  = $reponse['count(*)'];

$requeteV = "SELECT count(*) FROM produit WHERE Categorie='Accessoire VIP' ";
$exec_requete = mysqli_query($db, $requeteV);
$reponse = mysqli_fetch_array($exec_requete);
$countV  = $reponse['count(*)'];

$prestigeFerraille = array();
$prestigeMusee = array();
$prestigeVIP = array();
$i=0;
$j=0;
$k=0;
$w=0;
if($db_found) {
    $sql3="SELECT IDproduit,Nom,Description,Prix,Categorie,Qualite,Defaut,OffreSpeciale,IDutilisateur FROM produit WHERE Categorie='Bon pour le musee' ORDER BY DateMiseEnLigne DESC;";
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
if($db_found) {
    $sql2="SELECT IDproduit,Nom,Description,Prix,Categorie,Qualite,Defaut,OffreSpeciale,IDutilisateur FROM produit WHERE Categorie='Ferraille ou tresor' ORDER BY DateMiseEnLigne DESC;";
    $result2 = mysqli_query($db, $sql2);
    while ($data = mysqli_fetch_assoc($result2)) {
        $sqlbis = "SELECT Lien FROM image WHERE IDproduit='".$data['IDproduit']."';";
        $exec_requete = mysqli_query($db,$sqlbis);
        $reponsebis      = mysqli_fetch_assoc($exec_requete);

        $sqlter = "SELECT IDutilisateur,Nom,Prenom,Email,Telephone FROM utilisateur WHERE IDutilisateur='".$data['IDutilisateur']."';";
        $exec_requete = mysqli_query($db,$sqlter);
        $reponseter      = mysqli_fetch_assoc($exec_requete);
        
        
        $prestigeFerraille[$k] = array($data['IDproduit'], $data['Nom'], $data['Description'], $data['Prix'], $data['Categorie'],$data['Qualite'],$data['Defaut'], $reponsebis['Lien'],$reponseter['Nom'],$reponseter['Prenom'],$reponseter['Email'],$reponseter['Telephone']);
        $k++;
    }
}
if($db_found) {
    $sql4="SELECT IDproduit,Nom,Description,Prix,Categorie,Qualite,Defaut,OffreSpeciale,IDutilisateur FROM produit WHERE Categorie='Accessoire VIP' ORDER BY DateMiseEnLigne DESC;";
    $result4 = mysqli_query($db, $sql4);
    while ($data = mysqli_fetch_assoc($result4)) {
        $sqlbis = "SELECT Lien FROM image WHERE IDproduit='".$data['IDproduit']."';";
        $exec_requete = mysqli_query($db,$sqlbis);
        $reponsebis      = mysqli_fetch_assoc($exec_requete);

        $sqlter = "SELECT IDutilisateur,Nom,Prenom,Email,Telephone FROM utilisateur WHERE IDutilisateur='".$data['IDutilisateur']."';";
        $exec_requete = mysqli_query($db,$sqlter);
        $reponseter      = mysqli_fetch_assoc($exec_requete);
        
        
        $prestigeVIP[$w] = array($data['IDproduit'], $data['Nom'], $data['Description'], $data['Prix'], $data['Categorie'],$data['Qualite'],$data['Defaut'], $reponsebis['Lien'],$reponseter['Nom'],$reponseter['Prenom'],$reponseter['Email'],$reponseter['Telephone']);
        $w++;
    }
}

    $Idproduit="";
    $Idutilisateur="";
    $errors= array();
    $copie= NULL;

    if(isset($_SESSION['ID']))
    {
    $Idutilisateur=$_SESSION["ID"];
    }
    
    for($i=0;$i<$countF;$i++)
    {
        if(isset($_POST["".$prestigeFerraille[$i][0].""]))
        {
            $Idproduit=mysqli_real_escape_string($db, $_POST["".$prestigeFerraille[$i][0].""]);
            if (empty($Idproduit)) { array_push($errors, "aucun produit séléctioné"); }
            if (empty($Idutilisateur)) { array_push($errors, "Vous n'etes pas connécté"); }

        if (count($errors) == 0) {
        
            $sql="SELECT idpanier FROM panier WHERE IDutilisateur='".$Idutilisateur."' AND IDproduit='".$Idproduit."';";
            $result2 = mysqli_query($db, $sql);
            $data = mysqli_fetch_array($result2);
            if($data < 1)
            {
            $query = "INSERT INTO panier (IDutilisateur,IDproduit) 
                  VALUES('".$Idutilisateur."','".$Idproduit."');";
            }
        
            mysqli_query($db, $query);
       }
       else
      {
        echo $Idproduit;
      }

       mysqli_close($db); // fermer la connexion
       header("location:CategorieF.php");
        }
    }

    for($i=0;$i<$countM;$i++)
    {
        if(isset($_POST["".$prestigeMusee[$i][0].""]))
        {
            $Idproduit=mysqli_real_escape_string($db, $_POST["".$prestigeMusee[$i][0].""]);
            if (empty($Idproduit)) { array_push($errors, "aucun produit séléctioné"); }
            if (empty($Idutilisateur)) { array_push($errors, "Vous n'etes pas connécté"); }

        if (count($errors) == 0) {
            $sql="SELECT idpanier FROM panier WHERE IDutilisateur='".$Idutilisateur."' AND IDproduit='".$Idproduit."';";
            $result2 = mysqli_query($db, $sql);
            $data = mysqli_fetch_array($result2);
            if($data < 1)
            {
        $query = "INSERT INTO panier (IDutilisateur,IDproduit) 
                  VALUES('".$Idutilisateur."','".$Idproduit."');";
            }
        mysqli_query($db, $query);
       }
       else
      {
        echo $Idproduit;
      }

       mysqli_close($db); // fermer la connexion
       header("location:CategorieM.php");
        }
    }

    for($i=0;$i<$countV;$i++)
    {
        if(isset($_POST["".$prestigeVIP[$i][0].""]))
        {
            $Idproduit=mysqli_real_escape_string($db, $_POST["".$prestigeVIP[$i][0].""]);
            if (empty($Idproduit)) { array_push($errors, "aucun produit séléctioné"); }
            if (empty($Idutilisateur)) { array_push($errors, "Vous n'etes pas connécté"); }

        if (count($errors) == 0) {
            $sql="SELECT idpanier FROM panier WHERE IDutilisateur='".$Idutilisateur."' AND IDproduit='".$Idproduit."';";
            $result2 = mysqli_query($db, $sql);
            $data = mysqli_fetch_array($result2);
            if($data < 1)
            {
        $query = "INSERT INTO panier (IDutilisateur,IDproduit) 
                  VALUES('".$Idutilisateur."','".$Idproduit."');";
            }
        mysqli_query($db, $query);
       }
       else
      {
        echo $Idproduit;
      }

       mysqli_close($db); // fermer la connexion
       header("location:CategorieV.php");
        }
    }

?>