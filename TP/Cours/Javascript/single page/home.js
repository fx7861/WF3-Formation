var nombre = 10

if (nombre >= 8 && nombre <= 12) {
	alert('le nombre ' + nombre + ' est compris entre 8 et 12')
} else {
	alert("le nombre " + nombre + " n'est pas compris entre 8 et 12")
}

switch (nombre) {
	case 1:
		alert('Janvier')
		break
	case 2:
		alert('Février')
		break
	case 3:
		alert('Mars')
		break
	case 4:
		alert('Avril')
		break
	case 5:
		alert('Mai')
		break
	case 6:
		alert('Juin')
		break
	case 7:
		alert('Juillet')
		break
	case 8:
		alert('Août')
		break
	case 9:
		alert('Septembre')
		break
	case 10:
		alert('Octobre')
		break
	case 11:
		alert('Novembre')
		break
	case 12:
		alert('Décembre')
		break
	default :
		alert("ce n'est pas un mois")
		break
}

document.getElementById('submit').onclick = function () {
	var valeur_input = document.getElementById("untext").value
	var colors = ['red', 'blue', 'pink', 'green', 'green', 'grey', 'black', 'brown', 'deepskyblue']

	if (valeur_input && colors.indexOf(valeur_input) != -1) {
		document.body.style.backgroundColor = valeur_input	
	} else {
		document.body.style.backgroundColor = 'white'	
	}
}
