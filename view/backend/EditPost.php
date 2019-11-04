<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">        	
    </head>
    <body>
<br />
<h3>Edition</h3>
              
<label >Billet Jean Forteroche</label>
<table>
<thead>
<th>Billet</th>
</thead>                      
<tbody>
<td>
<?php echo $sqeditpo['title']; ?> </label>
</td>
    <td>
<?php echo $sqeditpo['content']; ?> </label>
</td>
<td>
<?php echo $sqeditpo['creation_date']; ?> </label>
</td>
</tbody>

</table>
<div>
<a class="btn" href="admin.php">Back</a>
</div>
</body>
</html>
                        