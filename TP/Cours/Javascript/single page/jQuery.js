/* evite le conflit avec d'autre librairie qui utilise elle meme le $

var j = jQuery.noConflict();

j(document).ready(function(){
	console.log("bonjour")
})*/


$(document).ready(function(){
	$("div").children("p").append("je suis le fils de la div <br>")
	$("div p").append("bonjour <br>")
	//$(".maclasse").append("bonjour <br>")
	//$("#id-test").append("bonjour <br>")
	$("img[alt]").hide()

	$("p").each(function(i) {
		$(this).text('mon text numero ' + (i + 1))
	})

	var p  = $("p").length;
	console.log(p)

	var pa  = $("p").eq(0);
	console.log(pa)

	if ($("p").hasClass("maclasse")) {
		console.log("ok p a la classe")
	} else {
		console.log("aucun p n'a la classe")
	}

	$("div p").addClass('jaune')
	$("p").removeClass('text') //exemple
	$("input").val()
	console.log($("div").html())
	console.log($("div").text())
	$("div p").before("<span class='mr-2'><<</span>")
	$("div p").after("<span class='ml-2'>>></span>")
	console.log($("div p").width())
	$("div p").width("200px")
	console.log($("div p").width())
	$("div p").on("click", function(e){
		console.log("click " + e)
	})
	$("div p").hover(function(e){
		console.log("hover " + e)
	})
	//$("div p").animate({opacity:0}, 2000, function(){$("div p").animate({opacity:1}, 2000)})
	$("div p").fadeOut(2000, function(){
		$("div p").fadeIn(2000, function(){
			$("img[alt]").addClass("position")
			$("img[alt]").slideDown(2000)
		})
	}) //fait disparaitre avec fadeout (display none) puis réaparition avec fadeIn

})
