<?php

session_start();

include_once('connection.php');

$user_id = (int) $_GET['user_id'];

// Fetch user data
$sql = "SELECT * FROM users WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$user = $stmt->fetch();

// Update user information
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $about_me = $_POST['about_me'];

    $sql2 = "UPDATE users SET username = :username, password = :password, email = :email, about_me = :about_me WHERE user_id = :user_id";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute(['username' => $username, 'password' => $password, 'email' => $email, 'user_id' => $user_id, 'about_me' => $about_me]);
    

    header("Location: $_SERVER[PHP_SELF]?user_id=$user_id");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit profile</title>
        <link rel="stylesheet" href="css/layout.css">
        <link rel="stylesheet" href="css/edit-profile.css">
    </head>

    <body class="edit-profile-body">
        <div class="back-button">
            <a href="profile.php?id=<?= $user_id?>" class="back-link">Back</a>
        </div>

        <div class="container">
            <div class="form-container">
                <h2>Personal info</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="<?= $user['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" value="<?= $user['password'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="<?= $user['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="about_me">Bio</label>
                        <textarea id="about_me" name="about_me" rows="10"><?= $user['about_me'] ?></textarea>
                    </div>
                    <button type="submit" name="update">Save</button>
                </form>
            </div>
        </div>
    </body>
</html>
