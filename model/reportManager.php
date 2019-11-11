<?php
require_once("model/Manager.php");
class ReportManager extends Manager
{
    public function reporting($id)
{  
    $db = $this->dbConnect();   
    $reporting=$db->prepare('UPDATE comments SET reporting=reporting+1 WHERE id = ?');
    $reportCom=$reporting->execute(array($id));
    return $reportCom;
}
public function deleteReporting($id)
{
    $db = $this->dbConnect();   
    $reportingUpd=$db->prepare('UPDATE comments SET reporting=0 WHERE id = ?');
    $repo=$reportingUpd->execute(array($id));
    return $repo;
}
}