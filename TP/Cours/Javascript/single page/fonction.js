function compare(a, b) {
	if (a > b) {
		return a + ' est supérieur à ' + b
	} else if (a < b ) {
		return b + ' est supérieur à ' + a
	} else {
		return 'Le nombre ' + a + ' est égale au nombre ' + b
	}
}

document.write('<p class="text-center">' + compare(5, 6) + '</p>')


function myDate() {
	var date = new Date()

	var jour = date.getDay() + 1
	switch (jour) {
		case 0:
			jour = 'Dimanche'
			break
		case 1:
			jour = 'Lundi'
			break
		case 2:
			jour = 'Mardi'
			break
		case 3:
			jour = 'Mercredi'
			break
		case 4:
			jour = 'Jeudi'
			break
		case 5:
			jour = 'Vendredi'
			break
		case 6:
			jour = 'Samedi'
			break
	}
	var journum = date.getDate()
	var mois = date.getMonth() + 1
	switch (mois) {
		case 0:
			mois = 'Janvier'
			break
		case 1:
			mois = 'Février'
			break
		case 2:
			mois = 'Mars'
			break
		case 3:
			mois = 'Avril'
			break
		case 4:
			mois = 'Mai'
			break
		case 5:
			mois = 'Juin'
			break
		case 6:
			mois = 'Juillet'
			break
		case 7:
			mois = 'Août'
			break
		case 8:
			mois = 'Septembre'
			break
		case 9:
			mois = 'Octobre'
			break
		case 10:
			mois = 'Novembre'
			break
		case 11:
			mois = 'Décembre'
			break
	}
	var annee = date.getFullYear()
	var heure = date.getHours()
	var minute = date.getMinutes()

	return jour + ' ' +  journum + ' ' + mois + ' ' + annee + ' ' + heure + 'h' + minute
}

document.write('<p class="text-center">' + myDate() + '</p>')


function addElement() {
	var div = document.write("<div class='text-center' id='mydiv'>Salut je suis un div créé en JS!</div>")
	var button = document.write("<p class='text-center'><button type='button' id='btn' class='btn btn-outline-info'>Cacher</button></p>")
	document.getElementById("btn").onclick = function() {
		var pdiv = document.getElementById("mydiv")
		var btn = document.getElementById("btn")
		if(pdiv.classList.contains("d-none") == false) {
			pdiv.classList.add("d-none")
			btn.innerHTML = "Afficher"
		} else {
			pdiv.classList.remove("d-none")
			btn.innerHTML = "Cacher"
		}
	}
}

addElement()