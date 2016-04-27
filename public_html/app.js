colegioApp = {};

function onClickColegio() {
	alert("holo");
}

function actualizarColegios(cols) {
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
				elemAppend(elem("th"), text("Dependencia")),
				elemAppend(elem("th"), text("Año aplicación")),
				elemAppend(elem("th"), text("Nivel")),
				elemAppend(elem("th"), text("Puntaje")));

	for (var i = 0; i < cols.length; i++) {
		var row = table.insertRow(-1);
		var cellNombre = row.insertCell(0);
		var cellNombreDirector = row.insertCell(1);
		var cellNombreSostenedor = row.insertCell(2);
		var cellDinero = row.insertCell(3);
		var cellDep = row.insertCell(4);
		var cellAnno = row.insertCell(5);
		var cellNivel = row.insertCell(6);
		var cellPtje = row.insertCell(7);
		var datos = cols[i];

		cellNombre.appendChild(text(datos[1]));
		cellNombreDirector.appendChild(text(datos[2]));
		cellNombreSostenedor.appendChild(text(datos[3]));
		cellDinero.appendChild(text(datos[6]));
		cellDep.appendChild(text(datos[7]));
		cellAnno.appendChild(text(datos[10]));
		cellNivel.appendChild(text(datos[9]));
		cellPtje.appendChild(text(datos[8]));

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
		"mensualidad.descripcion, dependencia.descripcion, " +
		"AplicaciónPrueba.puntaje, Nivel_Prueba.nivel, AplicaciónPrueba.año FROM colegio " +
		"INNER JOIN mensualidad ON mensualidad.id=colegio.idMensualidad " +
		"INNER JOIN dependencia ON dependencia.id=colegio.idDependencia " +
		"INNER JOIN AplicaciónPrueba ON AplicaciónPrueba.idColegio=colegio.id "+
		"INNER JOIN Nivel_Prueba ON Nivel_Prueba.id=AplicaciónPrueba.nivel");

		console.log(contents[0]);
		colegioApp.datosColegios = contents[0];

		// Ordenar colegios según nombre
		actualizarDatos();
	};
	xhr.send();
}

function actualizarFiltro(arr) {
  var tipo_colegio = elemById("tipoCol").value;
  var val_colegio = elemById("valor").value;
  var nivel = elemById("nivelPrueba").value;
  var anno = elemById("annoPrueba").value;
  return arr.filter(function (el){
    var filtro1 = true;
    var filtro2 = true;
    var filtro3 = true;
    var filtro4 = true;
    if (tipo_colegio!=0)
      filtro1 = (el[5] == tipo_colegio)

    if (val_colegio!=0)
      filtro2= (el[4] == val_colegio)
    if (nivel!=0)
      filtro3= (el[9] == nivel)
    if (anno!=0)
      filtro4= (el[10] == anno)
    return filtro1 && filtro2 && filtro3 && filtro4;
  });
}

function ordenarColegios(arr) {
  var key = elemById("criterioOrden").value;
	arr.sort(function(a, b) {
		if (typeof a[key] == 'string')
			return a[key].localeCompare(b[key]);
		else
			return a[key] - b[key]
	});
	console.log("Ordenando criterios segun columna: ", key);
}

function actualizarDatos() {
  var arr = colegioApp.datosColegios.values.slice();
  ordenarColegios(arr);

	var farr = actualizarFiltro(arr)
  actualizarChart(farr);
	actualizarColegios(farr);
}



$(function() {
	//----- OPEN
	$('[data-popup-open]').on('click', function(e)  {
		var targeted_popup_class = jQuery(this).attr('data-popup-open');
		$('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

		e.preventDefault();
	});

	//----- CLOSE
	$('[data-popup-close]').on('click', function(e)  {
		var targeted_popup_class = jQuery(this).attr('data-popup-close');
		$('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

		e.preventDefault();
	});
});