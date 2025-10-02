<?php

session_start();

include_once('connection.php');

$user_id = (int) $_GET['user_id'];

// Fetch user data
$sql = "SELECT * FROM users WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$user = $stmt->fetch();

// Add new recipe
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_recipe'])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $food_type = $_POST["food_type"];
    
    $sql3 = "INSERT INTO recipes (`user_id`, `title`, `description`, `food_type`)
             VALUES (:user_id, :title, :description, :food_type)";
    $stmt3 = $pdo->prepare($sql3);
    $stmt3->execute(['user_id' => $user_id, 'title' => $title, 'description' => $description, 'food_type' => $food_type]);
    
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
                <h2>Add Recipe</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="20"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="food_type">Type food</label>
                        <select name="food_type" id="food_type">
                            <option value="breakfast">Breakfast</option>
                            <option value="lunch">Lunch</option>
                            <option value="dinner">Dinner</option>
                            <option value="dessert">Dessert</option>
                            <option value="snack">Snack</option>
                        </select>
                    </div>
                    <button type="submit" name="add_recipe">Add</button>
                </form>
            </div>
        </div>
    </body>
</html>
