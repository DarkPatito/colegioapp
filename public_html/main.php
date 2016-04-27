<html>
<?php
session_start();
?>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<title>Listado Colegios</title>


</head>

<body>

	<section class="loginform cf">
		<form name="login" method="POST" action="login.php" accept-charset="utf-8">
			<ul>
				<?php
				if(!isset($_SESSION["user"])) {
					echo"<li>";
					echo"<label for='usermail'>Email</label>";
					echo"<input type='email' id='usermail' name='usermail' placeholder='yourname@email.com' required>";
					echo"</li>";
					echo"<li>";
					echo"<label for='password'>Password</label>";
					echo"<input type='password' id='password' name='password' placeholder='password' required></li>";
					echo"<li>";
					echo "<input type='submit' value='Login'>";
					echo"</li>";
				}else{
					echo"<logged>";
					echo "<p>Bienvendio ";
					echo $_SESSION['user'];
					echo"</p>";
					echo "<form action='logout.php' method='post'>";
					echo "<input type='submit' value='Logout'>";
					echo"</logged>";
				};
				?>
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
							<select name="criterioOrden" onchange="actualizarDatos()" id="criterioOrden" >
								<option value="1">Nombre del Colegio </option>
								<option value="2">Nombre del director</option>
								<option value="3">Nombre del Sostenedor</option>
								<option value="4">Valor de la mensualidad</option>
								<option value="5">Tipo de colegio</option>
								<option value="8">Puntaje SIMCE</option>
							</select>
						</form>

					</div>
					<div id="agregarcol">
						<?php
						if(isset($_SESSION["user"])) {
						echo "<button type='button' onClick='document.location.href=\"adminform.php\"'/>Agregar</button>";
						};
						?>
					</div>
					<div id="colegios">
						<h3>Cargando...</h3>
					</div>

					<div id="ficha">
					</div>

					<div>
						<h3>Filtrar</h3>
						<hr>


						<form onchange="actualizarDatos()" id="filterform">
							<table style="width:100%">
								<td>
									<label for="tipoCol">Tipo de colegio</label>
									<select name="tipoCol" id="tipoCol">
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
									<label for="nivelPrueba">Nivel de prueba</label>
									<select name="nivelPrueba" id="nivelPrueba">
										<option value="4º Basico">4° Basico </option>
										<option value="8º Basico">8° Basico</option>
										<option value="2º Medio">2° Medio</option>

									</select>
								</td>
								<td>
									<label for="annoPrueba">Año de la prueba</label>
									<select name="annoPrueba" id="annoPrueba">
										<option value="2010">2010</option>
										<option value="2011">2011</option>
										<option value="2012">2012</option>
									</select>
								</td>
							</table>
						</form>


					</div>
        </div>
			</section>
		</div>

		<div id="chart">
			<canvas id="myChart" width="1000" height="400"></canvas>
		</div>



	<a class="btn" data-popup-open="popup-1" href="#">Open Popup #1</a>

	<div class="popup" data-popup="popup-1">
		<div class="popup-inner">
			<h2>Wow! This is Awesome! (Popup #1)</h2>
			<p>Donec in volutpat nisi. In quam lectus, aliquet rhoncus cursus a, congue et arcu. Vestibulum tincidunt neque id nisi pulvinar aliquam. Nulla luctus luctus ipsum at ultricies. Nullam nec velit dui. Nullam sem eros, pulvinar sed pellentesque ac, feugiat et turpis. Donec gravida ipsum cursus massa malesuada tincidunt. Nullam finibus nunc mauris, quis semper neque ultrices in. Ut ac risus eget eros imperdiet posuere nec eu lectus.</p>
			<p><a data-popup-close="popup-1" href="#">Close</a></p>
			<a class="popup-close" data-popup-close="popup-1" href="#">x</a>
		</div>
	</div>




	<script src='sql.js'></script>
		<script src='util.js'></script>
		<script src='app.js'></script>
		<script src="Chart.js/dist/Chart.bundle.js">  </script>
	  <script src="grafico.js"></script>

	</body>
	</html>
