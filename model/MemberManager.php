<?php
//namespace P4_Angibert_Stephanie;
require_once("model/Manager.php");
class MemberManager extends Manager
{
    function subscribe($mail)
{
    $db = $this->dbConnect();
    $reqmail = $db->prepare("SELECT * FROM users WHERE email = ?");
    $reqmail->execute(array($mail));
    $mailexist = $reqmail->rowCount();
    return $mailexist;
}
function member($pseudo, $mail, $mdp,$admin)
{  
    $db = $this->dbConnect();
    $admin=0;
    $insertmbr = $db->prepare("INSERT INTO users(pseudo, email, pass,admin) VALUES(?, ?, ?,?)");
    $insertmbr->execute(array($pseudo, $mail, $mdp,$admin));  
    return  $insertmbr; 
    var_dump($pseudo, $mail, $mdp,$admin);        
}
 function mailConnex($mailconnect)
{   
    $db = $this->dbConnect();
    $requser = $db->prepare("SELECT * FROM users WHERE email = ?");
    $requser->execute(array($mailconnect));  
    //$userexist = $requser->rowCount();   
    return $requser; 
    
} 
 function usersInfo($mailconnect)
{
    $db = $this->dbConnect();
    $req = $db->prepare("SELECT * FROM users WHERE email = ?");
    $req->execute(array($mailconnect));
    $userinfo = $req->fetch();
    return $userinfo;
}  
function adminConnex()
{
    $db = $this->dbConnect();
    $reqadmin =$db->query("SELECT email FROM users WHERE admin =1");
    $adminexist=$reqadmin->fetch();
    return $adminexist;
}
function addUsers()
{
    $db = $this->dbConnect();
    $sql = $db->query('SELECT * FROM users ORDER BY id DESC');
    return $sql;
}
function deleteUs($id)
{
    $db = $this->dbConnect();
    $delus =$db->prepare("DELETE FROM users  WHERE id = ?");
    $delus->execute(array($id));
    $del=$delus->fetch();
    return $del;
}
function editUs($idUs)
{
    $db = $this->dbConnect();
    $sqed =$db->prepare( "SELECT * FROM users where id =?");
    $sqed ->execute(array($idUs));
    $sqedit=$sqed ->fetch();
    return $sqedit;
}
 

}