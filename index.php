<?php
require('db_connection.php');
require('db.php');
$action = filter_input(INPUT_POST, "action");
//echo "action = $action";
if($action == NULL)
{
  $action = "show_login_page";
}
if($action == "show_login_page")
{
  include('login.php');
}else if($action == 'test_user')
{
  $username = $_POST['reg_uname'];
  $password = $_POST['reg_password'];
  $suc = isUserValid($username,$password);
  if($suc == true)
  {
    $result = getTodoItems($_COOKIE['my_id']);
    include('list.php');
  }else{
    header("Location: badInfo.php");
  }
}else if ($action == 'registrar')
{
 // echo " we want to create a new account";
 //still new
  $name = filter_input(INPUT_POST, 'email');
  if(isset($name))
  {
     $pass = filter_input(INPUT_POST, 'password');
     $exit = createUser($name,$pass);
     
     if($exit == true)
     {
       include('user_exit.php');
       
     }else {
       header("Location: login.php");
     }
  }
}else if ($action == 'add')

{
   if (isset($_POST['description']) and $_POST['description']!='')
     {
      
      addTodoItem($_COOKIE['my_id'],$_POST['description']);
     }
     $result = getTodoItems($_COOKIE['my_id']);
      include('list.php');
}
else if($action == 'Delete') {
      if(isset($_POST['item_id'])){
        $selected = $_POST['item_id'];
    echo $_POST['item_id'].$_COOKIE['my_id'];
        deleteTodoItems($_COOKIE['my_id'],$selected);
        
    $result = getTodoItems($_COOKIE['my_id']);
    include('list.php');
      

}
}
else if($action == 'edit') {
  $item_id = $_POST['item_id'];
  $new_description = $_POST['new_description'];
  editTodoItem($item_id,$new_description);
  $result = getTodoItems($_COOKIE['my_id']);
  include('list.php');
}

?>
