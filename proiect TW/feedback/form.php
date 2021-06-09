<!DOCTYPE html>
<html lang="en">

<head>
    <title>ConGratZ</title>
    <meta charset="UTF-8">
    <link href="../css/page_styles.css" rel="stylesheet">
    <link href="../css/scroll.css" rel="stylesheet">
    <link href="../menu/menu_bar.css" rel="stylesheet">
    <link href="../css/contact_form.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet">
</head>

<body>
<?php include("../menu/menu_bar.html"); ?>

<h1>Feedback Form </h1>

            <div class="textbox">

                <form action="feedback_form.php" method="post">
                    <label for="fname">First Name</label>
                    <input id="fname" name="fname" placeholder="Your name.." type="text">
                    <label for="lname">Last Name </label>
                    <input id="lname" name="lname" placeholder="Your last name.." type="text">
                    <p></p>
                    <label for="wherefrom"></label><select id="wherefrom" name="wherefrom">
                        <option value="company">Company</option>
                        <option value="user">User</option>
                    </select>
                    <label for="country">Country</label>
                    <select id="country" name="country">
                        <option value="romania">Romania</option>
                        <option value="moldova">Moldova</option>
                    </select>
                    <label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something.."></textarea>
                    <input type="submit" value="Submit">
                </form>
            </div>
</body>

</html>