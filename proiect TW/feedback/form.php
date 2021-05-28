<!DOCTYPE html>
<html lang="en">

<head>
    <title>ConGratZ</title>
    <meta charset="UTF-8">
    <link href="../css/page_styles.css" rel="stylesheet">
    <link href="../css/scroll.css" rel="stylesheet">
    <link href="../menu/menu_bar.css" rel="stylesheet">
    <link href="../css/buttons.css" rel="stylesheet">
    <link href="../css/contact_form.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet">
</head>

<body>
<?php include("../menu/menu_bar.html"); ?>

<h1>Feedback Form </h1>
<table>
    <tr>
        <td>
            <div class="container">
                <form action="feedback_form.php" method="post">

                    <ul>
                        <li><label for="fname">First Name</label></li>
                    </ul>
                    <input id="fname" name="fname" placeholder="Your name.." type="text">
                    <p></p>
                    <ul>
                        <li><label for="lname">Last Name </label></li>
                    </ul>
                    <input id="lname" name="lname" placeholder="Your last name.." type="text">
                    <p></p>
                    <select id="wherefrom" name="wherefrom">
                        <option value="company">Company</option>
                        <option value="user">User</option>
                    </select>
                    <ul>
                        <li><label for="country">Country</label></li>
                    </ul>
                    <select id="country" name="country">
                        <option value="romania">Romania</option>
                        <option value="moldova">Moldova</option>
                    </select>
                    <ul>
                        <li><label for="subject">Subject</label></li>
                    </ul>
                    <textarea id="subject" name="subject" placeholder="Write something.."></textarea>
                    <p><input type="submit" value="Submit"></p>


                </form>
            </div>
        </td>
        <td>
            <div class="column">
                <img alt="logo" class="logoPic" src="../assets/logo.png">
            </div>
        </td>

    </tr>
</table>

</body>

</html>