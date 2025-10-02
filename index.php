<?php 
include "connection.php";
session_start();

if (!isset($_SESSION["user_id"])) {
    header("location: login.php");
    exit;
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body class="home-body">
    <header class="home-header">
        <div class="wrapper">
            <div class="home-logo">
                <a href="index.php">Dish Discovery</a>
            </div>
            <nav class="home-nav">
                <a href="#">Opgeslagen recepten</a>
                <a href="profile.php?id=<?= $_SESSION['user_id'] ?>">Profiel</a>
            </nav>
        </div>
    </header>

    <div class="banner">
        <div class="wrapper">
            <h2>Discover and share recipes</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, nostrum. Nemo ipsa omnis 
               illum vitae, laboriosam id iusto odio. Consequatur dolores quae culpa sequi earum officiis eveniet 
               ullam dolor accusantium?</p>
        </div>
    </div>

    <div class="content-area">
        <div class="wrapper">
            <div class="card-container">
                <div class="foodCard">
                    <a href="#">
                        <img src="images/breakfast.jpg" alt="Breakfast">
                        <div class="card-content">
                            <h1>Breakfast</h1>
                        </div>
                    </a>
                </div>
                <div class="foodCard">
                    <a href="#">
                        <img src="images/lunch.jpg" alt="Lunch">
                        <div class="card-content">
                            <h1>Lunch</h1>
                        </div>
                    </a>
                </div>
                <div class="foodCard">
                    <a href="#">
                        <img src="images/dinner.jpg" alt="Dinner">
                        <div class="card-content">
                            <h1>Dinner</h1>
                        </div>
                    </a>
                </div>
                <div class="foodCard">
                    <a href="#">
                        <img src="images/dessert.jpg" alt="Dessert">
                        <div class="card-content">
                            <h1>Dessert</h1>
                        </div>
                    </a>
                </div>
                <div class="foodCard">
                    <a href="#">
                        <img src="images/snack.jpg" alt="Snack">
                        <div class="card-content">
                            <h1>Snack</h1>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
