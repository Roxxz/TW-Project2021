<!DOCTYPE html>
<html lang="en">

<head>
    <title>ConGratZ</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/page_styles.css">
    <link rel="stylesheet" href="../css/scroll.css">
    <link rel="stylesheet" href="../menu/menu_bar.css">
    <link rel="stylesheet" href="myAccount.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin">

<?php include("../menu/menu_bar.html"); ?>

<div class="signUp">
    <h1>Sign Up</h1>
    <form action="signUp.php" method="post">
        <label for="username"><i class="fas fa-user"></i></label>
        <input type="text" name="username" placeholder="Username" id="username" required>
        <label for="email"><i class="fas fa-envelope"></i></label>
        <input type="text" name="email" placeholder="E-mail" id="email" required>
        <label for="password"><i class="fas fa-lock"></i></label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <input type="submit" value="Submit">
    </form>

</div>
<p class="det">Already a member? <a href="logIn.php">Log In</a> </p>

</body>

</html>