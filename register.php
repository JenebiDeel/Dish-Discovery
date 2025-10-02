<?php

include_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = ($_POST["username"]);
    $password = ($_POST["password"]);
    $email = ($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Invalid email format.";
    } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            
           
            $stmt = $pdo->prepare('INSERT INTO users (username, password, email) VALUES (:username, :password, :email)');
            $stmt->execute([
                'username' => $username,
                'password' => $hashed_password,
                'email' => $email
            ]);
            
            
            header("Location: login.php");
            exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>
</html>
