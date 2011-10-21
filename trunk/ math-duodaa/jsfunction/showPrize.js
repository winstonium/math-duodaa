function showPrize(prize) 
{
    var p = parseInt(prize);
    var show;

    if (p <= 0) { return (" "); }

    else {
        show = "<img src='images/gold_0.gif'/><small>"+prize+"</small>";
        return (show);
    }
}