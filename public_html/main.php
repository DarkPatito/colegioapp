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



<div id="Left">

test1


</div>
<div id="Right">

  <p><input type="text" id="nombre" placeholder="Nombre"><br></p>
  <p><input type="text" id="director" placeholder="Director"><br></p>
  <p><input type="text" id="sostenedor" placeholder="Sostenedor"><br></p>
  <p><button type="button" id="buscar_colegio" onclick="">Buscar</button></p>

</div>
<div id="Content">
<section class="cf">
<div>

  <h1>Colegio</h1>

	<div id="colegios">
	</div>
</div>
</section>
</div>

<script src='sql.js'></script>
<script src='app.js'></script>
<script>cargarDB()</script>

</body>
</html>
