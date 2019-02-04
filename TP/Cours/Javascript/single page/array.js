var tableau = ["Pierre", "Papier", "Ciseaux"]

tableau.push("Puit!")

tableau.splice(1,1, "Feuille")

console.log(tableau.join(", "))

tableau.unshift("Go")

tableau.pop()

console.log(tableau)

tableau.reverse()

console.log(tableau)

document.getElementById("data-personnel").onclick = function() {
	var nom = document.querySelector('input#nom').value
	var prenom = document.querySelector('input#prenom').value
	var tel = document.querySelector('input#tel').value
	var email = document.querySelector('input#email').value
	var message = document.getElementById('message')


	if (
		nom != "" &&
		prenom != "" &&
		(tel != "" && tel.search(/^[0-9]{10}$/) != -1) &&
		(email != "" && email.search(/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}$/) != -1)
	) {
		var tableau = {
			"nom" : nom,
			"prenom" : prenom, 
			"tel" : tel, 
			"email" : email
		}

	console.log(tableau)
		if (message.classList.contains("alert-danger")) {
			message.classList.remove("alert-danger")
		}
		message.classList.add("alert-success")
		var html = ""
		html += "<h3 class='text-center'>le tableau de données</h3>"
		html += "<table style='margin:auto;'>"
		html += "<tr>"
		html += "<td class='pr-4'>Nom</td>"
		html += "<td>" + tableau["nom"] + "</td>"
		html += "</tr>"
		html += "<tr>"
		html += "<td class='pr-4'>Prenom</td>"
		html += "<td>" + tableau["prenom"] + "</td>"
		html += "</tr>"
		html += "<tr>"
		html += "<td class='pr-4'>Téléphone</td>"
		html += "<td>" + tableau["tel"] + "</td>"
		html += "</tr>"
		html += "<tr>"
		html += "<td class='pr-4'>Email</td>"
		html += "<td>" + tableau["email"] + "</td>"
		html += "</tr>"
		html += "</table>"
		message.innerHTML = html
	} else {
		if (message.classList.contains("alert-success")) {
			message.classList.remove("alert-success")
		}
		message.classList.add("alert-danger")
		message.innerHTML = "<p class='text-center m-0'>Merci de remplir tous les champs indiqués par <span style='color:red;'>*</span></p>"
	}

}