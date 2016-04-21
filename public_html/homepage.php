<html>

<head>
<title>Listado Colegios</title>
</head>

<body>
  <input type="text" id="nombre" placeholder="Nombre"><br>
  <input type="text" id="director" placeholder="Director"><br>
  <input type="text" id="sostenedor" placeholder="Sostenedor"><br>
<button type="button" id="buscar_colegio" onclick="searchRecords()">Buscar</button>


<table style="table-layout:fixed;" id="results">

<tr>
  <th>Colegio</th>
</tr>


	<script>
      // select all records and display them
	  function showRecords() {
        document.getElementById('results').innerHTML = '';
        db.transaction(function(tx) {
          tx.executeSql("SELECT * FROM Colegios", [], function(tx, result) {
            for (var i = 0, item = null; i < result.rows.length; i++) {
              item = result.rows.item(i);
              document.getElementById('results').innerHTML += 
                  '<li><span contenteditable="true" onkeyup="updateRecord('+item['id']+', this)">'+
                  item['id']+' '+item['text'] + '</span> <a href="#" onclick="deleteRecord('+item['id']+')">x</a></li>';
            }
          });
        });
      }
	  
      function searchRecords() {
		//tx.executeSql('SELECT ? FROM Colegio',[document.getElementById('nombre').value]);
		db.transaction(function(tx) {
          tx.executeSql('SELECT ? FROM Colegio',[document.getElementById('nombre').value],
              function(tx, result) {
                log.innerHTML = 'record added';
                showRecords();
              }, 
              onError);
        });
      }
      function createTable() {
        db.transaction(function(tx) {
          tx.executeSql("CREATE TABLE Table1Test (id REAL UNIQUE, text TEXT)", [],
              function(tx) { log.innerHTML = 'Table1Test created' },
              onError);
        });
      }
      // add record with random values
      function newRecord() {
        var num = Math.round(Math.random() * 10000); // random data
        db.transaction(function(tx) {
          tx.executeSql("INSERT INTO Table1Test (id, text) VALUES (?, ?)", [num, document.getElementById('FirstName').value],
              function(tx, result) {
                log.innerHTML = 'record added';
                showRecords();
              }, 
              onError);
        });
      }
      function updateRecord(id, textEl) {
        db.transaction(function(tx) {
          tx.executeSql("UPDATE Table1Test SET text = ? WHERE id = ?", [textEl.innerHTML, id], null, onError);
        });
      }
      function deleteRecord(id) {
        db.transaction(function(tx) {
          tx.executeSql("DELETE FROM Table1Test WHERE id=?", [id],
              function(tx, result) { showRecords() }, 
              onError);
        });
      }
      // delete table from db
      function dropTable() {
        db.transaction(function(tx) {
          tx.executeSql("DROP TABLE Table1Test", [],
              function(tx) { showRecords() }, 
              onError);
        });
      }
	  // save table as.sqlt
      function saveTableasFile() {
		db.transaction(function(tx) {
          tx.executeSql("attach database 'Table1Test' as c1;", [],
              function(tx) { log.innerHTML = 'Table1Test saved' },
              onError);
        });
      }
     </script>



<?php

//$db = new SQLite3("../../colegios.sqlite");
$db = new SQLite3("../resources/colegios.sqlite");


$results = $db->query('SELECT * FROM Colegio');


while ($row = $results->fetchArray()) {

?>
<tr>
<td><a href="verFichaColegio.php?id=<?php echo $row['id']; ?>"><?php echo $row['nombreColegio']; echo " "; echo $row['nombreDirector'];?></a></td>
</tr>

<?php
}

?>

</table>

</body>

</html>