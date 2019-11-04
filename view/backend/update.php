 <!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crud</title>     
        
    </head>
    <body>

    
<div>
<br/>
<form method="post" action="">
    <strong>Modification du titre du billet</strong>
    <br/>
<textarea rows="2" cols="60" name="title"><?php echo $sqeditpo['title']; ?></textarea>    
                            
</div>               


<div>
<br/>

    <strong>Modification du billet</strong>
    <br/>
<textarea rows="10" cols="60" name="content" ><?php echo $sqeditpo['content']; ?></textarea>    
                            
</div>

<div>

<input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
<input type="submit">
                          <a class="btn" href="index.php?action=admin">Retour</a>
                        </div>


</form>



               
                