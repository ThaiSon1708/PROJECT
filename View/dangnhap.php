<!DOCTYPE html>
<html>
<head>
  <title>Sign In</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 40px;">

  <div style="max-width: 400px; margin: auto; background: #fff; padding: 30px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; margin-bottom: 20px;">Sign In</h2>

    <form method="post" action="../Controller/dangnhap.php">
      <label for="username">UserName</label><br>
      <input type="text" id="username" name="txtname" placeholder="UserName" style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

      <label for="password">Password</label><br>
      <input type="password" id="pass" name="txtpass" placeholder="Password" style="width: 100%; padding: 8px; margin-bottom: 20px;"><br>

      <button type="submit" style="width: 100%; padding: 10px; background-color: blue ; color: white; border: none; border-radius: 4px;" name="txtlog" >Sign In</button>
    </form>

    <p style="text-align: center; margin-top: 20px;">Don't have an account? 
      <a href="dangky.php" style="color: #007BFF; text-decoration: none;">Sign up</a>
    </p>
  </div>

</body>
</html>