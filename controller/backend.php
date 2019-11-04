<?php

//require('model/backend.php');
// namespaces utilisés

use \P4_Angibert_Stephanie\Model\postManager;
use \P4_Angibert_Stephanie\Model\commentManager;
use \P4_Angibert_Stephanie\Model\reportManager;
use \P4_Angibert_Stephanie\Model\memberManager;

function adminConnection()
{   
    $memberU=new memberManager();
    $sql=$memberU->addUsers();
    $sqcom=$memberU->addComments();
    $sqposts=$memberU->addPosts();;
    //$sql= addUsers();
    //$sqcom=addComments();
    //$sqposts=addPosts();
    require('view/backend/admin.php');
}
function deleteUsers($id)
{
    $memberU=new memberManager();
    $del=$memberU->deleteUs($id);
    //$del=deleteUs($id);
    header('location:index.php?action=admin');    
   
}
function deleteComments($idCom)
{
    $comment=new commentManager();
    $delComm= $comment->deleteCom($idCom);
    //$delComm=deleteCom($idCom);
    header('location:index.php?action=admin'); 

}
function deletePosts($idPost)
{   
    $post=new postManager();
    $delPost=$post->deletePost($idPost);
    //$delPost=deletePost($idPost);
    header('location:index.php?action=admin'); 
}
function editUser($idUs)
{
    $memberU=new memberManager();
    $sqedit=$memberU->editUs($idUs);
    //$sqedit=editUs($idUs);
    require('view/backend/editUser.php');  
    
}
function editPost($idPt)
{ 
    $postcom=new postManager();
    $sqeditpo=$postcom->editPosts($idPt);
    //$sqeditpo=editPosts($idPt);
    require('view/backend/editPost.php'); 
}
function gotoAddPost()
{
    require('view/backend/addPost.php');
}
function addPost($title, $content)
{ 
    
     
        $title =   $_POST [ 'title' ] ; 
        $content  =  $_POST [ 'content' ]  ; 
         
        
        if ( empty ( $title )   ||   empty ( $content ) )   { 
                   
            if ( empty ( $title ) )   { 
                echo   "<font color='red'>Vous n'avez pas mis de titre.</font><br/>" ; 
            } 
           
            if ( empty ( $content ) )   { 
                echo   "<font color='red'>Vous n'avez pas mis votre chapitre.</font><br/>" ; 
            } 
           
          
        }   else   {  
           
            $newPost=addP($title, $content);            
         
            echo   "<font color='green'>Le chapitre a été ajouté." ; 
            echo   "<br/><a href='index.php'>Voir sur le site</a>" ; 
           
        } 
       
 

}
function displayUpdate($idPt)
{
    $post=new postManager();
    $sqeditpo=$post->editPosts($idPt);;
    //$sqeditpo=editPosts($idPt);
    require('view/backend/update.php'); 

    if((!empty($_POST['title'])) && !empty($_POST['content'])&&!empty($_POST['submit'])) {
        $id=$_POST['id'];
         $title=$_POST['title'];
         $content=$_POST['content'];  
         $postup=upd($title,$content,$id);
         echo"La modification a été prise en compte !";      
     
     
    } else {

         echo "vous n'avez rien changer";
         
     }
}
         
            
         
    
    


