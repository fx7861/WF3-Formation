var lists = ["Lundi", "Mardi", "Mercredi", "jeudi", "Vendredi", "Samedi", "Dimanche"]

var list = document.getElementById("list")

function createList(){
	for (var i = 0; i <= lists.length - 1; i++) {
		var li = document.createElement("li")
		li.onclick = function (){  
			clickList(this)}
		li.innerHTML = lists[i]
		list.appendChild(li)
	}
}

createList()

function clickList(index) {
	var pr = prompt("C'est cadeau change ce que tu veux")
	if (pr != null && pr != "") {
		console.log(pr)
		var value =  index.innerHTML
		var iof = lists.indexOf(value)
		lists.splice(iof, 1, pr)
		list.innerHTML = ""
		createList()
 	}
}


var images = [

	"http://www.eyefoodfactory.com/1301-large_default/bad-mc-scrooge.jpg",
	"https://cdn.shopify.com/s/files/1/0377/2037/products/AU01-BL.Front_600x.progressive.jpg?v=1538772347",
	"https://image.jimcdn.com/app/cms/image/transf/none/path/saad650542b6fffcf/image/ib174439917e1a8dd/version/1468850562/image.png",
	"http://www.icône.com/images/icones/9/6/pictograms-hazard-signs-irritant.png",
	"http://www.les-mathematiques.net/phorum/addon.php?34,module=embed_images,file_id=24501",
	"https://i.pinimg.com/originals/e8/d7/d8/e8d7d80a5dd3ef6a112917d0b0dbb5ec.jpg",
	"https://www.artmajeur.com/medias/standard/s/k/skepa/artwork/10243597_skepa-carre-d-as-brainstorming-bonestorming-brutality-2017.jpg"
	
]

var divSlider = document.getElementById("slider")
var imageSlider = document.createElement("img")
imageSlider.id = "image-slider"
imageSlider.src = images[0]
divSlider.appendChild(imageSlider)
var image = document.getElementById("image-slider")
setInterval(slider, 5000)

var compteur = 0

function slider() {
	image.src = ""
	if (compteur < images.length - 1) {
		compteur++
		image.src = images[compteur]
	} else {
		compteur = 0
		image.src = images[compteur]
	}
}

document.getElementById("gauche").onclick = function() {
	image.src = ""
	image.style.transition = "all 1s"
	if (compteur < images.length && compteur > 0) {
		compteur--
		image.src = images[compteur]
		
	} else {
		compteur = images.length - 1
		image.src = images[compteur]
	}
}

document.getElementById("droite").onclick = function() {
	image.src = ""
	image.style.transition = "all 1s"
	if (compteur < images.length -1) {
		compteur++
		image.src = images[compteur]
	} else {
		compteur = 0
		image.src = images[compteur]
	}
}


var Pierre = new Homme("Dupond", "Pierre", "Homme", 33, ['HTML', 'Javascript', 'CSS', 'PHP']);
var TanSylvie = new Homme("Dupond", "Louise", "Femme", 33, ['chanter', 'danser', 'boire']);

function Homme(nom,prenom,sexe,age,interets){
	this.nom = nom;
	this.prenom = prenom;
	this.sexe = sexe;
	this.age = age;
	this.interets = interets;
	this.bio = function(){
		if (this.sexe == 'Homme') {
			document.write("Je m'appelle " + this.nom + " " + this.prenom + ", je suis un " + this.sexe + " de " 
				+ this.age + " ans " + "... et il aime le " + this.interets.join(', ') + '<br>');
		} else {
			document.write("Je m'appelle " + this.nom + " " + this.prenom + ", je suis une " + this.sexe + " de " 
				+ this.age + " ans " + "... et elle aime " + this.interets.join(', ') + '<br>');
		}
	}
}

Pierre.bio();
TanSylvie.bio();

