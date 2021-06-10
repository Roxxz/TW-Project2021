let info, font_text, font_size, ctx, imageSelector;

async function getFont(selectTag) {
    font_text = selectTag.options[selectTag.selectedIndex].value;
}

async function getFontSize(selectTag) {
    font_size = selectTag.options[selectTag.selectedIndex].value;
}

async function preview() {
    document.getElementById("canvas-content").innerHTML = `<canvas id="myCanvas" width="800" height="450"
            style="border:1px solid #d3d3d3;">`;

    let canvas = document.getElementById("myCanvas");
    ctx = canvas.getContext("2d");
    let colour = document.getElementById("back_color").value;
    font_colour = document.getElementById("font_color").value;

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.fillStyle = colour;
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.font = font_size.concat(font_text);
    ctx.fillStyle = font_colour;
    for (let i = 0; i < info.length; i++) {
        ctx.fillText(info[i], 350, i * 50 + 150);
    }


    const preview = document.getElementById('canvas-content');
    const file = document.getElementById('photo').files[0];
    const reader = new FileReader();
    reader.addEventListener("load", function () {
        // convert image file to base64 string
        const image = new Image();
        image.src = reader.result;
        var sth = new Image();
        sth.onload = function () {
            ctx.drawImage(sth, 100, 100, 200, 200);
        };
        sth.src = reader.result;
        preview.src = reader.result;
    }, false);
    if (file) {
        reader.readAsDataURL(file);
    }
}


var fileChooser = document.getElementById('fileChooser');

function parseTextAsXml(text) {
    var parser = new DOMParser(),
        xmlDoc = parser.parseFromString(text, "text/xml");

    const x = xmlDoc.getElementsByTagName("PERSON");
    info = [x[0].getElementsByTagName("NAME")[0].childNodes[0].nodeValue,
        x[0].getElementsByTagName("EMAIL")[0].childNodes[0].nodeValue,
        x[0].getElementsByTagName("PHONE")[0].childNodes[0].nodeValue,
        x[0].getElementsByTagName("COUNTRY")[0].childNodes[0].nodeValue,
        x[0].getElementsByTagName("WEBPAGE")[0].childNodes[0].nodeValue];
}

function waitForTextReadComplete(reader) {
    reader.onloadend = function(event) {
        var text = event.target.result;

        parseTextAsXml(text);
    }
}

function handleFileSelection() {
    var file = fileChooser.files[0],
        reader = new FileReader();

    waitForTextReadComplete(reader);
    reader.readAsText(file);
}

fileChooser.addEventListener('change', handleFileSelection, false);