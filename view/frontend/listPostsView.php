
<?php ob_start();?>
<?php
if(isset($_SESSION['admin'])){
    if(($_SESSION['admin']=='1')>0){       
        echo'<nav>   
        <ul class="menu">             
        <li ><a href=index.php?action=disconnection>Deconnexion</a></li>    
        <li class="bienvenue"> Bienvenue   '.ucfirst($_SESSION["pseudo"]);echo'</li>     
        <p class="boutonvert"><a href="index.php?action=admin">ADMIN</a></p>      
        </ul>
        </nav>';
          
      }elseif((strlen( $_SESSION ['pseudo']))!=0){
          
          echo '   <nav>
          <ul class="menu">             
        <li ><a href=index.php?action=disconnection>Deconnexion</a></li>    
        <li class="bienvenue"> Bienvenue   '.ucfirst($_SESSION["pseudo"]);echo'</li>
        <li><a href="index.php?action=listPosts">Chapitres</a></li>
          </ul>
          </nav>';
     } }else{
          echo'
          <nav>
      <H1>Jean Forteroche</H1>
                  <a href="index.php?action=connexion"><div id="connexion">Connexion</div></a>
                
                      <ul class="menu">
                         <li class="inscript"><a href="index.php?action=subscribe">Inscription</a></li>                  
                         <li><a href="index.php">Chapitres</a></li>
                      </ul>
                     
               </nav>';
      
      }?>
    
}



              
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
                   echo nl2br(($data['content'])); ?>     
  
                    <div class="comment" ><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></div>
            </p>
                
     
      
</div>
<?php
} 

$posts->closeCursor();
 
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
