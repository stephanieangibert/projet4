<?php
session_start();
require('model/frontend.php');

function listPosts()
{
    //$managerP=new postMananger();
    //$posts=$managerP->getPosts();
    $posts = getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']); 

    require('view/frontend/postView.php');
}
function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function reportComment($id,$postid)
{
   $reportCom=reporting($id);
   header('Location: index.php?action=post&id=' . $postid);
}
function displaySubscribe()
{
   
   if(isset($_POST['submitsub'])){
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $mail = htmlspecialchars($_POST['email']);
      $mdp=$_POST['pass'];
      $mdp1=$_POST['pass1'];
      $admin=0;
    
      if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['pass']) AND !empty($_POST['pass1'])) {
         $pseudolength = strlen($pseudo);
         if($pseudolength <= 255) {
         
               if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                  $mailexist=subscribe($mail);
                  if($mailexist == 0) {
                     if($mdp == $mdp1) {
                       $mdp= password_hash($_POST['pass'], PASSWORD_DEFAULT);
                       $mdp1 = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
                       $insertmbr=member($pseudo, $mail, $mdp,$admin);                 
                        $erreur = "Votre compte a bien été créé !";
                     } else {
                        $erreur = "Vos mots de passe ne correspondent pas !";
                     }
                  } else {
                     $erreur = "Adresse mail déjà utilisée !";
                  }
               } else {
                  $erreur = "Votre adresse mail n'est pas valide !";
               }
            
         } else {
            $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
         }
      } else {
         $erreur = "Tous les champs doivent être complétés !";
      }

   }   
       
     
     require('view/frontend/subscribe.php');
}
function displayConnex()
{
   if(isset($_POST['submitConnex'])){
      $mailconnect =htmlspecialchars($_POST['email']) ;   
      $mdpconnect=htmlspecialchars($_POST['pass']); 
        if(isset($mailconnect) AND !empty($mdpconnect)) {         
         $userexist=mailConnex($mailconnect);
         $adminexist=adminConnex();                    
          
                 if($userexist == 1) {     
                  $userinfo=usersInfo($mailconnect);
                  if(password_verify($mdpconnect,$userinfo['pass'])){               
                     $_SESSION['pseudo'] = $userinfo['pseudo']; 
                     $_SESSION['pass']=$userinfo['pass']; ;
                     $_SESSION['email']=$userinfo['email']; 
                     $_SESSION ['users']= $mailconnect;                               
                          
                   
                
                  }  
                 
                  else{
                      $erreur = "Mauvais mail ou mot de passe !";
                     
                   
                  } 
                                
      
               } else {
                 $erreur = "Mauvais mail ou mot de passe !";
                
                   }
            if($adminexist['email']==$mailconnect)  {
             ?> 
             <nav>        
             <p class="boutonvert"><a href="admin.php">ADMIN</a></p>      
             </nav>
              <?php   }
           
   } else {
   $erreur = "Tous les champs doivent être complétés !";
  
   
   }
}
else{ 
  
   require('view/frontend/connexion.php');
   }
     

   require('view/frontend/connexion.php');

}



