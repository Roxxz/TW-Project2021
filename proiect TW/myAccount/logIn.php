<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ConGratZ</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../pageStyles.css">
    <link rel="stylesheet" href="../scroll.css">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="myAccount.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin">
<div class="navbar">
    <div class="dropdown">
        <form style="display: inline" action="../../html/pagina_principala.html" method="get">
            <button class="dropbtn">Main page</button>
        </form>
    </div>
    <div class="dropdown">
        <form style="display: inline" action="../../html/greeting_card.html" method="get">
            <button class="dropbtn">Greeting Card</button>
        </form>
        <i class="fa fa-caret-down"></i>
        <div class="dropdown-content">
            <a href="../../html/anniversaryCard.html">Anniversary</a>
            <a href="../../html/halloweenCard.html">Halloween</a>
            <a href="../../html/christmasCard.html">Christmas</a>
            <a href="../../html/moreCards.html">More</a>
        </div>
    </div>

    <div class="dropdown">
        <form style="display: inline" action="../../html/bussines_card.html" method="get">
            <button class="dropbtn">Business Card </button></form>
        <i class="fa fa-caret-down"></i>
        <div class="dropdown-content">
            <a href="../../html/standardBC.html">Standard</a>
            <a href="../../html/premiumBC.html">Premium</a>
            <a href="../../html/moreBC.html">More</a>
        </div>
    </div>

    <div class="dropdown">
        <form style="display: inline" action="../../html/feedback.html" method="get">
            <button class="dropbtn">Feedback</button>
        </form>
        <i class="fa fa-caret-down"></i>
        <div class="dropdown-content">
            <a href="../../html/feedbackForm.html">Add your own feeback</a>
            <a href="../../html/feedbackUsers.html">Feedback from users</a>
            <a href="../../html/feedbackCompanies.html">Feedback from other companies</a>
        </div>
    </div>

    <div class="dropdown">
        <form style="display: inline" action="#" method="get">
            <button class="dropbtn">Contact us!  </button>
        </form>
        <i class="fa fa-caret-down"></i>
        <div class="dropdown-content">
            <a href="../../html/contact_form.html">Contact form</a>
            <a href="../../html/accounts.html">Associated media accounts</a>
        </div>
    </div>

    <div class="dropdown">
        <form style="display: inline" action="#" method="get">
            <button class="dropbtn">Others</button>
        </form>
        <i class="fa fa-caret-down"></i>
        <div class="dropdown-content">
            <a href="../../html/about.html">About us</a>
            <a href="../../html/member.html">Become a member</a>
            <a href="../../html/donate.html">Donate</a>
        </div>
    </div>

    <div class="acc">
        <div class="dropdown">
            <form style="display: inline" action="myAccount.php" method="get">
                <button class="dropbtn">My account</button>
            </form>
        </div>
        <img src="../../assets/logo.png" alt="">
    </div>
</div>

<input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">

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

        <?php
        if(isset($_SESSION["registered"]))
        {
            echo "<p align=center>You have successfully registered, now you can login!</p>";
        }
        ?>
<p class="det">Not a member? <a href="signUp.html">Sign Up</a> </p>

</body>

</html>