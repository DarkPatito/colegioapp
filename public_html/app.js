colegioApp = {};

function onClickColegio() {
	// Mostrar ficha.
}

function updateColegios(cols) {
	var nodo = elemById("colegios");
	clearNode(nodo);

	var table = elem("table");
	nodo.appendChild(table);

	var thead = table.createTHead();
	var trow = thead.insertRow(-1);

	elemAppend(trow,
				elemAppend(elem("th"), text("Nombre")),
				elemAppend(elem("th"), text("Director(a)")),
				elemAppend(elem("th"), text("Sostenedor(a)")),
				elemAppend(elem("th"), text("Coste")),
				elemAppend(elem("th"), text("Dependencia")));

	for (var i = 0; i < cols.length; i++) {
		var row = table.insertRow(-1);
		var cellNombre = row.insertCell(0);
		var cellNombreDirector = row.insertCell(1);
		var cellNombreSostenedor = row.insertCell(2);
		var cellDinero = row.insertCell(3);
		var cellDep = row.insertCell(4);
		var datos = cols[i];

		cellNombre.appendChild(text(datos[1]));
		cellNombreDirector.appendChild(text(datos[2]));
		cellNombreSostenedor.appendChild(text(datos[3]));
		cellDinero.appendChild(text(datos[6]));
		cellDep.appendChild(text(datos[7]));

		row.addEventListener("click", function(e) {
			e.target.datos = datos;
			onClickColegio.bind(e.target).call();
		});
	}
}

function cargarDB() {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', './colegios.sqlite', true);
	xhr.responseType = 'arraybuffer';

	xhr.onload = function(e) {
	  var uInt8Array = new Uint8Array(this.response);
		colegioApp.db = new SQL.Database(uInt8Array);

		var contents = colegioApp.db.exec("SELECT colegio.id, nombreColegio, nombreDirector, nombreSostenedor, " +
		"idMensualidad, idDependencia, " +
		"mensualidad.descripcion, dependencia.descripcion FROM colegio " +
		"INNER JOIN mensualidad ON mensualidad.id=colegio.idMensualidad " +
		"INNER JOIN dependencia ON dependencia.id=colegio.idDependencia");

		console.log(contents[0]);
		colegioApp.datosColegios = contents[0];

		// Ordenar colegios según nombre
		ordenarColegios(1);
	};
	xhr.send();
}

function actualizarFiltro(f1,f2) {

return
}

function ordenarColegios(key) {
	var arr = colegioApp.datosColegios.values.slice();
	arr.sort(function(a, b) {
		if (typeof a[key] == 'string')
			return a[key].localeCompare(b[key]);
		else
			return a[key] - b[key]
	});
	console.log("Ordenando criterios segun columna: ", key);
	updateColegios(arr);
}
