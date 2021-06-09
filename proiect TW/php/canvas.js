let greeting_text, font_colour, back_colour, font_text, font_size, canvas, ctx, model, checked;
let text_x, text_y;
let image_x, image_y, image_width, image_height;

async function setModel(selectTag){
    model = selectTag.options[selectTag.selectedIndex].value;
}

async function getFont(selectTag){
    font_text = selectTag.options[selectTag.selectedIndex].value;
}

async function getFontSize(selectTag){
    font_size = selectTag.options[selectTag.selectedIndex].value;
}

async function preview() {
    if(model === "1" || model === "3"){
        document.getElementById("canvas-content").innerHTML = `<canvas id="myCanvas" width="500" height="600"
            style="border:1px solid #d3d3d3;">`;
    }
    else{
        document.getElementById("canvas-content").innerHTML = `<canvas id="myCanvas" width="800" height="500"
            style="border:1px solid #d3d3d3;">`;
    }

    canvas = document.getElementById("myCanvas");
    ctx = canvas.getContext("2d");

    greeting_text = document.getElementById("greeting_text").value;
    font_colour = document.getElementById("font_color").value;
    back_colour = document.getElementById("back_color").value;
    checked = document.getElementById("checkbox");
    if(model === "3"){
        image_x = 140;
        image_y = canvas.height/2;
        image_width = 200;
        image_height = 200;
        text_x = 50;
        text_y = 150;
    }else if(model === "4"){
        image_x = 300;
        image_y = canvas.height/2;
        image_width = 200;
        image_height = 200;
        text_x = 160;
        text_y = 150;
    }

    // console.log(font_colour);
    // console.log(font_size);
    // console.log(font_text);
    // console.log(greeting_text);
    if(model === "1"){
        image_x = 140;
        image_y = 50;
        image_width = 200;
        image_height = 200;
        text_x = 50;
        text_y = canvas.height/2 + 100;
    }else if(model === "2"){
        image_x = 300;
        image_y = canvas.height/2;
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

    const preview = document.getElementById('canvas-content');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();
    reader.addEventListener("load", function () {
        // convert image file to base64 string
        const image = new Image();
        image.src = reader.result;
        var sth = new Image();
        sth.onload = function () {
                ctx.drawImage(sth, image_x, image_y, image_width, image_height);
        };
        sth.src = reader.result;
        preview.src = reader.result;
    }, false);
    if (file) {
        reader.readAsDataURL(file);
    }
}


async function save() {

    // Convert canvas to image
    canvas = document.getElementById("myCanvas");
        let dataURL = canvas.toDataURL("image/jpg", 1.0);
        await downloadImage(dataURL, 'my-canvas.jpg');
}

// Save | Download image
async function downloadImage(data, filename = 'untitled.jpeg') {
    let a = document.createElement('a');
    a.href = data;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
}

async function sendLink(){
    canvas = document.getElementById("myCanvas");
    let dataURL = canvas.toDataURL("image/jpg", 1.0);
    document.getElementById("canvas-content").innerHTML =dataURL; //cineva sa se ocupe de css
}