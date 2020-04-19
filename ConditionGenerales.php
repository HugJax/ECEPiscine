<?php
    session_start();
?>

<html>
    <head>
        <link rel="icon" href="images/favicon.ico">
        <title>eBay ECE :: Conditions Générales de ventes</title>
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

        <!--ZONE POUR CODER-->
        <p class="text-justufy" style="padding: 50px"> Conditions inspirées de celle de eBay<br><br>
            1. Introduction
Bienvenue sur eBayECE ! Les présentes Conditions, l'Avis sur les données personnelles, les Conditions de licence utilisateur final supplémentaires pour appareils mobiles et tous les règlements publiés sur nos sites régissent les conditions dans lesquelles eBay vous donne accès aux sites, services, applications et outils associés (ci-après désignés par les «Services »). Lire une présentation de nos Règlements. Tous nos règlements ainsi que notre Avis sur les données personnelles sont intégrés dans les présentes Conditions. En utilisant nos Services, vous acceptez l’ensemble des Conditions.<br>
2. Objet
eBayECE est une place de marché qui permet à ses utilisateurs d'offrir, de vendre ou d'acheter pratiquement tout ce qu'il ou elle souhaite, dans une diversité de formats tarifaires et de lieux d'échange, tels que, entre autres, les boutiques, les mises en vente à prix fixe ("Achat immédiat") ou au format "Enchères" provenant de lieux différents.

eBay ne détient aucun objet mis en vente ou vendu sur son site, et n’intervient en aucune façon dans la transaction entre les vendeurs et les acheteurs. Le contrat de vente est conclu exclusivement et directement entre le vendeur et l’acheteur. eBayECE n’est pas une société de vente aux enchères publiques.

Les vendeurs doivent disposer d'un moyen de paiement valide enregistré auprès d'eBay, et ce de manière permanente. Lors de la configuration ou modification de votre méthode de paiement pour le règlement des frais de Services eBay, vous avez accepté en exécution du contrat de facturation d’être prélevé automatiquement de tout frais ici dû par eBayECE en application des présentes Conditions. Cela comprend notamment les montants dus pour les frais eBay et les bordereaux d'affranchissement. eBay vous informera de ces frais sur vos factures, le cas échéant. Si les sommes dont vous êtes redevable à eBay ne peuvent recouvrées par la méthode de paiement renseignée pour quelque raison que ce soit, vous restez tenu de régler à eBay tous les montants impayés. eBay se réserve le droit de demander tant le remboursement de ces sommes par tout autre moyen que ceux de tous frais supplémentaires engagés par eBay pour obtenir ce remboursement, si la loi l’autorise. Vous pouvez modifier votre méthode de paiement dans Mon eBay à tout moment.<br>

3. Utilisation d'eBay
Vous vous engagez à utiliser nos Services conformément aux présentes Conditions d'utilisation. Lorsque vous utilisez ces Services, vous vous engagez à ne pas :

