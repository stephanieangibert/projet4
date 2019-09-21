<?php 
//Connexion à la BDD
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
}
catch(Exception $e)
{
 die('Erreur :'.$e->getMessage());
} 
// Si la variable "$_Post" contient des informations alors on les traite
if(!empty($_POST)){
    extract($_POST);
    $valid = true;

       if(isset($_POST["inscription"])){
            $mail=htmlspecialchars($_POST["mail"]);
            $pseudo=htmlspecialchars($_POST["pseudo"]);
            $mdp=htmlspecialchars($_POST["motdepasse"]);
            $mdp1=htmlspecialchars($_POST["motdepasse1"]);
       
           // Vérification du mail
           if(empty($mail)){
            $valid = false;
            $comm_mail = "Le mail ne peut pas être vide";
             // On vérifit que le mail est dans le bon format
            }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
                $valid = false;
                $commentaire="Le mail n'est pas valide";
            }else{
                // On vérifit que le mail est disponible
                $req_mail = $bdd->query("SELECT mail FROM utilisateur WHERE mail = ?",
                    array($mail)); 
                $req_mail = $req_mail->fetch();

                if ($req_mail['mail'] <> ""){
                    $valid = false;
                    $commentaire="Ce mail existe déjà";
                }
            }
            // Vérification du mot de passe
            if(empty($mdp)) {
                $valid = false;
                $comm_mdp = "Le mot de passe ne peut pas être vide";

            }elseif($mdp != $mdp1){
                $valid = false;
                $comm_mdp = "La confirmation du mot de passe ne correspond pas";
            }
             // Si toutes les conditions sont remplies alors on fait le traitement
             if($valid){

                $mdp = crypt($mdp, "$6$rounds=5000$macleapersonnaliseretagardersecret$");
               
                // On insert nos données dans la table utilisateur
                $bdd->insert("INSERT INTO utilisateur (mail,pseudo,motdepasse) VALUES 
                    (?, ?, ?)", 
                    array($mail, $mdp, $pseudo));
                    
                
                }
        }
    }
         
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="couleur.css">
    <link rel="stylesheet" href="menu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php include("menu.php"); ?>
<div id="formulaire">
<form action="page2.php" method="POST">

    <p ><label for="mail" >E mail</label><input  type="email" name="mail" id="mail"/></p>                  
    <p ><label for="pseudo" >Pseudo</label><input  type="text" name="pseudo" id="pseudo"/></p> 
    <p ><label for="motdepasse" >Mot de passe</label><input  type="password" name="motdepasse" id="motdepasse"/></p>    
    <p ><label for="motdepasse1" >Mot de passe</label><input  type="password" name="motdepasse1" id="motdepasse1"/></p>    
    <p><input type="submit" id="submit" name="inscription"></p>
               </form>
</div>




</body>
</html>





                       