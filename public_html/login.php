<?php
	session_start();

	if (!empty($_POST) && !isset($_SESSION["user"])) {
		$db = new SQLite3("../resources/users.sqlite");
		$stmt = $db->prepare("SELECT * FROM users WHERE email=:em AND password=:pw");
		$stmt->bindValue(':em', $_POST["usermail"]);
		$stmt->bindValue(':pw', $_POST["password"]);
		$res = $stmt->execute();
		$arr = $res->fetchArray();

		if ($arr != FALSE) {
			$_SESSION["user"] = $arr[0];
			header('www.google.cl');
			//header('Location: admin.php');
		}

		header('Location: main.php');
	}
 ?>
