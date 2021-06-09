<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    $_SESSION['editing']=true;
    header('Location: ../myAccount/logIn.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ConGratZ</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/page_styles.css">
    <link rel="stylesheet" href="../css/scroll.css">
    <link rel="stylesheet" href="../menu/menu_bar.css">
    <link rel="stylesheet" href="make_greetingCard.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="canvas.js" type="text/javascript" defer></script>

</head>

<body>
<?php include("../menu/menu_bar.html"); ?>
<h1>Make your own card</h1>

<div class="edit-options">
    <h2>Business card model</h2>
    <label for="model"></label><select onchange="setModel(this);" name="model" id="model">
        <option> </option>
        <option value="1">Model 1</option>
        <option value="2">Model 2</option>
    </select>
    <h2>Motto</h2>
    <label for="greeting_text"></label><input type="text" id="greeting_text" name="greeting_text">
    <h2>Text font</h2>
    <label for="Font"></label><select onchange="getFont(this);" name="Font" id="Font">
        <option> </option>
        <option value="Arial">Arial (sans-serif)</option>
        <option value="Arial Black">Arial Black (sans-serif)</option>
        <option value="Verdana">Verdana (sans-serif)</option>
        <option value="Tahoma ">Tahoma (sans-serif)</option>
        <option value="Trebuchet MS">Trebuchet MS (sans-serif)</option>
        <option value="Impact">Impact (sans-serif)</option>
        <option value="Times New Roman">Times New Roman (serif)</option>
        <option value="Georgia">Georgia (serif)</option>
        <option value="American Typewriter">American Typewriter (serif)</option>
        <option value="Courier">Courier (monospace)</option>
        <option value="Lucida Console">Lucida Console (monospace)</option>
        <option value="Monaco">Monaco (monospace)</option>
        <option value="Brush Script MT">Brush Script MT (cursive)</option>
        <option value="Comic Sans MS">Comic Sans MS (cursive)</option>
    </select><br>
    <h2>Font Size</h2>
    <label for="font_size"></label><select onchange="getFontSize(this);" name="font_size" id="font_size">
        <option> </option>
        <option value="18px ">xx-small</option>
        <option value="24px ">x-small</option>
        <option value="30px ">small</option>
        <option value="36px ">medium</option>
        <option value="48px ">large</option>
        <option value="60px ">x-large</option>
        <option value="72px ">xx-large</option>
    </select>
    <h2>Font Colour</h2>
    <label for="font_color"></label><input type="color" id="font_color" name="font_color">
    <h2>Background Colour</h2>
    <label for="back_color"></label><input type="color" id="back_color" name="back_color">
    <h2>Image</h2>
    <input type="file">
    <br><br>

    <button onclick="preview()" type="submit" value="Submit">Preview</button>
    <br>
    <button onclick="save()" type="submit" value="Save">Save</button>
    <br>
    <button onclick="sendLink()" type="submit" value="Send">Send</button>
    <div id="canvas-content"></div>

</body>

</html>