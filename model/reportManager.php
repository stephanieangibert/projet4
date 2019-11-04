<?php
//namespace P4_Angibert_Stephanie;
require_once("model/Manager.php");
class ReportManager extends Manager
{
    function reporting($id)
{  
    $db = $this->dbConnect();   
    $reporting=$db->prepare('UPDATE comments SET reporting=reporting+1 WHERE id = ?"');
    $reportCom=$reporting->execute(array($id));
    return $reportCom;
}
}