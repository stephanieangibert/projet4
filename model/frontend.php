<?php
function getPosts()
{
    $db = dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

    return $req;
}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}
function postComment($postId, $author, $comment)
{
    $db = dbConnect();    
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));
    return $affectedLines;
}
function reporting($id)
{   $db = dbConnect();    
    $reporting=$db->prepare('UPDATE comments SET reporting=reporting+1 WHERE id = ?"');
    $reportCom=$reporting->execute(array($id));
    return $reportCom;
}
function subscribe($mail)
{
    $db = dbConnect();
    $reqmail = $db->prepare("SELECT * FROM users WHERE email = ?");
    $reqmail->execute(array($mail));
    $mailexist = $reqmail->rowCount();
    return $mailexist;
}
function member($pseudo, $mail, $mdp,$admin)
{  
    $db = dbConnect();
    $admin=0;
    $insertmbr = $db->prepare("INSERT INTO users(pseudo, email, pass,admin) VALUES(?, ?, ?,?)");
    $insertmbr->execute(array($pseudo, $mail, $mdp,$admin));  
    return  $insertmbr; 
    var_dump($pseudo, $mail, $mdp,$admin);        
}
 function mailConnex($mailconnect)
{   
    $db = dbConnect();
    $requser = $db->prepare("SELECT * FROM users WHERE email = ?");
    $requser->execute(array($mailconnect));    
    $userexist = $requser->rowCount();   
    return $userexist;
   
    
} 
function usersInfo($mailconnect)
{
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM users WHERE email = ?");
    $req->execute(array($mailconnect));
    $userinfo = $req->fetch();
    return $userinfo;
} 
function adminConnex()
{
    $db = dbConnect();
    $reqadmin =$db->query("SELECT email FROM users WHERE admin =1");
    $adminexist=$reqadmin->fetch();
    return $adminexist;
}
 


function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=project4;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}