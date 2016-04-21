<!DOCTYPE html>
<html>
  <body style="font: 75% Lucida Grande, Trebuchet MS">
    <div id="content">
	<h4>Simple to do list</h4>
        <ul id="results"></ul><div>Handle Database in Phonegap</div>
		<form>
		First name: <input type="text" id="FirstName" value="Mickey"><br>
		Last name: <input type="text" id="LastName" value="Mouse"><br>
		</form>
        <button onclick="newRecord()">new record</button>
        <button onclick="createTable()">create table</button>'
        <button onclick="dropTable()">drop table</button>
		<button onclick="saveTableasFile()">save table as .sqlite</button>
	
	</div>
    <p id="log" style="color: gray"></p>
    <script>
      //document.getElementById('content').innerHTML = 
      //  '<h4>Simple to do list</h4>'+
      //  '<ul id="results"></ul><div>Handle Database in Phonegap</div>'+
	//	'<form>'+
		//'First name: <input type="text" name="FirstName" value="Mickey"><br>'+
	//	'Last name: <input type="text" name="LastName" value="Mouse"><br>'+
	//	'</form>'+
      //  '<button onclick="newRecord()">new record</button>'+
      //  '<button onclick="createTable()">create table</button>' +
      //  '<button onclick="dropTable()">drop table</button>'+
		//'<button onclick="saveTableasFile()">save table as .sqlite</button>';
      var db;
      var log = document.getElementById('log');
      db = openDatabase("DBTest", "1.0", "HTML5 Database API example", 200000);
      showRecords();
      document.getElementById('results').addEventListener('click', function(e) { e.preventDefault(); }, false);
      function onError(tx, error) {
        log.innerHTML += '<p>' + error.message + '</p>';
      }
      // select all records and display them
      function showRecords() {
        document.getElementById('results').innerHTML = '';
        db.transaction(function(tx) {
          tx.executeSql("SELECT * FROM Table1Test", [], function(tx, result) {
            for (var i = 0, item = null; i < result.rows.length; i++) {
              item = result.rows.item(i);
              document.getElementById('results').innerHTML += 
                  '<li><span contenteditable="true" onkeyup="updateRecord('+item['id']+', this)">'+
                  item['id']+' '+item['text'] + '</span> <a href="#" onclick="deleteRecord('+item['id']+')">x</a></li>';
            }
          });
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
		//include the file
	?>
  </body>
</html>  z<