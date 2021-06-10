<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    $_SESSION['editing'] = true;
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
    <script src="../scripts/canvas.js" type="text/javascript" defer></script>
    <script src="../scripts/qrcode.js" type="text/javascript"></script>
    <script src="https://unpkg.com/konva@8.0.4/konva.min.js"></script>
    <script src="https://unpkg.com/gifler@0.1.0/gifler.min.js"></script>

</head>

<body>
<?php include("../menu/menu_bar.html"); ?>
<h1>Make your own card</h1>
<div class="divTable blueTable">
    <div class="divTableBody">
<!--        <div class="divTableRow">-->
<!--            <div class="divTableCell">-->
<!--                <h2>Greeting card model</h2>-->
<!--                <label for="model"></label><select onchange="setModel(this);" name="model" id="model">-->
<!--                    <option></option>-->
<!--                    <option value="1">Model 1</option>-->
<!--                    <option value="2">Model 2</option>-->
<!--                </select></div>-->
<!--        </div>-->
        <div class="divTableRow">
            <div class="divTableCell">
                <h2>Greeting text</h2>
                <label for="greeting_text"></label><input type="text" id="greeting_text" name="greeting_text"
                                                          placeholder="Write something...">
            </div>
        </div>
        <div class="divTableRow">
            <div class="divTableCell">
                <h2>Text font</h2>
                <label for="Font"></label><select onchange="getFont(this);" name="Font" id="Font">
                    <option></option>
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
            </div>
        </div>
        <div class="divTableRow">
            <div class="divTableCell">
                <h2>Font Size</h2>
                <label for="font_size"></label><select onchange="getFontSize(this);" name="font_size" id="font_size">
                    <option></option>
                    <option value="18">xx-small</option>
                    <option value="24">x-small</option>
                    <option value="30">small</option>
                    <option value="36">medium</option>
                    <option value="48">large</option>
                    <option value="60">x-large</option>
                    <option value="72">xx-large</option>
                </select>
            </div>
        </div>
        <div class="divTableRow">
            <div class="divTableCell">
                <h2>Font Colour</h2>
                <label for="font_color"></label><input type="color" id="font_color" name="font_color">
            </div>
        </div>
        <div class="divTableRow">
            <div class="divTableCell">
                <h2>Background Colour</h2>
                <label for="back_color"></label><input type="color" id="back_color" name="back_color">
            </div>
        </div>
        <div class="divTableRow">
            <div class="divTableCell">
                <h2>Image</h2>
                <input type="file">
                <br><br>
            </div>
        </div>
        <div class="divTableRow">
            <div class="divTableCell">
                <button onclick="preview()" type="submit" value="Submit">Preview</button>
                <br>
            </div>
        </div>

        <div class="divTableRow">
            <div class="divTableCell">
                <button id='bttn' type="submit" value="Save">Save</button>
                <br>
            </div>
        </div>
        <div class="divTableRow">
            <div class="divTableCell">
                <button onclick="downloadCard()" type="submit" value="Submit">Download</button>
                <br>
            </div>
        </div>
        <div class="divTableRow">
            <div class="divTableCell">
                <button onclick="sendLink()" type="submit" value="Send">Send</button>
            </div>
        </div>
        <div class="divTableRow">
            <div class="divTableCell">
                <div id="canvas-content"></div>
            </div>
        </div>
        <div class="divTableRow">
            <div class="divTableCell">
                <div id="imageLink"></div>
            </div>
        </div>
        <div class="divTableRow">
            <div class="divTableCell">
                <div id="qrcode" style=" width: 400px; height: 400px; position: absolute; margin: 0 0 0 500px; "></div>
                <br><br>
            </div>
        </div>
    </div>
</div>
</body>

</html>