$(document).ready(function(){
	$(".menu-mobile").hide();
	 $(".toggle.menu").click(function(){
        $(".menu-mobile").slideToggle("slow");
        $(".toggle.menu").toggleClass("active");
    });
});