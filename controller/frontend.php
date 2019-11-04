<?php
session_start();
//require('controller/frontend.php');
// namespaces utilisés

require('model/postManager.php'); 
require('model/commentManager.php');
require('model/reportManager.php');
require('model/MemberManager.php');

function listPosts()
{
    $managerP=new postManager();
    $posts=$managerP->getPosts();
    //$posts = getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $managerPost=new postManager();
    $post=$managerPost->getPost($_GET['id']);;
    $comments=$managerPost->getComments($_GET['id']); 
   // $post = getPost($_GET['id']);
   // $comments = getComments($_GET['id']); 

    require('view/frontend/postView.php');
}
function addComment($postId, $author, $comment)
{
     $addCom=new commentManager();
     $affectedLines=$addCom-> postComment($postId, $author, $comment); 
    //$affectedLines = postComment($postId, $author, $comment); 
 
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
   
}

function reportComment($id,$postid)
{
   $report= new reportManager();
   $reportCom=$report->reporting($id);
   //$reportCom=reporting($id);
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
                  $memberM=new MemberManager();
                  $mailexist=$memberM->subscribe($mail);
                 // $mailexist=subscribe($mail);
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
      $mailconnect = $_POST['email'];   
      $mdpconnect=$_POST['pass']; 
        if(isset($mailconnect) AND !empty($mdpconnect)) {    
           $memberM=new MemberManager();

         $userexist= $memberM->mailConnex($mailconnect);        
                      
                 if($userexist->rowCount() == 1) {                 
               
                 $userinfo=$userexist->fetch();
                  if(password_verify($mdpconnect,$userinfo['pass'])){               
                     $_SESSION['pseudo'] = $userinfo['pseudo'];                   
                     $_SESSION['id']=$userinfo['id']; 
                     $_SESSION['admin']=$userinfo['admin']; 
                   
                                   
                    header('location:index.php');  
                     
                 
                  }  
                 
                  else{ $erreur2 = "Mauvais mail ou mot de passe !";
                    
                  }                                 
      
               } else {
                 $erreur2 = "Mauvais mail ou mot de passe !";
                 }
            
           
   } else {
   $erreur2 = "Tous les champs doivent être complétés !"; 
     

    }
   
  
 }
 require('view/frontend/connexion.php');
}    
 function displayDisconnection()
{
   session_destroy();
   require('view/frontend/disconnection.php');
}

 


