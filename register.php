<?php
require 'config.php';

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    // Validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm)) {
        $errors[] = "All fields are required.";
    }

    if (strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if ($password !== $confirm) {
        $errors[] = "Passwords do not match.";
    }

    // Check if username or email already exists
    $result = $conn->query("SELECT id FROM users WHERE username = '$username' OR email = '$email'");
    
    if ($result && $result->num_rows > 0) {
        $errors[] = "Username or email already exists.";
    }

    // If no errors, insert user
    if (empty($errors)) {

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $conn->query("INSERT INTO users (username, email, password_hash) 
                      VALUES ('$username', '$email', '$hashed')");

        $success = "Registration successful! You can now login.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Register</h2>

    <?php foreach ($errors as $error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endforeach; ?>

    <?php if ($success): ?>
        <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>

   <form method="POST">
    <input type="text" name="username" placeholder="Username">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="confirm" placeholder="Confirm Password">

    <button type="submit">Register</button>

    <div class="link">
        Already have an account?
        <a href="login.php">Login here</a>
    </div>
</form>

</body>
</html>