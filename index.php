<?php 

  require('user_validator.php');

  $errors = [];

  if(isset($_POST['submit'])){
    // validate entries
    $validation = new UserValidator($_POST);
    $errors = $validation->validateForm();

    // if errors is empty --> save data to db
  }

?>

<html lang="en">
<head>
  <title>PHP OOP</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  
  <div class="new-user">
    <h2>Create a new user</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

      <label>username: </label>
      <input type="text" name="username" value="<?php if(isset($_POST['username'])) echo htmlspecialchars($_POST['username']); else echo "";?>">
      <div class="error">
        <?php echo $errors['username'] ?? '' ?>
      </div>
      <label>email: </label>
      <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); else echo "";?>">
      <div class="error">
        <?php echo $errors['email'] ?? '' ?>
      </div>
      <input type="submit" value="submit" name="submit" >

    </form>
  </div>

</body>
</html>