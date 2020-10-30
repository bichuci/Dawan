jQuery( ($) => {
    $("#progressLaunch").click( () => {
        $("#myBar").addClass("progress-bar-animated");
        let i = 0;
        let limit = 100;

        function loop(){
            i += Math.floor(Math.random()*10) ;
            $("#myBar").css("width", i+"%");
            if(i < limit)
            {
                setTimeout(loop, 500);
            }
            else
            {
                $("#myBar").css("width", "100%");
                $("#myBar").removeClass("progress-bar-animated");
            }
        }
        loop();
    });

    $("#progressReset").click( () => {
        $("#myBar").addClass("progress-bar-animated");
        let i = 100;
        let limit = 0;

        function loop(){
            i -= Math.floor(Math.random()*10) ;
            $("#myBar").css("width", i+"%");
            if(i > limit)
            {
                setTimeout(loop, 500);
            }
            else
            {
                $("#myBar").css("width", "0%");
                $("#myBar").removeClass("progress-bar-animated");
            }
        }
        loop();
    });

    $(".showMod").click(function(){
        console.log($(this).data("id"));   
    });
});