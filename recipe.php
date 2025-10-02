<?php

include "connection.php";

session_start();

$id = (int) $_GET['id'];

$sql2 = "SELECT * FROM recipes WHERE recipe_id = :recipe_id";
$stmt2 = $pdo->prepare($sql2);
$recordset2 = $stmt2->execute(['recipe_id' => $id]);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe</title>
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/recipe.css">
</head>
<body>
    <?php while ($recipe = $stmt2->fetch()) : ?>
        <h1><?= $recipe['title'] ?></h1>
        <div class="recipe-container">
        <img src="images/breakfast.jpg">
            <div class="recipe-description">
                <p><?= $recipe['description'] ?></p>
            </div>
        </div>
    <?php endwhile; ?>
</body>
</html>
