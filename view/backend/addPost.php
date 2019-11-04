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