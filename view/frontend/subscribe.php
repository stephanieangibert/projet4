<?php ob_start(); ?> 
<nav>
<H1>Jean Forteroche</H1>
<a href="index.php?action=connexion"><div id="connexion">Connexion</div></a>
                       
                <ul class="menu">
                   <li class="inscript"><a href="index.php?action=subscribe">Inscription</a></li>                  
                   <li><a href="index.php">Chapitres</a></li>
                </ul>
               <?php  if(isset($erreur2)){
         echo '<font color="white">'. $erreur2.'</font>'; var_dump($erreur2); }
     ?>
         </nav>


<div id="formulaire">
<form action="" method="POST">
    <p ><label for="pseudo" >Pseudo</label><input  type="text" name="pseudo" id="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" /></p>
    <p ><label for="email" >E mail</label><input  type="email" name="email" id="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" /></p>
    <p ><label for="pass" >Mot de passe</label><input  type="password" name="pass" id="motdepasse"/></p>   
    <p ><label for="pass1" >Mot de passe</label><input  type="password" name="pass1" id="motdepasse1"/></p>   
    <p><input type="submit" id="submit" name="submitsub"/></p>
               </form>
               <?php
               if(isset($erreur)){
    echo '<font color="white">'. $erreur.'</font>'; }?> 
               </div>
              

 
<?php $content = ob_get_clean(); ?>
 <?php require('view/frontend/template.php');?>
