
<? ob_start(); ?>
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
    <p class="commentaire"><a href="index.php">Retour à la liste des billets</a></p>
<div class="news">
    <h3 class="titre">
        <?php echo htmlspecialchars($post['title']); ?>
        <em>le <?php echo $post['creation_date']; ?></em>
       
    </h3>
   
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(($post['content']));
    ?>   
   
   <h2 >Commentaires</h2>
 
</div>
<?php


// $post->closeCursor();
while ($comment = $comments->fetch())
{
?>
 
<p class="auteur"><strong><?php echo htmlspecialchars($comment['author']); ?></strong> le <?php echo $comment['comment_date']; ?></p>

<div class="signaler">   
<p class="textcommentaire"><?php echo nl2br(($comment['comment'])); ?></p>
<p id="signaler"><a href="index.php?action=reportComment&amp;id=<?php echo $comment['id']?>&postid=<?php echo $_GET['id']?>">signaler</a></p>

</div>


<?php 
} // Fin de la boucle des commentaires
$comments->closeCursor();
?>
<form id="laissercommentaire" action= "index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="POST">
        
       <label for="commentaire" class="commentaire" >Commentaire</label>
       <br>
       <br>
       <label for="author" class="pseudo" >Pseudo</label>
        <input type="text" name="author" id="pseudo2" rows="1" cols="40"/>
        <br>
        <textarea type="text" name="comment" rows="10" cols="60" id="comment"></textarea>
        <br>
        <input type="hidden" name="post" value="<?php $_GET['id']?>"/>
        
      <input type="submit" id="submit3" value="envoyer">

</form>
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
