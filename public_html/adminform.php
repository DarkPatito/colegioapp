<!DOCTYPE html>
<html>

   <head>
   </head>

   <body>

     <form action="actColegio.php" method="POST">
        <label for="nombrecolegio">Nombre Colegio:</label><br>
        <input id="nombrecolegio" type="text" name="nombrecolegio"><br>
        <label for="director">Nombre Director:</label><br>
        <input id="director" type="text" name="director"><br>
        <label for="sostenedor">Nombre Sostenedor:</label><br>
        <input id="sostenedor" type="text" name="sostenedor"><br><br>
        <label for="mensualidad">Mensualidad:</label><br>
        <select id="mensualidad" name="mensualidad">
          <option value="1">Gratuito</option>
          <option value="2">De $1.000 a $10.000</option>
          <option value="3">De $10.001 a $25.000</option>
          <option value="4">De $25.001 a $50.000</option>
          <option value="5">De $50.001 a $100.000</option>
          <option value="6">Mas de $100.000</option>
          <option value="7">Sin informacion</option>
        </select><br><br>
        <label for="dependencia">Dependencia:</label><br>
        <select id="dependencia" name="dependencia">
          <option value="1">Municipal</option>
          <option value="2">Partucular Subvencionado</option>
          <option value="3">Particular Pagado</option>
          <option value="4">Otro</option>
        </select><br><br>
        <input type="submit" value="Enviar">
     </form>
     <button type="button" onClick="document.location.href='adminform.php'" />Click Me!</button>
   </body>

</html>
