<?php
session_start();
?>

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

<div class="login">
    <h1>Reset password</h1>
    <form action="forgotPassword.php" method="post">
        <label for="username"><i class="fas fa-user-circle"></i></label>
        <input type="text" name="username" placeholder="Username" id="username" required>

        <label for="newPassword"><i class="fas fa-lock"></i></label>
        <input type="password" name="newPassword" placeholder="New Password" id="newPassword" required>

        <label for="confirmPassword"><i class="fas fa-lock"></i></label>
        <input type="password" name="confirmPassword" placeholder="Confirm Password" id="confirmPassword" required>
        <input type="submit" value="Reset">
    </form>

</div>

</body>

</html>