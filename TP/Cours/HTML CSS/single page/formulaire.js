
(function(){

	var params = location.search
	params = params.replace("?", "")
	params = params.split("&")

	document.getElementById("message").innerHTML = "Votre login est " + params[0].replace("login=", "").replace("+", " ") + " et votre mot de passe est " + params[1].replace("password=", "").replace("+", " ")

})()
