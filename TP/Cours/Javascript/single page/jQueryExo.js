$(document).ready(function(){

	//Exercice 0
	var rectangle = $("#exercice0 article .rectangle")
	$("#exercice0 article .B1").click(function(){
		rectangle.height(rectangle.height()+10)
		if(rectangle.height() > 100) {
			rectangle.height("10px")
		}
	})

	$("#exercice0 article .B2").click(function(){
		rectangle.css("background", "green")
	})

	$("#exercice0 article .B3").click(function(){
		rectangle.css("background", "#eee")
	})

	$("#exercice0 article .B4").click(function(){
		rectangle.hide()
	})

	$("#exercice0 article .B5").click(function(){
		rectangle.show()
	})

	//Exercice 1

	$("#exercice1 article div").on("click", function(){
		$(this).hide()
	})

	//Exercice 2

	$("#exercice2 article .clic").on("click", function(){
		var frere = $(this).siblings('.cible')
		frere.toggle()
	})

	//Exercice 3

	$("#exercice3 article div:first-child").dblclick(function(){
		var frere = $("#exercice3 article div:last-child")
		if (frere.hasClass("highlight")) {
			frere.removeClass("highlight")
		} else {
			frere.addClass("highlight")
		}	
	})

	//Exercice 4

	$("#exercice4 article div:first-child").dblclick(function(){
		var frere = $("#exercice4 article div:last-child")
		frere.toggle()
	})

	//Exercice 5

	$("#exercice5 article div").hover(function(){
		$("#exercice5 article div").fadeOut(1000)
	}, function(){
		$("#exercice5 article div").fadeIn(1000)
	})

	//Exercice 6

	$("#exercice6 article div").hover(function(){
		$("#exercice6 article div").animate({opacity:.5}, 1000)
	}, function(){
		$("#exercice6 article div").animate({opacity:1}, 1000)
	})

	//Exercice 7

	$("#exercice7 article input").focus(function(){
		$("#exercice7 article div").hide()
	})

	$("#exercice7 article input").blur(function(){
		$("#exercice7 article div").show()
	})

	//Exercice 8
	
	$("#exercice8 article input").focus(function(){
		$("#exercice8 article div").show()
	})

	$("#exercice8 article input").blur(function(){
		$("#exercice8 article div").hide()
	})
})