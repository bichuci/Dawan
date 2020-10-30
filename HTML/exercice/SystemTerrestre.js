var sun = new Image();
var moon = new Image();
var earth = new Image();

// On initie le canvas avec les images 
function init()
{
    sun.src ="https://mdn.mozillademos.org/files/1456/Canvas_sun.png";
    moon.src="https://mdn.mozillademos.org/files/1443/Canvas_moon.png";
    earth.src="https://mdn.mozillademos.org/files/1429/Canvas_earth.png";

    // On éxecute la fonction draw en indiquant au navigateur ce que l'on souhaite
    window.requestAnimationFrame(draw);
}

function draw()
{
    // On instancie le canvas
    var ctx = document.getElementById('canvas').getContext('2d');
    ctx.globalCompositeOperation = "destination-over";

    // On efface le canvas
    ctx.clearRect(0, 0, 300, 300);
    ctx.fillStyle = 'rgba(0,0,0,0.4)';
    ctx.strokeStyle = 'rgba(0,153,255,0.4)';
    ctx.save();  // On sauvegarde le canvas
    ctx.translate(150,150);

    // Terre
    var time = new Date();
    ctx.rotate(((2*Math.PI)/60)*time.getSeconds() + ((2*Math.PI)/60000)*time.getMilliseconds());
    ctx.translate(105,0);
    ctx.fillRect(0,-12,50,24); // Ombre
    ctx.drawImage(earth, -12, -12);

    //Lune
    var time = new Date();
    ctx.rotate(((2*Math.PI)/6)*time.getSeconds() + ((2*Math.PI)/ 6000)*time.getMilliseconds());
    ctx.translate(0,0.28);
    ctx.drawImage(moon, 15  ,15);
   // ctx.restore();


    ctx.restore(); // On restaure la sauvegarde du canvas par défaut

    ctx.beginPath();
    ctx.arc(150,150,105,0,Math.PI*2,false);
    ctx.stroke();

    ctx.drawImage(sun, 0, 0,  300,300);
    window.requestAnimationFrame(draw);
}

init();