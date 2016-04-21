colegioApp = {};
function clearNode(nodo) {
	while (nodo.firstChild) {
		nodo.removeChild(nodo.firstChild);
	}
};


function updateColegios(cols) {
	var nodo = document.getElementById("colegios");
	clearNode(nodo);

	var ul = document.createElement("ul");
	nodo.appendChild(ul);

	for (var i = 0; i < cols.length; i++) {
		var li = document.createElement("li");
		var tn = document.createTextNode(cols[i][0]);
		console.log(cols[i]);
		li.appendChild(tn);
		ul.appendChild(li);
		
	}
}

function cargarDB() {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', './colegios.sqlite', true);
	xhr.responseType = 'arraybuffer';

	xhr.onload = function(e) {
	  var uInt8Array = new Uint8Array(this.response);
		colegioApp.db = new SQL.Database(uInt8Array);
	  var contents = colegioApp.db.exec("SELECT nombreColegio FROM colegio");

		console.log(contents[0]);
		updateColegios(contents[0].values);
	};
	xhr.send();
}
