<?php



require_once('model/postManager.php'); 
require_once('model/commentManager.php');
require_once('model/reportManager.php');
require_once('model/MemberManager.php');

function adminConnection()
{   
    $memberU=new MemberManager();
    $commentU=new CommentManager();
    $postU=new PostManager();
    $sql=$memberU->addUsers();
    $sqcom=$commentU->addComments();
    $sqposts=$postU->addPosts();
    //$sql= addUsers();
    //$sqcom=addComments();
    //$sqposts=addPosts();
    require('view/backend/admin.php');
}
function deleteUsers($id)
{
    $memberU=new MemberManager();
    $del=$memberU->deleteUs($id);
    //$del=deleteUs($id);
    header('location:index.php?action=admin');    
   
}
function deleteComments($idCom)
{
    $comment=new CommentManager();
    $delComm= $comment->deleteCom($idCom);
    //$delComm=deleteCom($idCom);
    header('location:index.php?action=admin'); 

}
function deletePosts($idPost)
{   
    $post=new PostManager();
    $delPost=$post->deletePost($idPost);
    $delComAssoc=$post->deleteComAssociatedPost($idPost);
    //$delPost=deletePost($idPost);
    header('location:index.php?action=admin'); 
}
function editUser($idUs)
{
    $memberU=new MemberManager();
    $sqedit=$memberU->editUs($idUs);
    //$sqedit=editUs($idUs);
    require('view/backend/editUser.php');  
    
}
function editPost($idPt)
{ 
    $postcom=new PostManager();
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
            $addPost=new PostManager();
            $newPost=$addPost->addP($title, $content);
           // $newPost=addP($title, $content);            
         
            echo   "<font color='green'>Le chapitre a été ajouté." ; 
            echo   "<br/><a href='index.php'>Voir sur le site</a>" ; 
           
        } 
       
 

}
function displayUpdate($idPt)
{
    $post=new PostManager();
    $sqeditpo=$post->editPosts($idPt);;
    //$sqeditpo=editPosts($idPt);
    require('view/backend/update.php'); 

    if(!empty($_POST['title']) && !empty($_POST['content'])&&!empty($_POST['submit'])) {
        $id=$_POST['id'];
         $title=$_POST['title'];
         $content=$_POST['content'];  
         $post=new PostManager();
         $postup=$post->upd($title,$content,$id);
        // $postup=upd($title,$content,$id);
         echo"La modification a été prise en compte !";      
     
     
    } else {

         echo "vous n'avez rien changer";
         
     }
}
         
            
         
    
    


