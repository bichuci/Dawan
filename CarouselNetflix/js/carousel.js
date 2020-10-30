window.addEventListener("DOMContentLoaded", function (event){
    var timer;
    $(".card").mouseenter(function () {
        var that = this
        timer = setTimeout(function(){
            $(that).children('.panel-collapse').fadeIn();
        }, 1000);     
    
});
    $(".card").mouseleave(function(){
        clearTimeout(timer);
        $(this).children('.panel-collapse').fadeOut();
});
});


