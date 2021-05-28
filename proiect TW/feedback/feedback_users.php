<?php
session_start();
include "../myAccount/database.php";
$con = BD::get_con();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ConGratZ</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/page_styles.css">
    <link rel="stylesheet" href="../css/scroll.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/buttons.css">
    <link rel="stylesheet" href="feedback_text_box.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>

<div class="navbar">
    <div class="dropdown">
        <form style="display: inline" action="../html/main_page.html" method="get">
            <button class="dropbtn">Main page</button>
        </form>
    </div>
    <div class="dropdown">
        <form style="display: inline" action="../html/greeting_card.html" method="get">
            <button class="dropbtn">Greeting Card</button>
        </form>
        <i class="fa fa-caret-down"></i>
        <div class="dropdown-content">
            <a href="../html/anniversary_card.html">Anniversary</a>
            <a href="../html/halloween_card.html">Halloween</a>
            <a href="../html/christmas_card.html">Christmas</a>
            <a href="../html/more_cards.html">More</a>
        </div>
    </div>

    <div class="dropdown">
        <form style="display: inline" action="../html/business_card.html" method="get">
            <button class="dropbtn">Business Card</button>
        </form>
        <i class="fa fa-caret-down"></i>
        <div class="dropdown-content">
            <a href="../html/standard_business_card.html">Standard</a>
            <a href="../html/premium_business_card.html">Premium</a>
            <a href="../html/more_business_card.html">More</a>
        </div>
    </div>

    <div class="dropdown">
        <form style="display: inline" action="../html/feedback.html" method="get">
            <button class="dropbtn">Feedback</button>
        </form>
        <i class="fa fa-caret-down"></i>
        <div class="dropdown-content">
            <a href="../feedback/feedback_form.html">Add your own feedback</a>
            <a href="../feedback/feedback_users.php" method="get">Feedback from users</a>
            <a href="../feedback/feedback_companies.php" method="get">Feedback from other companies</a>
        </div>
    </div>

    <div class="dropdown">
        <form style="display: inline" action="#" method="get">
            <button class="dropbtn">Contact us!</button>
        </form>
        <i class="fa fa-caret-down"></i>
        <div class="dropdown-content">
            <a href="../contact/contact_form.html">Contact form</a>
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
            <form style="display: inline" action="../myAccount/myAccount.php" method="get">
                <button class="dropbtn">My account</button>
            </form>
        </div>
        <img src="../assets/logo.png" alt="">
    </div>
</div>

<?php $result = mysqli_query($con, "SELECT * FROM feedback WHERE tipPersoana='utilizator'");
$row = mysqli_fetch_array($result); ?>

<div class="feedbackTextBox">
    <?php
    echo "First Name:  " . $row['nume'] . "<br />" .
        "Last Name:  " . $row['prenume'] . " " . "<br />" .
        "Country: " . $row['tara'] . " " . "<br />" .
        "Message: " . $row['mesaj'] . " " . "<br />" .
        $row['tipPersoana'] . "<br />";
    while ($row = mysqli_fetch_array($result)) {
        echo "First Name:  " . $row['nume'] . "<br />" .
            "Last Name:  " . $row['prenume'] . "<br />" .
            "Country: " . $row['tara'] . "<br />" .
            "Message: " . $row['mesaj'] . "<br />" .
            $row['tipPersoana'] . "<br />";
    } ?>
</div>


<? phpmysqli_close($con); ?>
</body>

</html>
