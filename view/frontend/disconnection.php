<?php ob_start(); ?> 
<nav>
<H1>Jean Forteroche</H1>
<a href="index.php?action=connexion"><div id="connexion">Connexion</div></a>
                       
                <ul class="menu">
                   <li class="inscript"><a href="index.php?action=subscribe">Inscription</a></li>                  
                   <li><a href="index.php">Chapitres</a></li>
                </ul>
               <?php  if(isset($erreur2)){
         echo '<font color="white">'. $erreur2.'</font>'; }
     ?>
</nav>
         <div class="banniere">
            <div class="image"><img src="public/image/livre.jpg" alt="banniere">
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
<?php $content = ob_get_clean(); ?>
 <?php require('view/frontend/template.php');?>