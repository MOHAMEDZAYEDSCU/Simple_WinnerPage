<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/Backend/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    
    if (saveUser(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email])) {
        header("Location: main.php?success=1");
        exit();
    } else {
        $error = "Failed to save user. Email might already exist.";
    }
}

$users = getUsers();
?>

<!DOCTYPE html>
<html>
  <meta charset="UTF-8">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./Frontend/style.css">
      <title>my_page</title>
    </head>

    <body>
      <h2 class="page-title">Welcome to My Page</h2>

      <div class="form-container">
        <form method="post" action="main.php">
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname" placeholder="Enter Your Firstname" required>

            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname" placeholder="Enter Your Lastname" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Ex: johndoe@xxxxx" required>

            <button type="submit">Submit</button>
        </form>
      </div>

      <div>
        <button type="button" id="testLuckBtn">Test Ur Luck !!</button>
      </div>

      <script src="./Frontend/testing.js"></script>
    </body>
</html>
