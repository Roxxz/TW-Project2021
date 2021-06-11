let info, font_text, font_size, ctx, canvas, imageSelector;

async function getFont(selectTag) {
    font_text = selectTag.options[selectTag.selectedIndex].value;
}

async function getFontSize(selectTag) {
    font_size = selectTag.options[selectTag.selectedIndex].value;
}

async function preview() {
    document.getElementById("canvas-content").innerHTML = `<canvas id="myCanvas" width="800" height="450"
            style="border:1px solid #d3d3d3;">`;

    canvas = document.getElementById("myCanvas");
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

document.addEventListener('DOMContentLoaded', function (e) { //https://stackoverflow.com/questions/48048797/base64canvas-to-blob-blob-to-php
    /*
        Button click event handler
        create FormData Object and read the canvas data
        then send via ajax to a PHP script ( in this case the same page )
        to process the uploaded image.
    */
    function bindEvents(event) {

        let fd = new FormData();
        fd.append('action', 'save');
        fd.append('image', canvas.toDataURL('image/jpg').replace(/^data:image\/(png|jpg);base64,/, ''));
        fd.append('filename', Math.random() + '.jpg');

        let ajax = function (url, data, callback) {
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) callback.call(this, this.response);
            };
            xhr.open('POST', url, true);
            xhr.send(data);
        };

        let callback = function (r) {
            let newLink = (' ' + r.toString()).slice(1);
            newLink = newLink.replace("C:/xampp/htdocs/TW2021/proiectTW", 'http://192.168.1.7/TW2021/proiectTW');
            console.log(newLink);
            linkQR = newLink;
        }

        ajax.call(this, '../php/insertDatabase.php', fd, callback);
    }

    document.getElementById('bttn').addEventListener('click', bindEvents);

});

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
    reader.onloadend = function (event) {
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

async function downloadCard() {

    // Convert canvas to image
    canvas = document.getElementById("myCanvas");
    let dataURL = canvas.toDataURL("image/jpg", 1.0);
    await downloadImage(dataURL, 'my-canvas.jpg');
}

async function downloadImage(data, filename = 'untitled.jpeg') {
    let a = document.createElement('a');
    a.href = data;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
}

async function sendLink() {
    canvas = document.getElementById("myCanvas");
    //  let dataURL = canvas.toDataURL("image/jpg", 1.0);
    qrcode = new QRCode(document.getElementById("qrcode"), {
        width: 500,
        height: 500

    });
    //document.getElementById("imageLink").innerHTML = linkQR;
    qrcode.makeCode(linkQR);
}
