 <!DOCTYPE html >
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>       
        <title>Crud</title>     
        
    </head>
    <body>

    

<br/>
<form method="post" action="">
    <strong>Modification du titre du billet</strong>
    <br/>
<textarea rows="2" cols="60" name="title"><?php echo $sqeditpo['title']; ?></textarea>    
                            
              



<br/>

    <strong>Modification du billet</strong>
    <br/>
<textarea rows="10" cols="500" name="content" id="commentaire" ><?php echo $sqeditpo['content']; ?></textarea>    
                            


<input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
<input type="submit" name="submit">
                          <a class="btn" href="index.php?action=admin">Retour</a>
                       


</form>
<script type="text/javascript" src="public/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
  tinyMCE.init({
    
    mode : "exact", 
    // id ou class, des textareas appelés
    elements : "commentaire", 
    // en mode avancé, cela permet de choisir les plugins
    theme : "advanced", 
    // langue
   //language : "fr", 
    // liste des plugins
    content_css: "http://localhost/public/css/my_tiny_styles.css",  
    theme_advanced_toolbar_location : "top",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,sup,forecolor,separator,"
    + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
    + "bullist,numlist,outdent,indent,separator,cleanup,|,undo,redo,|,",
    theme_advanced_buttons2 : "",
    theme_advanced_buttons3 : "",
    height:"450px",
    width:"1000px"
  });

  
</script>     
  
</body>
</html>



               
                