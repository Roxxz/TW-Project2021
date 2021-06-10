let greeting_text, font_colour, back_colour, font_text, font_size, canvas, ctx, model, checked;
let text_x, text_y;
let image_x, image_y, image_width, image_height;
let qrcode, linkQR;

async function setModel(selectTag) {
    model = selectTag.options[selectTag.selectedIndex].value;
}

async function getFont(selectTag) {
    font_text = selectTag.options[selectTag.selectedIndex].value;
}

async function getFontSize(selectTag) {
    font_size = selectTag.options[selectTag.selectedIndex].value;
}


async function preview() {
    if (model === "1" || model === "3") {
        document.getElementById("canvas-content").innerHTML = `<canvas id="myCanvas" width="500" height="600"
            style="border:1px solid #d3d3d3;">`;
    } else {
        document.getElementById("canvas-content").innerHTML = `<canvas id="myCanvas" width="800" height="500"
            style="border:1px solid #d3d3d3;">`;
    }

    canvas = document.getElementById("myCanvas");
    ctx = canvas.getContext("2d");

    greeting_text = document.getElementById("greeting_text").value;
    font_colour = document.getElementById("font_color").value;
    back_colour = document.getElementById("back_color").value;
    checked = document.getElementById("checkbox");
    if (model === "3") {
        image_x = 140;
        image_y = canvas.height / 2;
        image_width = 200;
        image_height = 200;
        text_x = 50;
        text_y = 150;
    } else if (model === "4") {
        image_x = 300;
        image_y = canvas.height / 2;
        image_width = 200;
        image_height = 200;
        text_x = 160;
        text_y = 150;
    }

    if (model === "1") {
        image_x = 140;
        image_y = 50;
        image_width = 200;
        image_height = 200;
        text_x = 50;
        text_y = canvas.height / 2 + 100;
    } else if (model === "2") {
        image_x = 300;
        image_y = canvas.height / 2;
        image_width = 200;
        image_height = 200;
        text_x = 160;
        text_y = 150;
    }

    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = back_colour;
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.font = font_size.concat(font_text);
    ctx.fillStyle = font_colour;
    ctx.fillText(greeting_text, text_x, text_y);

    var width = window.innerWidth;
    var height = window.innerHeight;

    var stage = new Konva.Stage({
        container: 'canvas-content',
        width: width,
        height: height,
    });


    var layer = new Konva.Layer();
    stage.add(layer);
    // use external library to parse and draw gif animation

    stage.container().style.backgroundColor = back_colour;
    var text = new Konva.Text({
        x: 10,
        y: 15,
        text: greeting_text,
        fontSize: 30,
        fontFamily: font_text,
        fill: font_colour
    });
    layer.add(text);
    layer.draw();


    const preview = document.getElementById('canvas-content');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();
    reader.addEventListener("load", function () {


        var imgGroup = new Konva.Group({
            x: 500,
            y: 200,
            draggable: false
        });
        layer.add(imgGroup);

        // darth vader
        let img = new Konva.Image({
            width: 200,
            height: 200
        });
        imgGroup.add(img);

        var imageObj1 = new Image();
        imageObj1.onload = function () {
            img.image(imageObj1);
            layer.draw();
        };
        imageObj1.src = reader.result;
        console.log(reader.result);
    }, false);
    if (file) {
        reader.readAsDataURL(file);
    }

    function onDrawFrame(ctx, frame) {
        // update canvas size
        ctx.drawImage(frame.buffer, 0, 0);
        // redraw the layer
        layer.fillStyle = back_colour;
        layer.draw();
    }

    gifler('../assets/duck.gif').frames(canvas, onDrawFrame);
    // draw resulted canvas into the stage as Konva.Image
    var image = new Konva.Image({
        image: canvas,
    });
    layer.add(image);
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
