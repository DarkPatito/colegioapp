<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">

	<title>Listado Colegios</title>


</head>

<body>

	<section class="loginform cf">
		<form name="login" method="POST" action="login.php" accept-charset="utf-8">
			<ul>
				<li>
					<label for="usermail">Email</label>
					<input type="email" id="usermail" name="usermail" placeholder="yourname@email.com" required>
				</li>
				<li>
					<label for="password">Password</label>
					<input type="password" id="password" name="password" placeholder="password" required></li>
					<li>
						<input type="submit" value="Login">
					</li>
				</ul>
			</form>
		</section>


		<div id="Content">
			<section class="cf">
				<div>
					<div id="formulario-orden">
						<!--nombre, tipo colegio ,sostenedor, mensualidad, puntaje -->
						<form>
            			    <label for="criterioOrden">Criterio para ordenar</label>
							<select name="criterioOrden" onchange="ordenarColegios(this.value)" id="criterioOrden" >
								<option value="1">Nombre del Colegio </option>
								<option value="2">Nombre del director</option>
								<option value="3">Nombre del Sostenedor</option>
								<option value="4">Valor de la mensualidad</option>
								<option value="5">Tipo de colegio</option>
								<option value="puntaje">Puntaje SIMCE</option>
							</select>
						</form>

					</div>
					<div id="colegios">
						<h3>Cargando...</h3>
					</div>

					<div id="ficha">
					</div>

					<div>
						<h3>Filtrar</h3>
						<hr>


						<form onchange="actualizarFiltro(tipo_col.value,valor.value)" id="filterform">
							<table style="width:100%">
								<td>
									<label for="tipo_col">Tipo de colegio</label>
									<select name="tipo_col" id="tipo_col">
										<option value="0">Sin filtro </option>
										<option value="1">Municipal</option>
										<option value="2">Particular subvencionado</option>
										<option value="3">Particular pagado</option>
										<option value="4">Otro</option>
									</select>
								</td>
								<td>
									<label for="valor">Valor de mensualidad</label>
									<select name="valor" id="valor">
										<option value="0">Sin filtro </option>
										<option value="1">Gratuito</option>
										<option value="2">desde 1.000 hasta 10.000</option>
										<option value="3">desde 10.001 hasta 25.000</option>
										<option value="4">25.001 hasta 50.000</option>
										<option value="5">50.001 hasta 100.000</option>
										<option value="6">mas de 100.000</option>
										<option value="7">sin informacion</option>
									</select>
								</td>
								<td>
									<label for="valor">Año de la prueba</label>
									<select name="valor" id="valor">
										<option value="2010">2010</option>
										<option value="2011">2011</option>
										<option value="2012">2012</option>
									</select>
								</td>
							</table>
						</form>


					</div>
          <div id="chart">
<canvas id="myChart" width="800" height="400"></canvas>

          <script src="Chart.js/dist/Chart.bundle.js">  </script>
          <script>


window.onload = function() {
    var ctx = document.getElementById("myChart").getContext("2d");
    var Data = {
                              labels : ["poto","caca"],
                              datasets : [
                                  {   label :"Promedio SIMCE",
                                      fillColor : 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                                      strokeColor : 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                                      highlightFill : 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                                      highlightStroke : 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                                      data : [20,20]
                                  }
                              ]
                          }
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: Data,
        options: {
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each bar to be 2px wide and green

            responsive: false,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Mayor a menor puntaje SIMCE'
            }
        }
    });

};














            </script>










          </div>





				</div>
			</section>
		</div>


		<script src='sql.js'></script>
		<script src='util.js'></script>
		<script src='app.js'></script>
		<script>cargarDB()</script>

	</body>
	</html>
