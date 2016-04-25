<?php
 class DBCol extends SQLite3
 {
   function __construct()
   {
     $this->open('../colegios.sqlite');
   }
 }
 $db = new DBCol();
 function insert(){
   $stmt= $db->prepare('INSERT INTO Colegio * VALUES (:nC,:nD,:nS,:idM,:idD)');
   $stmt->bindValue(':nC',$_POST['nombrecolegio']);
   $stmt->bindValue(':nD',$_POST['director']);
   $stmt->bindValue(':nS',$_POST['sostenedor']);
   $stmt->bindValue(':idM',$_POST['mensualidad']);
   $stmt->bindValue(':idD',$_POST['dependencia']);
   $stmt->execute();
 }
 function update(){
   $stmt= $db->prepare('UPDATE Colegio SET :n=:nwn  WHERE  :boop=:nwboop');
   $stmt->bindValue(':n',)
   $stmt->bindValue(':nwn')
   $stmt->bindValue(':boop')
   $stmt->bindValue(':nwboop')
   $stmt->execute();
 }
?>
