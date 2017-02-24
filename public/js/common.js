/**
 * display close icon and close div
 *
 * @param  string div - div #id selector (e.g. #float-div-left)
 * @param  string xitem - span .class selector (e.g. .close-item)
 * @return void
 */
function close_div(div, xitem)
{
    // display close icon or not
    $(div).mouseover(function() {
        $(div + " " + xitem).css("display", "block");
        //console.log("mouseover");
    }).mouseout(function() {
        $(div + " " + xitem).css("display", "none");
        //console.log("mouseout");
    });

    // close div
    $(div + " " + xitem).click(function() {
        $(div).css("display", "none");
    });
}
