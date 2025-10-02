<?php 

include "connection.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $loggedInUser = $stmt->fetch();

        if ($loggedInUser && password_verify($password, $loggedInUser['password'])) {
            $_SESSION["user_id"] = $loggedInUser["user_id"];
            header("Location: index.php");
            exit();
        } else {
            echo 'Invalid username and/or password';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
    
    <div class="container">
    <h1>Login</h1>
    <form method="post">
        <label for="username">Username</label><br>
        <input class="field" type="text" id="username" name="username"><br>
        <label for="password">Password</label><br>
        <input class="field" type="password" id="password" name="password"><br>
        <input class="loginButton" type="submit" id="login" name="login" value="Login">
    </form>

    <a href="register.php">No account yet? click here to register</a>
    </div>
</body>
</html>
