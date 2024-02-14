<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chore Management System</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header>
    <h1>Login</h1>
  </header>

  

  <div class ="container">
  <div class ="login-form">
  <h2>Everybody Hates Chores, But We Gotta Do It Anyway</h2>
  <form action="../action/login_user_action.php" method="post" id="signin-form">
    <label for="email">Email or phone</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" name="button" id="button" value="Sign In">
    <hr>
    <span class="no-link">Don't have an account <a id="Register" href="../login/register_view.php"> Register</a></span>
  </form>
</div>

    <div class="image-container">
      <img src="chore1.jpg" alt="Image">
    </div>

</div>

  <footer>
    <p>&copy; 2024 Chore Management System</p>
  </footer>
 
</body>
</html>
