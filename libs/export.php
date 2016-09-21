<?php
  require 'config.php';
  class export{
	  public function between($tbl,$col,$from,$to,$status){
		  if($status !=0)
			$sql = "SELECT * FROM {$tbl} WHERE status = '$status' AND ({$col} between '$from' AND '$to')";
		else
			$sql = "SELECT * FROM {$tbl} WHERE {$col} between '$from' AND '$to'	";
			$sth = DB::conn()->prepare($sql);
			$sth->execute();
			return $sth->fetchAll(PDO::FETCH_ASSOC);
			 $stmt->closeCursor();
	  }
  }
   

?>