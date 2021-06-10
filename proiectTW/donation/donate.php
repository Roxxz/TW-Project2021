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
    <form action="donation_process.php" method="post">
        <label for="email"><i class="fas fa-envelope"></i></label>
        <input type="text" name="email" placeholder="E-mail" id="email" required>

        <label for="cardNo"><i class="fa fa-credit-card"></i></label>
        <input type="text" name="cardNo" placeholder="Card Number" id="cardNo" required>

        <label for="date" ><i class="far fa-calendar-alt"></i></label>
        <input type="text"  name="date" placeholder="MM-YY" id="date" required>

        <label for="cvc"><i class="fa fa-lock"></i></label>
        <input type="text" name="cvc" placeholder="CVC" id="cvc" required>

        <p>Choose the amount you want to donate: </p>
        <label for="money">$</label><input type="text" name="money" placeholder="..." id="money" required>

        <input type="submit" value="Donate">
    </form>

</div>


</body>

</html>