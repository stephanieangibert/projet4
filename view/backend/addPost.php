<!DOCTYPE html>
<html lang="fr"> 
 <head> 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title> Ajouter un billet </title> 
 

    
 </head> 
 
 <body> 
     <a  href = "index.php?action=admin" > Retour sur portail administration </a> 
     <br/> <br/> 
 
     <form  action = ""  method = "post"   name = "form1" > 
         <table  width = "25%"   border = "0" > 
             <tr>  
                 <td> Un titre </td> 
                 <td> <input  type = "text"   name = "title" > </td> 
             </tr> 
             <tr>  
          
                 
                  <td><label for="commentaire" > <strong>Votre billet</strong> </label></td>
                
              <td> <textarea rows="25" cols="50"  type = "text"   name = "content" id="commentaire" ></textarea> </td>
             </tr> 
             <tr>  
              
              <td> <input  type = "submit"   name = "submit"   value = "Ajouter" > </td>
             </tr> 
         </table> 
     </form> 
     <script type="text/javascript" src="public/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
  tinyMCE.init({
    
    mode : "exact", 
    // id ou class, des textareas appelés
    elements : "commentaire", 
    // en mode avancé, cela permet de choisir les plugins
    theme : "advanced", 
    content_css: "http://localhost/public/css/my_tiny_styles.css",    
    // langue
   //language : "fr", 
    // liste des plugins
    theme_advanced_toolbar_location : "top",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,sup,forecolor,separator,"
    + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
    + "bullist,numlist,outdent,indent,separator,cleanup,|,undo,redo,|,",
    theme_advanced_buttons2 : "",
    theme_advanced_buttons3 : "",
    height:"250px",
    width:"600px"
  });

  
</script>     
  
</body>
</html>