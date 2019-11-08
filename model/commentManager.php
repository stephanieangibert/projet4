<?php
require_once("model/Manager.php");
class CommentManager extends Manager
{
    public function getComments($postId)
{
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}
public function postComment($postId, $author, $comment)
{
    $db = $this->dbConnect();
    'SELECT comments.comment,users.pseudo FROM users,comments WHERE comments.author=users.id';         
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));    
    return $affectedLines;
}
public function deleteCom($idCom)
{
    $db = $this->dbConnect();
    $delCom =$db->prepare("DELETE FROM comments  WHERE id = ?");
    $delCom->execute(array($idCom));
    $delComm=$delCom->fetch();
    return $delComm;
}
public function addComments()
{
    $db = $this->dbConnect();
    $sqcom = $db->query('SELECT * FROM comments ORDER BY id DESC') ;
    return $sqcom;
}

}