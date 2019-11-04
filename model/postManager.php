<?php
//namespace P4_Angibert_Stephanie;
require("manager.php");
class PostManager extends Manager
{
    function getPosts()
{
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

    return $req;
}

function getPost($postId)
{
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
}
function postComment($postId, $author, $comment)
{
    $db = $this->dbConnect();
    'SELECT comments.comment,users.pseudo FROM users,comments WHERE comments.author=users.id';         
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));    
    return $affectedLines;
}
function addPosts()
{
    $db = $this->dbConnect();
    $sqposts=$db->query('SELECT * FROM posts ORDER BY id DESC'); 
    return $sqposts;
}
function deletePost($idPost)
{
    $db = $this->dbConnect();
    $delPos =$db->prepare("DELETE FROM posts  WHERE id = ?");
    $delPos->execute(array($idPost));
    $delPost=$delPos->fetch();
    return $delPost;
}
function editPosts($idPt)
{
    $db = $this->dbConnect();
    $sqedp =$db->prepare( "SELECT * FROM posts where id =?");   
    $sqedp->execute(array($idPt));
    $sqeditpo=$sqedp->fetch();
    return $sqeditpo;
}
 function addP($title, $content) {
    $db = $this->dbConnect();
    $reqPos =$db->prepare("INSERT INTO posts(title, content) VALUES(:title, :content)");
    $newPost = $reqPos->execute(array(
        'title' => $title,
	'content' => $content
    ));
    return $newPost;
}
function upd($title,$content,$id)
{
    $db = $this->dbConnect();
    $sqPosts= $db->prepare("UPDATE posts SET title = ?,content = ? WHERE id = ?");   
    $postup=$sqPosts->execute(array($title,$content,$id));
    return $postup;                    
    
                   
}
}