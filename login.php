<html>
<head>
  <title>Login Page</title>
  <style type="text/css">
  body {
  background-color: #d4e0f7;  
  }
    div.container {
    
      padding: 6px;
      width:400px;
      margin:20px auto;
      text-align:center;  
    }
    .login { 
      background:#b5bdcc; 
    }
    .login div {
      border:2px solid #111c33;
      padding:3px;
    }
    .register { 
      background:#f9f9f9; 
    }
    .register div {
      border:2px solid #fff;
      padding:3px;
    }
    input[type=text], input[type=password] {
      padding: 6px 15px;
      margin: 8px 0;
      border: 1px solid #ccc;
    }
    button {
      background-color: #4CAF80;
      color: white;
      padding: 6px 15px;
      margin: 8px 0;
      width: 50%;
    }

  </style>
</head>

<body>
  <div class='container' align="center">

    <form method = "post" action="index.php" class="login">
    <input type="hidden" name="action" value="test_user">
      <div>
        <label><b>Username</b></label>
        <input type="text" name="reg_uname" placeholder="Enter Username" required>
      </div>
      <div>
        <label><b>Password</b></label>
        <input type="password" name="reg_password" placeholder="Enter Password" required>
        
      </div>
      <div>
        <button type="submit">Login</button>     
      </div>
    </form>

    <form action="register.php" class="register">
      <div>
        <input type="submit"  value="Sign up">
      </div>
    </form>

  </div>
</body>

</html>
