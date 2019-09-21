<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">	
    <link rel="stylesheet" href="css/couleur.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
		integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<title>Le Blog de l'écrivain</title>
</head>
<body>
<?php include("menu.php"); ?>
    <div class="banniere">
            <div class="image"><img src="image/livre.jpg">
                 <h2 class="billet">Billet simple pour l'Alaska</h2>
            </div>
            <div><p id="intro">Venez découvrir en avant-première, chapitre par chapitre, la création de mon tout nouveau roman. Un billet simple pour l'Alaska.
                     Laissez vos commentaires et dîtes moi ce que vous en pensez ! Venez faire le voyage avec moi !
                </p>
                    <div id="oeil"><i class="fas fa-eye"> </i>
                        <h5>  Plus d'info click ici !</h5>
                    </div>
            </div>
    </div>
    <?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On récupère les 5 derniers billets
$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

while ($donnees = $req->fetch())
{
?>
<div class="news">
    <h3 class="titre">
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
       
    </h3>
   
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    <br />
    <em><a href="commentaire.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
    </p>
</div>
<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
    <script src="js/intro.js">   </script>
   
</body>
</html>