function Produit(thumb, nom, taille, prix, description) {
	this.thumb = thumb
	this.nom = nom
	this.taille = taille
	this.prix = prix
	this.description = description

	this.afficheProduit = function (){

		// Balise article regroupant le tout
		var article = document.createElement('article')

		// Balise div image
		var divImage = document.createElement('div')
		divImage.id = "image"
		var i = document.createElement("img")
		i.src = this.thumb
		i.alt = this.nom
		i.style.width = "100%"
		divImage.appendChild(i)

		//ajout de la balise image dans l'article
		article.appendChild(divImage)

		// Balise div menu
		var divMenu = document.createElement('div')
		divMenu.id = "menu"
			
		var title = document.createElement("h2")
		title.innerHTML = this.nom.toUpperCase()
		divMenu.appendChild(title)
			
		var price = document.createElement("p")
		price.innerHTML = this.prix + " €"
		price.style.fontWeight = "bold"
		price.style.fontSize = "1.1em"
		price.style.padding = "10px 0"
		price.style.borderBottom = "1px solid #f1f1f1"
		divMenu.appendChild(price)

		var divSize = document.createElement("div")
		var text = document.createElement("p")
		text.innerHTML = "Size [MM]"
		text.style.fontWeight = "bold"
		text.style.fontSize = "0.9em"
		var size =document.createElement("p")
		size.style.width = "40px"
		size.style.height = "40px"
		size.style.marginLeft = "10px"
		size.style.lineHeight = "38px"
		size.style.textAlign = "center"
		size.style.backgroundColor = "#F7F8F9"
		size.style.borderRadius = "50%"
		size.style.border = "1px solid black"
		size.innerHTML = this.taille
		divSize.appendChild(text)
		divSize.appendChild(size)
		divMenu.appendChild(divSize)

		var button = document.createElement("button")
		button.type = "button"
		button.classList.add("btn-black")
		button.innerHTML = 'add to cart'
		divMenu.appendChild(button)

		var d = document.createElement("p")
		d.innerHTML = this.description
		d.style.marginTop = "25px"
		d.style.color = "#5C5C5C"
		d.style.fontWeight = "bold"
		d.style.fontSize = "13px"
		d.style.lineHeight = "23px"
		d.style.letterSpacing = "0.5px"
		d.style.marginTop = "25px"
		divMenu.appendChild(d)

		//ajout div menu dans l'article
		article.appendChild(divMenu)

		//ajout de l'article dans body
		document.body.appendChild(article)
	}

}

/*var thumb = "https://cdn.shopify.com/s/files/1/0377/2037/products/AU01-BL.Front_600x.progressive.jpg?v=1538772347"
var nom = "jet noir"
var taille = 41
var prix = 300
var description = "The Jet Noir takes on a sharp black and silver colorway, pulled from jet black leathers in California modern design. Italian tanned leather straps, a matte face and domed crystal complete this 41mm stainless steel case. A special exhibition case back reveals the dynamic intricacies of the automatic movement."
*/
var product = new Produit("https://cdn.shopify.com/s/files/1/0377/2037/products/AU01-BL.Front_600x.progressive.jpg?v=1538772347", 
	"jet noir", 
	41, 
	300, 
	"The Jet Noir takes on a sharp black and silver colorway, pulled from jet black leathers in California modern design. Italian tanned leather straps, a matte face and domed crystal complete this 41mm stainless steel case. A special exhibition case back reveals the dynamic intricacies of the automatic movement."
).afficheProduit()

var product2 = new Produit("http://cdn.shopify.com/s/files/1/0377/2037/products/AU01-DB.Front_1024x1024.progressive.jpg?v=1538772230",
	"BOURBON ROSE",
	41,
	300,
	"The Bourbon Rose takes on a rich brown and gold colorway, pulled from iconic wood tones of California modern design. Italian tanned leather straps, a matte face and domed crystal complete this 41mm stainless steel case. A special exhibition case back reveals the dynamic intricacies of the automatic movement."
).afficheProduit()