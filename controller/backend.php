<?php

require_once('model/postManager.php'); 
require_once('model/commentManager.php');
require_once('model/reportManager.php');
require_once('model/MemberManager.php');

function passWord(){

    require('view/backend/password.php'); 
}
function adminConnection()
{   
   if ((isset($_POST['submitmdp'])&& $_POST['pass']=="jean")||$_SESSION['admin']==1){
       
        $memberU=new MemberManager();
        $commentU=new CommentManager();
        $postU=new PostManager();
        $sql=$memberU->addUsers();
        $sqcom=$commentU->addComments();
        $sqposts=$postU->addPosts();
        
        require('view/backend/admin.php');
   }

       else{          
          
           require('view/backend/password.php');
           echo   "<font color='white'>Vous n'êtes pas l'administrateur.</font><br/>" ;
         
       }
    
   }
   

function deleteUsers($id)
{
    $memberU=new MemberManager();
    $del=$memberU->deleteUs($id); 
    header('location:index.php?action=admin');    
   
}
function deleteComments($idCom)
{
    $comment=new CommentManager();
    $delComm= $comment->deleteCom($idCom);   
    header('location:index.php?action=admin');   

}
function deletePosts($idPost)
{   
    $post=new PostManager();
    $delPost=$post->deletePost($idPost);
    $delComAssoc=$post->deleteComAssociatedPost($idPost);   
   header('location:index.php?action=admin');
}
function editUser($idUs)
{
    $memberU=new MemberManager();
    $sqedit=$memberU->editUs($idUs); 
    require('view/backend/editUser.php');  
    
}
function editPost($idPt)
{ 
    $postcom=new PostManager();
    $sqeditpo=$postcom->editPosts($idPt);    
    require('view/backend/editPost.php');    
}
function gotoAddPost()
{
    require('view/backend/addPost.php');
}
function addPost($title, $content)
{ 
    
     
        $title =   $_POST [ 'title' ]; 
        $content  =  $_POST [ 'content' ];          
        
        if ( empty ( $title )   ||   empty ( $content ) )   { 
                   
            if ( empty ( $title ) )   { 
                echo   "<font color='red'>Vous n'avez pas mis de titre.</font><br/>" ; 
            } 
           
            if ( empty ( $content ) )   { 
                echo   "<font color='red'>Vous n'avez pas mis votre chapitre.</font><br/>" ; 
            } 
           
          
        }   else   {  
            $addPost=new PostManager();
            $newPost=$addPost->addP($title, $content);                   
         
            echo   "<font color='green'>Le chapitre a été ajouté." ; 
            echo   "<br/><a href='index.php'>Voir sur le site</a>" ; 
           
        } 
       
 

}
function displayUpdate($idPt)
{
    $post=new PostManager();
    $sqeditpo=$post->editPosts($idPt);  
    require('view/backend/update.php'); 

    if(!empty($_POST['title']) && !empty($_POST['content'])&&!empty($_POST['submit'])) {
        $id=$_POST['id'];
         $title=$_POST['title'];
         $content=$_POST['content'];  
         $post=new PostManager();
         $postup=$post->upd($title,$content,$id);      
         echo"La modification a été prise en compte !";      
     
     
    } else {

         echo "vous n'avez rien changer";
         
     }
}
function updRepo($id)
{
   $report= new ReportManager();
   $repo= $report->deleteReporting($id);
   header('Location: index.php?action=admin');
}
         
            
         
    
    


