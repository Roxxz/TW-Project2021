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
    <link rel="stylesheet" href="../css/pageStyles.css">
    <link rel="stylesheet" href="../css/scroll.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="myAccount.css">
</head>

<body class="loggedin">
    <div class="navbar">
        <div class="dropdown">
            <form style="display: inline" action="../html/pagina_principala.html" method="get">
                <button class="dropbtn">Main page</button>
            </form>
        </div>
        <div class="dropdown">
            <form style="display: inline" action="../html/greeting_card.html" method="get">
                <button class="dropbtn">Greeting Card</button>
            </form>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content">
                <a href="../html/anniversaryCard.html">Anniversary</a>
                <a href="../html/halloweenCard.html">Halloween</a>
                <a href="../html/christmasCard.html">Christmas</a>
                <a href="../html/moreCards.html">More</a>
            </div>
        </div>

        <div class="dropdown">
            <form style="display: inline" action="../html/bussines_card.html" method="get">
                <button class="dropbtn">Business Card </button></form>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content">
                <a href="../html/standardBC.html">Standard</a>
                <a href="../html/premiumBC.html">Premium</a>
                <a href="../html/moreBC.html">More</a>
            </div>
        </div>

        <div class="dropdown">
            <form style="display: inline" action="../html/feedback.html" method="get">
                <button class="dropbtn">Feedback</button>
            </form>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content">
                <a href="../html/feedbackForm.html">Add your own feeback</a>
                <a href="../html/feedbackUsers.html">Feedback from users</a>
                <a href="../html/feedbackCompanies.html">Feedback from other companies</a>
            </div>
        </div>

        <div class="dropdown">
            <form style="display: inline" action="#" method="get">
                <button class="dropbtn">Contact us!  </button>
            </form>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content">
                <a href="../html/contact_form.html">Contact form</a>
                <a href="../html/accounts.html">Associated media accounts</a>
            </div>
        </div>

        <div class="dropdown">
            <form style="display: inline" action="#" method="get">
                <button class="dropbtn">Others</button>
            </form>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content">
                <a href="../html/about.html">About us</a>
                <a href="../html/member.html">Become a member</a>
                <a href="../html/donate.html">Donate</a>
            </div>
        </div>

        <div class="acc">
            <div class="dropdown">
                <form style="display: inline" action="myAccount.php" method="get">
                    <button class="dropbtn">My account</button>
                </form>
            </div>
            <img src="../assets/logo.png" alt="">
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