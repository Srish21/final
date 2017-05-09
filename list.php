<?php
echo "<h1> To do list system</h1><br/>";
echo "Welcome, ".$_COOKIE['login'].'<br/>';
echo "Below you may find your to-do items: ";
echo "<br> <br>";

?>
<html>
  <body>
    <table>
      
        <?php foreach($result as $res):?>
      <tr>
        <td> <?php echo $res['todo_item']; ?>  </td>
     <td>
             <form action="edit.php" method="POST"><input type="submit"
	     value="Edit"/>
	     <input type="hidden" name="description" value="<?php echo $res['todo_item']?>">
	     <input type="hidden" name="action"
	     value="edit"/>
	             <input type="hidden" name="item_id" value="<?php echo
		     $res['id']; ?>" /></form> </td>

    <td> 
        <form action="index.php" method="POST"><input type="submit" value="Delete"/><input type="hidden" name="action" value="Delete"/>
        <input type="hidden" name="item_id" value="<?php echo $res['id']; ?>" /></form> </td>
      </tr>  
	<?php endforeach;?>
      
    </table>
    <form method = 'post' action='index.php'>
        <strong> Description: </strong> <input type='text' name='description'/><br>
	<input type = 'hidden' name = 'action' value='add'><br>
	<input type="submit" value="Add"/>
    </form>
  </body>
</html>
