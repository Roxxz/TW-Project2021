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
    <link rel="stylesheet" href="../menu/menu_bar.css">
    <link rel="stylesheet" href="feedback_text_box.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>

<?php include("../menu/menu_bar.html");

$result = mysqli_query($con, "SELECT * FROM feedback WHERE tipPersoana='company'");
 ?>

<div class="grid-container">
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="feedbackTextBox">'.
            "First Name:  " . $row['nume'] . "<br />" .'<hr>'.
            "Last Name:  " . $row['prenume'] . "<br />" .'<hr>'.
            "Country: " . $row['tara'] . "<br />" .'<hr>'.
            "Message: " . $row['mesaj'] . "<br />" .'<hr>'.
            '</div>';
    } ?>
</div>


<? phpmysqli_close($con); ?>
</body>

</html>