télécharger vers le serveur ("upload"), publier du contenu ou mettre en vente des objets dans des catégories ou domaines inappropriés sur nos sites ;
enfreindre des lois, tout droit de tiers ou nos règlements ;
utiliser nos Services si vous n'êtes pas juridiquement capable de souscrire des contrats, (par exemple si vous êtes âgé de moins de 18 ans) ou si vous avez été suspendu de façon temporaire ou pour une durée indéterminée d'utiliser nos Services ;
omettre de payer les objets que vous avez achetés, sauf dans les cas autorisés par la loi ou encore si le vendeur a matériellement changé la description de l'objet après votre enchère, si une erreur typographique évidente a été commise ou enfin si vous ne pouvez pas contacter le vendeur (voir notre règlement sur les objets non payés) ;
omettre de livrer les objets qui vous ont été achetés, sauf si les conditions matérielles de livraison ne sont pas remplies ;
manipuler le prix d'un objet ou vous immiscer dans les annonces d'autres utilisateurs ;
publier du contenu faux, erroné, trompeur ou diffamatoire (y compris des informations personnelles) ;
effectuer toute action susceptible de nuire aux systèmes d'évaluation (voir notre règlement sur les évaluations) ;
transférer votre compte eBayECE (y compris les évaluations) et votre pseudo à un tiers sans notre consentement ;
distribuer ou publier des publicités non sollicitées (spam), des communications électroniques de masse, des chaînes d'e-mails ou des systèmes en pyramide ;
utiliser les coordonnées des autres utilisateurs pour toute utilisation autre qu'en lien avec une transaction spécifique sur eBayECE (ce qui inclut l'utilisation de ces coordonnées pour envoyer des documents promotionnels directement aux utilisateurs d'eBay, à moins que l'utilisateur ait donné son consentement exprès pour recevoir ces documents);
mettre à disposition des virus ou d'autres technologies susceptibles de nuire à eBay ou aux intérêts ou à la propriété des utilisateurs d'eBay ;
utiliser des robots, des araignées (spiders), scraper ou encore utiliser tout autre procédé automatique pour accéder à nos Services pour quelque raison que ce soit ;
contourner nos protocoles d'exclusion de robots, perturber ou tenter de perturber le fonctionnement de nos Services, ou enfin imposer une charge déraisonnable ou disproportionnée sur nos infrastructures ;
exporter ou réexporter une application ou un outil eBayECE, sauf dans le cas où cela est conforme aux lois applicables sur le contrôle des exportations, ainsi qu'aux règlements et restrictions en vigueur sur eBayECE ;
copier, modifier ou distribuer du contenu ou des droits à partir de nos Services ou les droits d'auteur et marques commerciales d'eBayECE ;
copier, reproduire, effectuer de l'ingénierie inverse, modifier, créer des œuvres dérivées, distribuer ou divulguer au public tout contenu (excepté pour votre propre information) provenant de nos Services sans le consentement exprès préalable et écrit d'eBay ou, le cas échéant, de celui des tiers concernés ;
commercialiser une application eBayECE, un logiciel ou des informations associées à cette application ;
collecter de quelque façon que ce soit des informations sur les utilisateurs, y compris les adresses e-mail, sans leur consentement.
Si vous êtes inscrit sur eBay en tant qu’entité professionnelle, vous reconnaissez avoir l’autorité et le pouvoir juridique d’engager cette entité. Si vous exercez votre activité en tant que professionnel sur eBay, vous devez vous conformer aux lois applicables en matière de commerce électronique sur le site sur lequel vous vendez des objets (consultez notre Espace vendeurs pour en savoir plus).

Pour des raisons de sécurité, eBay pourra annuler les comptes non confirmés ou inactifs depuis plus de 6 mois ou bien modifier ou cesser les Services eBayECE.<br>

4. Droit de rétractation
Si vous utilisez nos Services en tant que consommateur, vous pouvez exercer votre droit de rétractation dans les 14 jours suivant l'acceptation de ces Conditions d'utilisation. Toutefois, vous reconnaissez que la fourniture de nos Services commencera dès votre acceptation des Conditions d'utilisation. Si vous exercez votre droit de rétractation, vous reconnaissez et acceptez qu'eBay conserve les frais facturés ou reçoive les frais courus à la suite de votre utilisation des Services. Vous pouvez nous informer de votre intention d'exercer votre droit de rétractation par courrier à l’adresse de votre entité eBayECE cocontractante indiquée ci-avant (accéder au formulaire de rétractation).<br>

