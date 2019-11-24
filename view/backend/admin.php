     <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="stylesheet" href="public/css/admin.css">
            <title>Crud en php</title>             
    
        </head>
        <body>
 
         <h2>Page réservée à Jean Forteroche</h2> 
         <h2><a href="index.php">Revenir sur le site</a></h2>
              
         <table cellpadding="5" cellspacing="10">
         <thead>
         <th>Mail</th>
         <th>Pseudo</th>
         </thead>                      
         <tbody>
         <?php         
                 
                   while ($user = $sql->fetch())
                { 
         
                     echo '<tr>';
                     echo'<td>' . $user['email'] . '</td>';
                     echo'<td>' . $user['pseudo'] . '</td>';
                     echo'<td class="btn1">';
                     echo '<a class="btn1" href="index.php?action=editUser&amp;id=' . $user['id'] . '">Lire</a>';
                     echo '</td>';   
                     echo'<td class="btn3">';
                     echo '<a class="btn3"  href="index.php?action=delUsers&amp;id=' . $user['id'] . ' ">Effacer</a>';               
                     echo '</td>';
                     echo '</tr>';  };             
                     
         
         ?>  
         </table>  
         </tbody>
         <br/>
         <div class="titre">    
         <strong>Gestion des commentaires</strong>
         <br/>
         </div>
         <table cellpadding="5" cellspacing="10">
         <thead>
         <th>Commentaire</th>
         <th>Auteur</th>
         <th>Nbre de signalement</th>
         </thead>      
         <tbody>
             <br/>
         <?php
         
         while ($com = $sqcom->fetch()){  
             if (intval($com['reporting'])>0){
                 $couleur="rouge";
             }
             else{
                 $couleur="rien";
             }  
             echo '<tr>';
             echo'<td>' . $com['comment'] . '</td>';
             echo'<td>' . $com['author'] . '</td>';
             echo'<td class="'.$couleur.'">' . $com['reporting'] . '</td>';
             echo'<td class="btn1">';
             echo '<a class="btn1" href="index.php?action=repo&amp;id=' . $com['id'] . '">Annuler</a>';
             echo '</td>';   
             echo'<td class="btn3">';
             echo '<a class="btn3" href="index.php?action=delComments&amp;id=' . $com['id'] . ' ">Effacer</a>';
             echo '</td>';
             echo '</tr>';       
             
            
         };  
        
         ?>
         
         </tbody>
         </table>
         <table cellpadding="5" cellspacing="10">
         <thead>
         <th>Titre</th>
         <th>Auteur</th>
         </thead>      
         <tbody>
         <br/>
         <div class="titre">    
         <strong>Gestion des billets</strong>
         </div>
         <br/>
         <?php
         
         while ($post = $sqposts->fetch()) {
             echo '<tr>';
             echo'<td>' . $post['title'] . '</td>';    
             echo'<td class="article">' . $post['content'] . '</td>';
             echo'<td>' . $post['creation_date'] . '</td>';
             echo'<td >';
             echo'<div class="btn4" >';
             echo '<a class="btn1" class="btn" href="index.php?action=editPost&amp;id=' . $post['id'] . '">Lire</a>';
             echo '</td>';
             echo'</div>';   
             echo '<td>';
             echo'<div class="btn5" >';
             echo '<a class="btn2" href="index.php?action=update&amp;id=' . $post['id'] . '">Mise à jour</a>';
             echo '</td>';
             echo'</div>';  
             echo'<td>';
             echo'<div class="btn6" >';
             echo '<a class="btn3" href="index.php?action=delPosts&amp;id=' . $post['id'] . ' ">Effacer</a>';
             echo '</td>';
             echo'</div>';
             echo '</tr>';
             
         };
        
         ?>
         </tbody>
         </table>

    }

   
    </body>
    <a href="index.php?action=addPost" > <p class="titre">Ajouter un chapitre</p></a>
    </html>                                       
    
                       
                           


                           

                            

                       



                           
                            

                            


                           
                            

                           


                           
                        
 




  
