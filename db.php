<?php
   function addTodoItem($user_id,$todo_text){
     global $db;
     $query = 'insert into todos(user_id,todo_item) values (:userid,:todo_text)';
     $statement = $db->prepare($query);
     $statement->bindValue(':userid',$user_id);
     $statement->bindValue(':todo_text',$todo_text);
     $statement->execute();
     $statement->closeCursor();
     }
    function deleteTodoItems($user_id,$todo_id){
     global $db;
     $query ='delete from `ss3545`.todos where id = :todo_id and user_id= :userid';
     $statement = $db->prepare($query);
     $statement->bindValue(':userid',$user_id);
     $statement->bindValue(':todo_id',$todo_id); 
     $statement->execute();
     $statement->closeCursor();
     }
     

   
   function getTodoItems($user_id){
     global $db;
     $query = 'select * from todos where user_id= :userid';
     $statement = $db->prepare($query);
     $statement->bindValue(':userid',$user_id);
     $statement->execute();
     $result= $statement->fetchAll();
     $statement->closeCursor();
     return $result;
   }

    function editTodoItem($item_id,$new_description) {
      global $db;
      $query = 'update todos set todo_item = :new_description where id=:userid';
      $statement = $db->prepare($query);
      $statement->bindValue(':userid',$item_id);
      $statement->bindValue(':new_description',$new_description);
      $statement->execute();
      $statement->closeCursor();
    }

   function createUser($username, $password){
     global $db;
     $query = 'select * from users where username = :name ';
     $statement = $db->prepare($query);
     $statement->bindValue(':name',$username);
     $statement->execute();
     $result= $statement->fetchAll();
     $statement->closeCursor();
     $count = $statement->rowCount();
     if($count > 0)
     {
       return true;
     }else{
     $query = 'insert into users (username,passwordHash) values
        (:name, :pass)';
        echo "within code";
     $statement = $db->prepare($query);
     $statement->bindValue(':name',$username);
     $statement->bindValue(':pass',$password);
     $statement->execute();
     $statement->closeCursor();
     return false;
     }
   }
   function isUserValid($username,$password){
     global $db;
     $query = 'select * from users where username = :name and 
     passwordHash = :pass';
     $statement = $db->prepare($query);
     $statement->bindValue(':name',$username);
     $statement->bindValue(':pass',$password);
     $statement->execute();
     $result= $statement->fetchAll();
     $statement->closeCursor();

     $count = $statement->rowCount();
     if($count == 1){
       setcookie('login',$username);
       setcookie('my_id',$result[0]['id']);
       setcookie('islogged',true);
       return true;
     }else{
       unset($_COOKIE['login']);
       setcookie('login',false);
       setcookie('islogged',false);
       setcookie('id',false);
       return false;
     }

   }

?>
