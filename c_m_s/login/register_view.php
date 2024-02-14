<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chore Management System - Register</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
</head>
<body>
  <header>
    <h1>Chore Management Systems</h1>
  </header>

  <h2>Everybody Hates Chores, But We Gotta Do It Anyway</h2>
  <div>
    <form action="../action/register_user_action.php" id="registration-form" method="post" onsubmit="return validateForm()">
      <label for="fname">First Name</label><br>
      <input type="text" id="fname" name="fname" required><br>
      <label for="lname">Last Name</label><br>
      <input type="text" id="lname" name="lname" required><br>

      <p style="margin: 0px 5px;">Select Gender</p>
      <input style="margin: 10px;" type="radio" id="gender" name="gender" value="0">
      <label for="gender">Female </label><br>
      <input style="margin: 10px;" type="radio" id="gender" name="gender" value="1">
      <label for="gender">Male </label><br>

      <label for="family_role"> Choose Family Role </label>
      <?php include('../functions/select_role_fxn.php'); ?>

      <label for="d_o_b">Date of Birth</label>
      <input type="date" id="d_o_b" name="d_o_b" required><br>

      <label for="phone">Enter a phone number</label><br>
      <input type="tel" id="phone" name="phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>
      <small>Format: 123-456-7890</small><br><br>

      <label for="email">Email </label><br>
      <input type="email" id="email" name="email" required><br>

      <label for="password">Password (6+characters)</label><br>
      <input type="password" id="password" name="password" minlength="6" required><br>

      <label for="re_password">Retype Password </label><br>
      <input type="password" id="re_password" name="re_password" minlength="6" required><br>

      <span id="password_match_message"></span>
      <br>
      <input type="submit" name="button" id="button" value="Register">


      <h6>By clicking Register, you agree to the terms and conditions.</h6>

      <p> Already Have an Account <a id="re_login" href="../login/login_view.php">Sign In </a></p>

    </form>
  </div>

  <footer>
    <p>&copy; 2024 Chore Management System</p>
  </footer>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    document.getElementById("registration-form").addEventListener("submit", function(event) {

      event.preventDefault();

      if (validateForm()) {
        this.submit();
      }
    });
    function checkPasswordMatch() {
      var password = document.getElementById("password").value;
      var re_password = document.getElementById("re_password").value;
      var message = document.getElementById("password_match_message");
      
      if (password === re_password) {
        message.textContent = "";
        return true;
      } else {
        message.textContent = "Passwords do notted match!";
        return false;
      }
    }

    function validateForm() {
      if (!checkPasswordMatch()) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Passwords do not match!'
        });
        return false; 
      }

      return true;

    }
  </script>



</body>
</html>
