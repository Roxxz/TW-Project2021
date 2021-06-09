<!DOCTYPE html>
<html lang="en">

<head>
    <title>ConGratZ</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/page_styles.css">
    <link rel="stylesheet" href="../css/scroll.css">
    <link rel="stylesheet" href="../menu/menu_bar.css">
    <link rel="stylesheet" href="../css/buttons.css">
    <link rel="stylesheet" href="../css/browse_gallery.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>

<?php include("../menu/menu_bar.html"); ?>

    <h1>Choose between diferent types of cards or <form style="display: inline-block" action="#" method="get">
            <button class="dropbtn">make your own</button> </form> from scratch! </h1>
    <div class="grid-container">
        <?php
        $files = glob("../greeting/*.*");
        for ($i = 0; $i < count($files); $i++) {
            $image = $files[$i];
            echo '<div class="card">'.'<img src="' . $image . '" alt="Random image" />' .
                                '<button>Try it out!</button>'. '</div>';
        }
        ?>
    </div>

</body>

</html>