<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">        	
    </head>
    <body>
<br />
<h3>Edition</h3>
              
<label >Billet Jean Forteroche</label>
<table>
<thead>
<th>
<?php echo $sqeditpo['title']; ?> </label>
</th>
</thead>                      
<tbody>

    <td>
<?php echo $sqeditpo['content']; ?> </label>
</td>

</tbody>
</table>
<p>
<?php echo $sqeditpo['creation_date']; ?> </label>
</p>
<div>
<a class="btn" href="index.php?action=admin">Retour sur l'administration du site</a>
</div>
</body>
</html>
                        