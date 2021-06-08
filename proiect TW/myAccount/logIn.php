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
    <h1>Login</h1>
    <form action="authenticate.php" method="post">
        <label for="username"><i class="fas fa-user-circle"></i></label>
        <input type="text" name="username" placeholder="Username" id="username" required>

        <label for="password"><i class="fas fa-lock"></i></label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <input type="submit" value="Submit">
    </form>

</div>

        <?php if(isset($_SESSION["registered"])){ ?>
            <p class="det"><?php echo "You have successfully registered, now you can login!" ?></p>
        <?php } ?>
        <?php if(isset($_SESSION["passwordChanged"])){ ?>
            <p class="det"><?php echo "You have successfully changed your password, now you can login!" ?></p>
        <?php } ?>


<p class="det"><a href="forgotPasswordForm.php">Forgot password</a> </p>

<p class="det">Not a member? <a href="signUpForm.php">Sign Up</a> </p>

</body>

</html>