5. Violation des Conditions d'utilisation d'eBayECE
En cas de constatation par eBayECE de la violation par un utilisateur des dispositions légales en vigueur, des droits des tiers (dont notamment les droits de propriété intellectuelle tels que les marques et le droit d'auteur), des présentes Conditions et/ou des règlements eBayECE, après notification infructueuse à l'utilisateur de se conformer aux présentes Conditions, eBayECE se réserve le droit de prendre le cas échéant une ou plusieurs des sanctions suivantes :

retarder la publication du contenu hébergé ;
retirer les offres publiées sur nos sites, services, applications ou outils qui ne seraient pas conformes aux dispositions susmentionnées ;
retirer tout contenu publié contrevenant aux dispositions susmentionnées ;
restreindre/limiter, voire interdire l'accès aux Services d'eBay et/ou leur utilisation (notamment limiter le nombre d’objets que vous pouvez mettre en vente sur nos sites, annuler des enchères, déclasser ou restreindre la visibilité des annonceset retirer des annonces) ;
retirer à l’utilisateur le statut de Vendeur Top Fiabilité ;
suspendre l'accès de l'utilisateur aux sites, services, applications ou outils d'eBayECE et à ses comptes utilisateur ;
diminuer le montant des réductions dont vous bénéficiez ;
interdire définitivement à l'utilisateur d'accéder aux Services d'eBayECE et à ses comptes utilisateur et conserver les sommes disponibles sur le compte eBayECE de l’utilisateur qui seraient issues du remboursement de frais eBayECE en raison de l’annulation de toute(s) transaction(s) liée(s) à l’une des violations susmentionnées.
Les vendeurs doivent répondre aux normes de performance minimum d'eBayECE. Nous nous réservons le droit de limiter, restreindre, suspendre ou de faire passer au statut inférieur le compte des vendeurs ne répondant pas à ces normes.<br>

6. Frais
L'inscription et l'action d'enchérir sur des objets proposés sur nos Services sont gratuites. L'utilisation d'autres services tels que la mise en vent d'objets est payante. Les frais facturés pour l’utilisation de nos Services sont détaillés dans notre règlement sur les frais de vente. eBay peut être amenée à modifier les frais en publiant ces changements sur son site ou dans la section Messages de Mon eBayECE, 14 jours à l'avance. Vous pouvez clôturer votre compte sans aucune pénalité dans les 14 jours suivant la notification desdits changements.

Sauf mention contraire, tous les tarifs sont indiqués en euros (EUR). Il est de votre responsabilité de payer tous les frais et taxes applicables résultant de l'utilisation de nos Services dans les délais et par l'intermédiaire d'un mode de paiement valable. En cas de problème lié à votre mode de paiement ou si votre compte présente un arriéré, nous tenterons de percevoir les montants dus par d'autres moyens de recouvrement, nous débiterons les autres modes de paiement figurant dans votre compte, nous pourrons faire appel à une agence de recouvrement ou à un conseil juridique habilité à cette fin. Des intérêts de retard au taux légal s'appliqueront le cas échéant. Vous acceptez que nous vous envoyions des factures au format électronique par e-mail. Enfin, nous pouvons aussi suspendre ou limiter votre capacité à utiliser nos Services jusqu'à ce que le paiement ait été intégralement reçu.

Si des sommes sont disponibles sur votre compte eBayECE depuis plus de 5 ans, vous acceptez qu’eBay puisse conserver ces sommes après vous en avoir informé et laisser la possibilité de vous y opposer.<br>

7. Conditions de mise en vente
Lorsque vous mettez en vente un objet, vous acceptez de vous conformer aux règles de mise en vente ainsi qu’au règlement sur les pratiques de vente. Vous acceptez également que :

vous êtes responsable de l’exactitude du contenu et de la légalité des objets mis en ventes conformément au règlement sur les objets interdits ou soumis à restrictions ;
votre annonce ne soit pas immédiatement disponible dans les résultats de recherche par mot-clé ou par catégorie, les annonces s’affichant généralement dans les résultats de recherche dans un délai de 24 heures. De plus, pour cette raison, eBay ne peut pas garantir la durée exacte des annonces ;
un contenu qui violerait toute règle d'eBay, quelle qu'elle soit, soit supprimé, modifié ou masqué à la seule discrétion d'eBay ;
il peut arriver que nous révisions des informations produit associées aux annonces en ajoutant, enlevant, ou en corrigeant des informations ;
votre annonce apparaîtra dans les résultats du moteur de recherche en fonction de plusieurs critères tels que le format, le titre, le nombre des enchères, la date de fin, le prix, les frais de livraison et les évaluations détaillées du vendeur. Comment trouver un objet que vous avez mis en vente ;
le règlement sur les annonces identiques puisse affecter la visibilité de votre annonce dans les résultats de recherche ;
les méta tags et les liens URL qui se trouvent dans une annonce soient supprimés ou modifiés de sorte qu'ils n'affectent pas les résultats de moteurs de recherche tiers ;
nous puissions vous fournir des recommandations facultatives à considérer lors de la création de vos annonces. De telles recommandations pourront être basées sur l'historique des ventes globales et de performance de ventes similaires réussies et en cours ; les résultats varieront pour les annonces individuelles. Pour mener à bien ces recommandations, vous acceptez que nous puissions communiquer l'historique des ventes et de performance de vos annonces à d'autres vendeurs ;
certaines options de mise en vente ne seront visibles que sur certains services d'eBay.
En conséquence, pour permettre une expérience utilisateur positive, une annonce peut ne pas apparaître dans certains résultats de recherche, ce quel que soit l'ordre de tri choisi par l'acheteur.

8. Conditions d'achat
Lorsque vous achetez un objet, vous acceptez de vous conformer au règlement pour les acheteurs et de :

lire l’annonce dans son intégralité avant de faire une offre ou d’acheter un objet ;
conclure un contrat juridiquement contraignant d’acheter un objet lorsque vous vous engagez à acheter ledit objet auprès du vendeur ou lorsque vous êtes le meilleur enchérisseur (ou si votre enchère est le cas échéant acceptée).
9. Acheter et vendre à l'international
Les vendeurs et les acheteurs doivent se conformer à toutes les lois et réglementations applicables à toute vente, tout achat, ou toute livraison d'objets vendus à l’international.

Vous pouvez mettre en vente des objets directement sur un ou plusieurs sites internationaux d’eBay. En sélectionnant la livraison internationale, vous nous autorisez à afficher vos annonces sur tout site eBay autre que celui sur lequel vous vous êtes inscrit et vous reconnaissez que la visibilité de vos annonces sur ces sites n’est pas ici garantie. Vous pouvez cesser d’afficher vos annonces sur les sites internationaux en excluant explicitement lesdites destinations de livraison à l’international dans vos annonces. Les vendeurs reconnaissent qu'eBay peut ne pas afficher toutes les annonces des vendeurs internationaux, ce quel que soit l'ordre de tri choisi par l'acheteur. Lorsque vous vendez vos objets à l’international, vous reconnaissez et acceptez être soumis aux règlements et conditions des autres sites et vous devez accepter l’Accord de vente à l’international d'eBay.

Vous nous autorisez à utiliser des outils de traduction automatique pour traduire votre contenu eBay et vos communications entre membres, en tout ou partie, dans les langues nationales, lorsque de telles solutions de traduction sont disponibles. Nous pouvons mettre à votre disposition des outils vous permettant de traduire du contenu à votre demande. L'exactitude ou la disponibilité de toute traduction n'est pas garantie.

10. Contenu
Lorsque vous nous fournissez du contenu, y compris tout contenu que vous mettez en ligne par nos Services, ce afin de nous permettre de fournir nos Services, vous acceptez de nous concéder à titre non exclusif, gratuit, pour toutes les langues, pour le monde entier et pour la durée légale des droits (y compris les éventuelles prolongations qui pourraient intervenir), l'ensemble des droits à l'image et de propriété intellectuelle afférant audit contenu et aux éléments entrant dans sa composition (notamment textes, images, photographies, logos, illustrations, marques, modèles, titres, données), y compris toute base de données et tout contenu pouvant être qualifié d'œuvre dérivée (ci-après le « Contenu ») intégralement ou par extrait, au fur et à mesure de leur insertion sur les sites.

Ces droits comprennent le droit de reproduire, représenter, diffuser, adapter, modifier, traduire, sous-licencier et communiquer au public, utiliser dans une base de données, pour tout ou partie du Contenu par tous les procédés, sur tous les formats et supports (numérique, imprimé…) connus ou inconnus à ce jour, y compris pour tous les sites et services du groupe eBay.

eBay peut faire bénéficier à des tiers tout ou partie des droits accordés dans le cadre de la présente licence.

Vous nous garantissez que le Contenu est conforme à la législation applicable, que vous êtes titulaire des droits de propriété intellectuelle sur le Contenu, qu'il ne porte pas atteinte aux droits des tiers, et qu'il ne fait l'objet d'aucune action en contrefaçon ou autre. Vous nous garantissez contre toutes les conséquences financières des éventuelles actions, réclamations, revendications, ou oppositions de la part de toute personne invoquant un droit de propriété intellectuelle sur le Contenu, un acte de concurrence déloyale et/ou parasitaire, et/ou une infraction à la loi sur la presse.

Nous pouvons vous proposer des informations produit provenant de tiers (y compris les utilisateurs eBay). Vous pouvez utiliser ce type de contenu uniquement dans le cadre de vos annonces eBay pendant la durée de mise en ligne de votre annonce sur les sites eBay. eBay peut, à sa seule discrétion, modifier ou mettre fin à cette autorisation d'utilisation à tout moment.

Nous nous efforçons de fournir des informations fiables, mais ne pouvons pas garantir que le contenu proposé par nos Services soit toujours disponible, exact ou encore mis à jour. Vous acceptez que :

(i) eBay n’est pas responsable d’examiner vos annonces, ni de garantir les annonces ou contenu fournis par des tiers via les Services,
(ii) eBay ou tout fournisseur d’informations sur des produits ne puisse être tenu responsable en cas d'inexactitude de ces informations.
En tant que vendeur, vous consentez être tenu de vérifier que les informations produit associées à vos annonces soient exactes. Les informations produit peuvent inclure du contenu protégé par des droits d'auteur, par le droit des marques ou d'autres contenus faisant l'objet d'un droit de propriété intellectuelle. Vous vous engagez à ne retirer aucun copyright, « trademark ™ » ou tout autre signe portant sur les informations produit. Vous vous engagez à ne pas utiliser le contenu du catalogue d'une manière qui porterait atteinte aux droits de propriété d'un tiers, ni pour créer des œuvres dérivées utilisant ces données ou informations quelles qu’elles soient (autres que pour la seule fin d’inclure ces informations dans vos annonces).

11. Restriction d'accès aux fonds
Pour se protéger contre les risques de responsabilité, eBay a parfois recommandé, et pourra continuer à le faire, que PayPal restreigne l'accès aux fonds présents sur le compte PayPal d'un vendeur, sur la base de certains critères dont, notamment, l'historique des ventes, la performance du vendeur, les retours, les risques inhérents à la catégorie de l'annonce, le montant de la transaction ou le dépôt d'une réclamation. Ceci pourra aboutir à ce que PayPal décide de restreindre l'accès aux fonds disponibles sur votre compte PayPal, conformément aux règles et accords de PayPal.

12. Clause additionnelle
Retours

Les vendeurs peuvent créer des règles pour automatiser les retours et les remboursements dans certaines circonstances. Pour tous les nouveaux vendeurs, eBay peut définir une règle par défaut qui automatise la procédure de retour pour tout ou partie de leurs annonces pour lesquelles les retours sont acceptés. Les vendeurs peuvent supprimer ou personnaliser leurs préférences de retour dans les paramètres de leur compte dans Mon eBay. Vous acceptez ici vous conformer à la procédure de retour eBay.

Lorsqu’un objet est retourné ou si une transaction est annulée (voir notre Règlement en matière d’annulation de transactions), afin de rembourser l'acheteur, vous acceptez qu’eBay puisse demander à PayPal d’annuler le paiement de l’acheteur (dans la même devise ou dans une devise différente) de votre compte PayPal.

13. Correction des erreurs de paiement aux acheteurs et aux vendeurs
Nous nous réservons le droit de corriger toute erreur de traitement que nous pourrions identifier. Nous corrigerons toute erreur de traitement en débitant ou créditant le moyen de paiement utilisé pour le remboursement effectué au titre de la Garantie client eBay, conformément à l'autorisation que vous nous avez accordée au titre de la section "La Garantie client eBay", ci-dessus.

14. Responsabilité
Nous nous efforçons de maintenir la sécurité sur eBay et pour ses Services ainsi que son bon fonctionnement, mais nous ne pouvons pas garantir un accès continu et sécurisé à nos Services, dans la mesure où leur bon fonctionnement peut être affecté par de nombreux facteurs que nous ne contrôlons pas. La mise à jour d'enchères et d'autres notifications dans les applications eBay ne s'effectuent pas en temps réel. En effet, ces fonctionnalités peuvent subir des retards qui échappent au contrôle d'eBay.

eBay (y compris sa société mère, ses filiales, affiliés, dirigeants, administrateurs, mandataires et employés) ne saurait être tenue responsable à titre contractuel, délictuel (même en cas de négligence) ou autre, de toute perte commerciale que vous pourriez subir (pertes de données, de bénéfices, de chiffre d'affaires, d'activité, d'opportunités, de valeur de la clientèle, de réputation ou interruption d'activité) ou de toute perte n'étant pas raisonnablement prévisible et découlant, directement ou indirectement :

de votre utilisation de nos Services, ou de votre incapacité à les utiliser ;
de conseils sur les politiques de prix, l’affranchissement ou tout autre conseil fourni par eBay ;
des éventuels retards ou perturbations de nos Services ;
de virus ou de tout autre logiciel malveillant obtenu en accédant à nos Services ou en rapport avec ces derniers ;
de dysfonctionnements, bugs, erreurs ou inexactitudes quelconques présents sur nos sites ;
de tout dommage subi par vos matériels informatiques résultant de votre utilisation des Services eBay ;
du contenu, des actions ou de l'absence d'action de tierces parties (notamment en ce qui concerne les objets mis en vente à l'aide de nos Services), ou de la destruction d'objets suspectés de constituer des contrefaçons ;
de la suspension ou de toute autre action entreprise vis-à-vis de votre compte ou d'une violation décrite dans la section Violation des Conditions d'utilisation d'eBay ;
de la durée pendant laquelle vos annonces s'affichent ni de la forme sous laquelle elles apparaissent dans les résultats de recherche décrite dans la section Conditions de mise en vente ; ou
de la nécessité de modifier vos pratiques, votre contenu ou votre comportement, ou de la perte ou de l'incapacité à exercer vos activités à la suite des modifications apportées aux présentes Conditions d'utilisation ou à nos règlements.
Dans les limites de la législation en vigueur, nous excluons toutes garanties, conditions ou autres dispositions, et ne pouvons être tenus pour responsables d'une perte financière ou de réputation, ni des dommages spéciaux, indirects ou induits résultant de ou liés à l'utilisation de nos sites et services. Cette exclusion ne s’applique pas si vous agissez en tant que consommateur.

Sauf dans le cas où elle aurait été dûment informée de l'existence d'un contenu illicite au sens de la législation en vigueur, et n'aurait pas agi promptement pour le retirer, eBay ne peut pas être tenue responsable ni du Contenu ou des actions (ou absence d'action) des utilisateurs, ni des objets qu'ils mettent en vente. Vous reconnaissez que nous ne sommes pas une société de ventes aux enchères publiques. En effet, en application de l'article L 321-3 du Code de commerce, les opérations de courtage aux enchères réalisées à distance par voie électronique, se caractérisant par l'absence d'adjudication et d'intervention d'un tiers dans la conclusion de la vente d'un bien entre les parties, ne constituent pas une vente aux enchères publiques.

Vous assumez l'entière responsabilité quant à la légalité de vos actions en vertu des lois qui vous sont applicables et quant à la légalité des objets que vous mettez en vente sur nos sites.

Bien que nous utilisions des techniques visant à vérifier l'exactitude et la véracité des informations fournies par nos utilisateurs, cette vérification reste difficile sur Internet. Pour cela eBay ne peut pas assurer l'exactitude ou la véracité des identités présumées des utilisateurs, ou la validité de l'information qu'ils nous fournissent ou publient sur nos sites, ne les confirme pas, et n'en est en aucune façon responsable. Sans préjudice des stipulations prévues au paragraphe précédent, si eBay est tenue responsable par la juridiction compétente envers un utilisateur ou un tiers agissant en tant que professionnel, notre responsabilité ne peut excéder le montant suivant le plus élevé :

(a) tout montant dû au titre de la Garantie client eBay dans la limite du prix de l'objet concerné vendu sur eBay et des frais d'envoi initiaux ;
(b) le montant total des commissions que vous nous avez payées au cours des 12 mois précédant ladite action en responsabilité ; ou
(c) 150 EUR.
Aucune stipulation des présentes Conditions d’utilisation ne doit limiter ou exclure notre responsabilité pour fausse déclaration intentionnelle, décès ou blessures résultant de notre négligence ou de celle de nos agents ou employés, ou toute autre responsabilité qui ne peut être exclue ou limitée par la loi.

15. Indemnités
Vous acceptez d'indemniser eBay ainsi que nos administrateurs, directeurs, agents, employés, joint-ventures ou filiales, contre toute demande ou réclamation faite par un tiers, causée ou résultant d'une violation de votre part des présentes Conditions d'utilisation, ou d'une violation de votre part de toute loi ici applicable ou de tout droit de tiers.

16. Résolution des litiges
En cas de litige entre vous et eBay, nous vous encourageons vivement à nous contacter en premier lieu pour rechercher une solution en accédant à la page d'aide A propos du Service clients. Nous prendrons en considération les demandes raisonnables de résolution de litige par le biais de procédures alternatives, telles que la médiation ou l’arbitrage, et d'alternatives à une procédure judiciaire. La Commission européenne met à disposition des consommateurs européens une plateforme de résolution des litiges en ligne afin de résoudre un litige à l'amiable (art. 14 para. 1 du Règlement UE 524/2013). Les consommateurs peuvent soumettre une réclamation depuis le lien suivant: http://ec.europa.eu/consumers/odr/. eBay adhère à la Fédération du e-commerce et de la vente à distance (FEVAD) et à son service de médiation du e-commerce (60 rue la Boétie – 75008 Paris – mediateurduecommerce@fevad.com).

Sauf indication expresse contraire, les présentes Conditions d'utilisation sont régies par le droit français. Les utilisateurs agissant en tant que professionnels acceptent que toute réclamation ou tout litige qu’ils ont à l'encontre d'eBay soient résolus par un tribunal situé à Paris (France), sauf convention contraire entre les parties.

17. Généralités
Dans l'hypothèse où l'une des modalités figurant dans les Conditions d'utilisation serait considérée comme illégale, non valide ou pour toute raison inapplicable, les autres stipulations des présentes Conditions d'utilisation resteront en vigueur.

Vous autorisez l’entité eBay cocontractante à céder ou transférer, de quelque manière que ce soit et à quelque personne que ce soit, et notamment à une entité du groupe eBay Inc., tout ou partie des droits et obligations issus des présentes Conditions, moyennant notification préalable écrite. Ladite cession libèrera l’entité cédante de ses obligations découlant des présentes Conditions d’utilisation pour l’avenir.

Les titres des différents articles figurant dans les présentes Conditions d'utilisation sont purement indicatifs et ne déterminent pas nécessairement avec précision le contenu des articles auxquels ils se réfèrent. Notre absence de réaction à la suite d'une violation des présentes Conditions d'utilisation par vous ou un tiers n'altérera aucunement notre droit à réagir en cas de violation ultérieure ou similaire.

Si vous avez un litige avec un ou plusieurs utilisateurs, vous renoncez à formuler auprès d'eBay toute réclamation ou demande visant notamment à obtenir des dommages (réels et indirects) de quelque nature, découlant de ces litiges et à rechercher la responsabilité d’eBay (nos sociétés affiliées et filiales, ainsi que celles de nos dirigeants, administrateurs, employés et agents).

Nous pouvons modifier les présentes Conditions d’utilisation à tout moment et vous serez informé par e-mail, dans la section Messages de Mon eBay ou en publiant les conditions modifiées sur www.eBay.fr. Toutes les modifications seront effectives 30 jours après avoir été mises en ligne.

Les présentes Conditions d'utilisation ne peuvent être modifiées d'aucune autre façon, sauf en cas d'accord écrit signé entre eBay et tout utilisateur.

Les règlements publiés sur nos sites peuvent être modifiés. Les modifications prennent effet à compter de leur mise en ligne sur le site eBay.

Aucun partenariat, aucune agence, aucune joint-venture, ni aucune relation employé-employeur ou franchiseur-franchisé ne sont prévus ou créés par les présentes Conditions d'utilisation.

Le programme d'aide à la protection des droits de propriété intellectuelle (VeRO) a été développé pour prendre des mesures afin que les objets mis en vente n'enfreignent pas les droits de propriété intellectuelle des tiers. Si vous pensez que vos droits de propriété intellectuelle ont été enfreints sur les Services d'eBay.fr vous pouvez contacter notre équipe VeRO par le biais de notre programme VeRO.

Les présentes Conditions d'utilisation, l'Avis sur les données personnelles ainsi que tous les règlements ici incorporés constituent l'intégralité de l'accord conclu entre nous. Elles annulent et remplacent tout autre accord ou arrangement existant entre les parties.

Les stipulations des articles intitulés Frais (en ce qui concerne les montants dus pour nos Services), Contenu, Indemnités et Résolution des litiges ainsi les stipulations visées à l’article Généralités survivront à toute fin des présentes Conditions d'utilisation. Toute notification légale envoyée à eBay doit être adressée par courrier recommandé à eBay GmbH, Albert-Einstein-Ring 2-6, 14532 Kleinmachnow, Allemagne (ref : eBay.fr). Toute notification qui vous est destinée sera envoyée en principe par e-mail à l'adresse que vous avez communiquée à eBay lors de votre inscription. Les notifications sont réputées vous être parvenues 24 heures après l'envoi de l'e-mail, sauf si l'expéditeur se voit notifier l'invalidité de l'adresse e-mail. Les notifications peuvent également vous parvenir par lettre à l'adresse communiquée lors de votre inscription. Dans ce cas, le délai mentionné plus haut est porté à 3 jours après l'envoi du courrier.

Vous trouverez ci-dessous les Conditions Générales de la Garantie client eBay délivrée par eBay Services S.à.r.l. 22-24 Boulevard Royal, 2249 Luxembourg (RCS : B160.654, numéro de TVA: LU24858407 et numéro de licence 10018071/0)

18. La Garantie client eBay
La plupart des ventes sur eBay se déroule bien. Toutefois, en cas de problème lors d'un achat, la Garantie client eBay aide les acheteurs et les vendeurs à communiquer et à trouver une solution à leurs problèmes. Les règles régissant la Garantie client eBay font partie intégrante des présentes Conditions d'utilisation. Vous acceptez de vous conformer aux règles de la Garantie client eBay et vous nous autorisez à prendre la décision finale dans tout litige.

Les vendeurs doivent disposer d'un moyen de paiement valide enregistré auprès d'eBay. Les vendeurs peuvent changer ce moyen de paiement en contactant eBay. Si nous tranchons une affaire en faveur de l'acheteur, ou si le vendeur choisit de rembourser un acheteur, eBay pourra informer PayPal du litige en question et demander à virer les fonds du compte PayPal du vendeur pour rembourser l'acheteur du prix total du produit et des frais d'envoi. Lorsque le solde du compte PayPal du vendeur est insuffisant, nous remboursons directement l'acheteur et nous débitons le montant du remboursement à partir du moyen de paiement communiqué par le vendeur, ou nous facturons au vendeur le montant du remboursement.

A cet effet, en votre qualité de vendeur, vous nous :

autorisez et nous donnez instruction de demander à PayPal de collecter ou de reverser des montants variables depuis votre compte PayPal afin de procéder au remboursement d'un acheteur ;
autorisez et nous donnez instruction de demander à PayPal de collecter ou de reverser des montants variables dans d'autres devises (correspondant à des paiements liés à des réclamations éligibles à la Garantie client eBay) depuis votre compte PayPal afin de procéder au remboursement d'un acheteur lorsque vous n'avez pas les fonds suffisants disponibles dans la devise de la transaction ;
autorisez et nous donnez instruction de demander à PayPal de restreindre votre accès aux fonds disponibles sur votre compte PayPal (la restriction s'appliquera dans la limite du montant équivalent au prix du produit et des frais d'envoi initiaux payés par l'acheteur) à tout moment pendant le processus de résolution du litige. (Ceci pourra aboutir à ce que PayPal décide de restreindre l'accès aux fonds disponibles sur votre compte PayPal afin de gérer son exposition à d'éventuels risques, ce conformément aux règles de PayPal. Voir la section Restriction d'accès aux Fonds) ;
autorisez et nous donnez instruction d'effectuer des prélèvements sur le moyen de paiement que vous avez sélectionné afin de recouvrer le montant que nous avons payé à l'acheteur (dans les cas où nous aurions directement remboursé l'acheteur) ;
autorisez et nous donnez instruction d'imputer le montant du remboursement sur votre facture, y compris, mais pas uniquement, le coût des bordereaux de retour.
Vous reconnaissez et acceptez que les autorisations ci-dessus seront données de manière récurrente et à diverses dates, tel que nous le requérons pour mettre en œuvre les règles de la Garantie client eBay. Pour les réclamations futures, lorsque nous tranchons un litige en faveur de l'acheteur, nous le notifions au vendeur et continuons à prélever le vendeur à partir du moyen de paiement de son choix. Si le vendeur ne fournit pas à eBay un moyen de remboursement valide, nous pourrons collecter les sommes dues en utilisant d'autres mécanismes de collecte, dont le recours à une agence de recouvrement. Nous pouvons suspendre la Garantie client eBay sans préavis si nous soupçonnons un abus ou une interférence dans le bon fonctionnement de la Garantie client eBay.

La Garantie client eBay n'est pas la garantie d'un produit ou la garantie d'un service. Il s'agit d'un service supplémentaire, et ne remplace aucune garantie légale prévue par le Code de la consommation ou le Code civil. Indépendamment de l'applicabilité de la Garantie client eBay, les consommateurs peuvent exercer leurs droits contre le vendeur en vertu de la garantie légale de conformité des produits.</p>
        <!--ZONE POUR CODER-->

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