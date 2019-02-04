var i = 1

var somme = 0

while(i <= 10) {
	somme += i
	i++
}

document.getElementById('somme').innerHTML = "la somme des chiffres compris entre 1 et 10 est " + somme

var decompte = ""

for (var a = 10; a > 0; a--) {
	decompte += a + " "
}

document.getElementById('decompte').innerHTML = decompte + 'Hello World'
