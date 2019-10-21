<?php ob_start(); 

if(!empty($userinfo['pseudo'])){?>
  <nav>
                 <ul class="menu">             
               <li ><a href="http://localhost/projet4/index.php">Deconnexion</a></li>
               <li><a href="index.php">Chapitres</a></li>
               <li class="bienvenue"><?php echo "Bienvenue  " .ucfirst($userinfo['pseudo']);?></li>
           
                 </ul>
                 </nav>

<?php}else{?>
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
<?php}
             

 $content = ob_get_clean(); 

 require('view/frontend/template.php'); ?>