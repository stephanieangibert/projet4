<?php ob_start(); ?> 
<nav>
<H1>Jean Forteroche</H1>
             <form id="connex" action="index.php?action=menu" method="POST">
                 <label id="mailconnexion" for="mail" >E mail</label>
                 <input  type="email" name="email" id="mail2"/>
                 <label id="mdpconnexion" for="motdepasse" >Mot de passe</label>
                 <input  type="password" name="pass" id="motdepasse22"/>
                  <input type="submit" id="submit2" name="submitConnex" value="ok"> 
                
                <?php if(isset($erreur)){
    echo '<font color="white">'. $erreur.'</font>';}?> 
             </form>
                <ul class="menu">
                   <li class="inscript"><a href="index.php?action=subscribe">Inscription</a></li>                  
                   <li><a href="index.php">Chapitres</a></li>
                </ul>
               
         </nav>
              
<div class="banniere">
            <div class="image"><img src="public/image/livre.jpg">
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

<p>Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
    ?>
<div class="news">
    <h3 class="titre">
        <?php echo htmlspecialchars($data['title']); ?>
        <em>le <?php echo $data['creation_date']; ?></em>
       
    </h3>
   
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(($data['content']));
    ?>   
   
    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
 
</div>
<?php
} 

$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
