<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: logIn.php');
    exit;
}
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
</head>

<body class="loggedin">
    <div class="navbar">
        <div class="dropdown">
            <form style="display: inline" action="../pagina_principala.html" method="get">
                <button class="dropbtn">Main page</button>
            </form>
        </div>
        <div class="dropdown">
            <form style="display: inline" action="../greeting_card.html" method="get">
                <button class="dropbtn">Greeting Card</button>
            </form>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content">
                <a href="../anniversaryCard.html">Anniversary</a>
                <a href="../halloweenCard.html">Halloween</a>
                <a href="../christmasCard.html">Christmas</a>
                <a href="../moreCards.html">More</a>
            </div>
        </div>

        <div class="dropdown">
            <form style="display: inline" action="../bussines_card.html" method="get">
                <button class="dropbtn">Business Card </button></form>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content">
                <a href="../standardBC.html">Standard</a>
                <a href="../premiumBC.html">Premium</a>
                <a href="../moreBC.html">More</a>
            </div>
        </div>

        <div class="dropdown">
            <form style="display: inline" action="../feedback.html" method="get">
                <button class="dropbtn">Feedback</button>
            </form>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content">
                <a href="../feedbackForm.html">Add your own feeback</a>
                <a href="../feedbackUsers.html">Feedback from users</a>
                <a href="../feedbackCompanies.html">Feedback from other companies</a>
            </div>
        </div>

        <div class="dropdown">
            <form style="display: inline" action="#" method="get">
                <button class="dropbtn">Contact us!  </button>
            </form>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content">
                <a href="../contact_form.html">Contact form</a>
                <a href="../accounts.html">Associated media accounts</a>
            </div>
        </div>

        <div class="dropdown">
            <form style="display: inline" action="#" method="get">
                <button class="dropbtn">Others</button>
            </form>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content">
                <a href="../about.html">About us</a>
                <a href="../member.html">Become a member</a>
                <a href="../donate.html">Donate</a>
            </div>
        </div>

        <div class="acc">
            <div class="dropdown">
                <form style="display: inline" action="myAccount.php" method="get">
                    <button class="dropbtn">My account</button>
                </form>
            </div>
            <img src="../logo.png" alt="">
        </div>
    </div>

    <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">

    <nav class="navtop">
        <div>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <div class="content">
        <h2>Home Page</h2>
        <p>Welcome back, <?=$_SESSION['name']?>!</p>
    </div>

</body>

</html>