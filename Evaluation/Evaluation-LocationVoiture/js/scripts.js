$(document).ready(function(){
	$(".btn-menu").click(function(){
		if ($("#menu").hasClass("menu")) {
			$("#menu").removeClass("menu")
			$("#menu").addClass("menu-style")
		} else {
			$("#menu").removeClass("menu-style")
			$("#menu").addClass("menu")
		}
	})

	$('.owl-carousel').owlCarousel({
	    loop:true,
	   	items:1
	})
});