function getClasses(url){
	document.getElementById('disciplinas').addEventListener('change', function(){
		var xhttp = new XMLHttpRequest();

		var idDisc = this.options[this.selectedIndex].dataset.id;

		xhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
		  	var options = document.getElementById('turmas');

		    var response = JSON.parse(this.responseText);

		    while (options.firstChild) {
		    	options.firstChild.remove();
		    }

		    for (i = 0; i < response.turmas.length; i++) {
		    	var option = document.createElement('option');

		    	option.innerText = response.turmas[i].cod;

		    	options.appendChild(option);
		    }
		  }
		};

		xhttp.open("POST", url, true);
		xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhttp.send('idDisc=' + idDisc);
	})
}
