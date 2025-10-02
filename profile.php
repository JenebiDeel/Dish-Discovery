<?php

include "connection.php";

session_start();

$user_id = (int) $_GET['id'];

$sql = "SELECT * FROM users WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$recordset = $stmt->execute(['user_id' => $user_id]);

$sql2 = "SELECT * FROM recipes WHERE user_id = :user_id";
$stmt2 = $pdo->prepare($sql2);
$recordset2 = $stmt2->execute(['user_id' => $user_id]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body class="profile-body">
    <header class="profile-header">
        <div class="navbar-wrapper">
            <div class="profile-page-logo">
                <a href="index.php">Dish Discovery</a>
            </div>
            <div class="top-right-buttons">
                <a class="edit-profile-link" href="edit_profile.php?user_id=<?= $user_id ?>">Edit personal info</a>
                <a href="logout.php">logout</a>
            </div>
        </div>
    </header>

    <?php while ($row = $stmt->fetch()) : ?>
        <div class="profile-container">
            <div class="profile-picture">
                <img src="images/default-profile-pic.jpg" alt="Profile Picture">
            </div>
            <div class="profile-info">
                <h2><?= $row['username'] ?></h2>
                <p><?= $row['about_me'] ?></p>
            </div>
        </div>
    <?php endwhile; ?>

    <div class="recipe-list">
        <h2>Shared Recipes</h2>
        <a class="add-recipe-link" href="add_recipe.php?user_id=<?= $user_id ?>">Add new recipe</a>
        <div class="recipe-card-container">
            <?php while ($recipe = $stmt2->fetch()) : ?>
                <div class="recipe-card">
                    <a class="recipe-link" href="recipe.php?id=<?= $recipe['recipe_id'] ?>">
                        <img src="images/breakfast.jpg" alt="Recipe Picture">
                        <div class="recipe-card-content">
                            <h3><?= $recipe['title'] ?></h3>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>