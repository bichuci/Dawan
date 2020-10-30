window.addEventListener("DOMContentLoaded", (event) => {
    var tooltipTimeout;

    $("#someelem").hover(function()               {
        tooltipTimeout = setTimeout(showTooltip, 800);
    },hideTooltip);

    function showTooltip()
        {
 
        var tooltip = $("<div id='tooltip' class='tooltip'>I'm the tooltip!</div>");
        tooltip.appendTo($("#someelem"));
        }

    function hideTooltip()
        {
        clearTimeout(tooltipTimeout);
        $("#tooltip").fadeOut().remove();
        }

    });