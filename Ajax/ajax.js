function refresh() {
	var idarticle = 0
	$.ajax({
		url: "refresh.php",
		type: "POST",
		data: 'id=' + idarticle,
		success: function(reponse,status){
			if (status === "success") {
				console.log(reponse.id)
				$('#zonemessage').html(reponse.html)
				idarticle = reponse.idarticle
			}
		}
	})
}

$(document).ready(function(){

	var xhttp = new XMLHttpRequest();

	$('#btn-add').click(function(){ 
		var data = ""
		$('#form-article input').each(function(){
			data += $(this).attr("name")
			data += '='
			data += $(this)[0].value
			data += '&'
		})
		var datas = data.substr(0, data.length-1)
		//jQuery:
		var temp = $('#zonemessage').html()
		$.ajax({
			url: "insert.php",
			type: "POST",
			data: datas,
			success: function(reponse,status) {
				/*if (status === "success") {
					$('#zonemessage').html(reponse + temp)
					$('#form-article input').each(function(){
						$(this)[0].value = ""
					})
					location.reload(true)
				}*/
			}
		})
		/*
		//Javascript:
		var temp = document.getElementById('zonemessage').innerHTML
		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		       // Typical action to be performed when the document is ready:
		      document.getElementById('zonemessage').innerHTML = this.responseText + temp;
		    }
		};
		xhttp.open("POST", "insert.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(datas);*/
	})

	$('#btn-users').click(function(){ 
		var data = ""
		$('#form-login input').each(function(){
			data += $(this).attr("name")
			data += '='
			data += $(this)[0].value
			data += '&'
		})
		var datas = data.substr(0, data.length-1)
		//Jquery:
		$.ajax({
			url: "users.php",
			type: "POST",
			data: datas,
			success: function(reponse, status) {
				console.log(reponse, status)
				if (status === "success") {
					if (reponse == 'true') {
						window.location = "formulaire.php"
					} else {
						window.location = "index.php"
					}
				}
			}
		})

		/*
		//Javascript:
		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		       // Typical action to be performed when the document is ready:
		    	var reponse = this.responseText;
		    	if(reponse === 'true') {
					window.location = "formulaire.php";
				} else {
					//normalement redirection sur page login mais dans tout les cas passera sur la page formulaire.php
					window.location = "index.php";
				}
		    }
		};
		xhttp.open("POST", "users.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(datas);*/

	})

	



})
