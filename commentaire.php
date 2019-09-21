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
    <p class="commentaire"><a href="index.php">Retour à la liste des billets</a></p>
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

// Récupération du billet
$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    </p>
</div>

<h2 >Commentaires</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>
    <script src="js/intro.js">   </script>
</body>
</html>