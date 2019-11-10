
<? ob_start(); ?> 
<?php if (isset($_SESSION['pseudo'])){
//if((strlen($_SESSION['pseudo']))!=0){
  
  echo '   <nav>
     <ul class="menu">             
   <li ><a href=index.php?action=connexion>Deconnexion</a></li>    
   <li class="bienvenue"> Bienvenue   '.ucfirst($_SESSION["pseudo"]);echo'</li>
   <li><a href="index.php">Chapitres</a></li>
     </ul>
     </nav>';
}else{
  echo'
  <nav>
<H1>Jean Forteroche</H1>
          <a href="index.php?action=connexion"><div id="connexion">Connexion</div></a>
        
              <ul class="menu">
                 <li class="inscript"><a href="index.php?action=subscribe">Inscription</a></li>                  
                 <li><a href="index.php?action=listPosts">Chapitres</a></li>
              </ul>
             
       </nav>';
}?>



     
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
 
  <p class="auteur"><strong><?php echo htmlspecialchars(ucfirst($comment['author'])); ?></strong> le <?php echo $comment['comment_date']; ?></p>

 
 
  
 

<div class="signaler">   
<p class="textcommentaire"><?php echo nl2br(($comment['comment'])); ?></p>
<p id="signaler"><a href="index.php?action=reportComment&amp;id=<?php echo $comment['id']?>&postid=<?php echo $_GET['id']?>">signaler</a></p>

</div>


<?php 
} // Fin de la boucle des commentaires
$comments->closeCursor();
if(isset($_SESSION['pseudo'])){
 echo'
 <form id="laissercommentaire" action= "index.php?action=addComment&amp;id=' .$post['id'].' " method="POST">
        
       <label for="commentaire" class="commentaire" >Commentaire</label>
       <br>
       
        <textarea type="text" name="comment" rows="10" cols="60" id="comment"></textarea>
        <br>
        <input type="hidden" name="post_id" value="'.$_GET['id'].'"/>
        
      <input type="submit" id="submit3" value="envoyer">

</form>';}?>



<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
