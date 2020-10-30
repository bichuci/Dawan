var canvas = document.getElementById('test');

if(canvas.getContext)
{
    var ctx = canvas.getContext('2d');

    // ctx.fillStyle = 'rgb(200,0,0)';
    // ctx.fillRect(300, 300,40,50);

    // Triangle
    // ctx.beginPath();
    // ctx.moveTo(60,30);
    // ctx.lineTo(75,60);
    // ctx.lineTo(40,25);
    // ctx.fill();

    // rond

    // for (i = 0; i < 4; i++)
    // {
    //     for(j = 1 ; j < 3; j++)
    //     {
    //         ctx.beginPath();
    //         var x = 25 + j * 50;
    //         var y = 25 + i * 50;
    //         var rayon = 20;
    //         var angleInitial = 0;
    //         var angleFinal = Math.PI + (Math.PI * j)/2.5;
    //         var antihoraire = i%2 !=0;

    //         ctx.arc(x , y ,rayon, angleInitial, angleFinal, antihoraire)
    //         ctx.stroke();
    //     }
    // }

    // Courbe quadratique et béziers
    ctx.beginPath();
    ctx.moveTo(75,25);
    ctx.quadraticCurveTo(25,25,25,62.5);
    ctx.quadraticCurveTo(25,100,50,100);
    ctx.quadraticCurveTo(50,120,30,125);
    ctx.quadraticCurveTo(60,120, 65, 100);
    ctx.quadraticCurveTo(125,100,125,62.5);
    ctx.quadraticCurveTo(125 , 25 , 75, 25   );
    ctx.font = "15px Arial";
    ctx.fillText("Bonjour!", 45, 70);
    ctx.stroke();

}


