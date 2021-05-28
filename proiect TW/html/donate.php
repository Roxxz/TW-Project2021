<!DOCTYPE html>
<html lang="en">

<head>
    <title>ConGratZ</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/page_styles.css">
    <link rel="stylesheet" href="../css/scroll.css">
    <link rel="stylesheet" href="../menu/menu_bar.css">
    <link rel="stylesheet" href="../css/donations.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
<?php include("../menu/menu_bar.html"); ?>

    <h1>Support us!</h1>
    <p>
        If you want to help us grow and come up with more interesting cards, you can do so down below!
    </p>

    <div class="donations">
        <div class="donations__progress-bar"></div>
        <h2 class="donations__progress">
            $<span class="donations__amount">0</span> / $75,000</h2>
        <div class="donations__text">
            Join the
            <span class="donations__donors">0</span> other donors who have already supported this project.
        </div>
        <form class="donations__form">
            <span class="donations__input-icon">$</span>
            <input class="donations__input" type="number" value="50" title="$" />
            <input type="submit" class="donations__submit" />
            <button class="donations__reset">Reset</button>
        </form>
    </div>


</body>

</html>