<?php
require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();               
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    addComment($_GET['id'], $_SESSION['id'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif($_GET['action']=='reportComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                reportComment($_GET['id'],$_GET['postid']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'subscribe') {
            displaySubscribe();            
        }  
        elseif ($_GET['action'] == 'connexion'){
            displayConnex();
                       
        }  
        elseif ($_GET['action'] == 'disconnection'){
            displayDisconnection();                      
        }  
        elseif($_GET['action'] == 'admin'){
            adminConnection();
        }
        elseif($_GET['action'] == 'delUsers'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                deleteUsers($_GET['id']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
           
        }
        elseif($_GET['action'] == 'delComments'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                deleteComments($_GET['id']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
            elseif($_GET['action'] == 'delPosts'){
                if (isset($_GET['id']) && $_GET['id'] > 0){
                    deletePosts($_GET['id']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
                elseif($_GET['action'] == 'editUser'){
                    if (isset($_GET['id']) && $_GET['id'] > 0){
                        editUser($_GET['id']);
                       
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
        }
        elseif($_GET['action'] == 'editPost'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                editPost($_GET['id']);
               
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        elseif ($_GET['action'] == 'addPost') 
            {
                  gotoAddPost();
                  if (isset($_POST['submit'])) {
                    addPost($_POST['title'],$_POST['content']);
                } 
                			
            }
            elseif ($_GET['action'] == 'update') {
                if (isset($_GET['id']) && $_GET['id'] > 0){
                    displayUpdate($_GET['id']);
                   
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
               
                
            }
            
            
				
			
    
    
         } else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

