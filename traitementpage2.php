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
// Si la variable "$_Post" contient des informations alors on les traitres
if(!empty($_POST)){
    extract($_POST);
    $valid = true;

       if(isset($_POST["submit"])){
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
                $comm_mail = "Le mail n'est pas valide";
            }else{
                // On vérifit que le mail est disponible
                $req_mail = $bdd->query("SELECT mail FROM utilisateur WHERE mail = ?",
                    array($mail));

                $req_mail = $req_mail->fetch();

                if ($req_mail['mail'] <> ""){
                    $valid = false;
                    $comm_mail  = "Ce mail existe déjà";
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
                $DB->insert("INSERT INTO utilisateur (mail,pseudo,mdp) VALUES 
                    (?, ?, ?)", 
                    array($mail, $mdp, $pseudo));
                    header('Location: index.php');
                    exit;
                
                }
        }
    }
         
?>