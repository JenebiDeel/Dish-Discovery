# Dish Discovery

Dish Discovery is a web application that allows users to discover, share, and save recipes. This project includes user registration, login, profile management, and the ability to add and view recipes. This project was made using php, html/css and sql.

## Features

1. **User Authentication:**
   - User registration with username, password, and email.
   - User login with session management.
   - Logout functionality.

2. **Profile Management:**
   - View and edit user profile.
   - Add a bio and profile picture (profile picture feature pending).
   - View user's shared recipes.

3. **Recipe Management:**
   - Add new recipes with title, description, and type (Breakfast, Lunch, Dinner, Dessert, Snack).
   - View recipes categorized by type.

## Files Overview
index.php
- Displays the homepage with a welcome banner and links to recipe categories.
- Requires user to be logged in.

### login.php
- Allows users to log in to their accounts.
- Redirects to index.php upon successful login.

### register.php
- Allows new users to register.
- Redirects to login.php upon successful registration.

### profile.php
- Displays the user's profile and shared recipes.
- Includes a link to edit the profile.

### edit_profile.php
- Allows users to edit their profile information and add new recipes.
- logout.php
- Logs out the user and redirects to the login page.

## CSS Files
- css/style.css: Styles for the main pages.
- css/login.css: Styles for the login page.
- css/register.css: Styles for the registration page.
