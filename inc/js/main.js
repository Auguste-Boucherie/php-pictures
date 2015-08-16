$(document).ready(function () {

	$(".contentlogin").addClass("display");
	$(".contentlogin3").addClass("display");
	$(".click1").click(function() {
        $(".contentlogin").removeClass("display");
        $(".contentlogin2").addClass("display");
        $(".contentlogin3").addClass("display");
    });

    $(".click2").click(function() {
        $(".contentlogin").addClass("display");
        $(".contentlogin2").removeClass("display");
        $(".contentlogin3").addClass("display");
    });

    $(".click3").click(function() {
        $(".contentlogin").addClass("display");
        $(".contentlogin2").addClass("display");
        $(".contentlogin3").removeClass("display");
    });
});