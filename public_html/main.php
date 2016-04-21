<html>

<head>
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
              <label for="criterio_orden">Criterio para ordenar</label>
							<select name="criterio_orden" onchange="ordenarColegios()" id="criterio_orden" >
								<option value="1">Nombre del Colegio </option>
								<option value="3">Nombre del Sostenedor</option>
								<option value="2">Nombre del director</option>
								<option value="5">Tipo de colegio</option>
								<option value="4">Valor de la mensualidad</option>
								<option value="puntaje">Puntaje SIMCE</option>
							</select>

						</form>

					</div>
					<h1>Colegio</h1>

					<div id="colegios">
					</div>
					<div>
						<h3>filtrar</h3>
						<hr>


						<form onsubmit="actualizarFiltro()" id="filterform">
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
									<input type="submit"  value="Filtrar">
								</td>
							</table>
						</form>


					</div>



				</div>
			</section>
		</div>


		<script src='sql.js'></script>
		<script src='app.js'></script>
		<script>cargarDB()</script>

	</body>
	</html>
