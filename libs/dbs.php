<?php
/**
 * PHP MySQL Database query
 * Written by : Anurag Mishra
 */
class dbs {
 
    const DB_HOST = 'db4free.net';
    const DB_NAME = 'perception';
    const DB_USER = 'perception';
    const DB_PASSWORD = 'perception@123';
    /**
     * Open the database connection
     */
    public function __construct() {
        // open database connection
        $conStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
        try {
            $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
 
    /**
     * PDO instance
     * @var PDO 
     */
    private $pdo = null;
 
    /**
     * database query
     */
    public function queryAll($tbl,$off=0,$limit=1000000000,$order="ASC",$by=1) {
 
        try {
            $this->pdo->beginTransaction();
 
         
            $sql = "SELECT * FROM {$tbl} ORDER BY $by $order LIMIT $off,$limit";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
            /* @var $stmt type */
            $stmt->closeCursor();
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            die($e->getMessage());
        }
    }
	// query by id
	public function queryCol($tbl,$col,$op="",$off=0,$limit=1000000000,$order="ASC",$by=1) {
		$str = implode(' '.$op.' ', array_map(
			function ($v, $k) { return sprintf("%s = %s", $k, ":".$k); },
			$col,
			array_keys($col)
		));
		foreach($col as $k=>$v):
				$nk = ":".$k;
				$col[$nk] = $v;
				unset($col[$k]);
			endforeach;
 
        try {
           
           $sql = "SELECT * FROM {$tbl}  WHERE {$str} ORDER BY $by $order LIMIT $off,$limit";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($col);
            return $stmt->fetchAll();
            /* @var $stmt type */
            $stmt->closeCursor();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
	/**
	function for fetchin spevified single colomn
	**/
	public function fetchSngle($tbl,$flt="", $col,$cond="1"){
		$col = implode(",",$col);
		try {
           
		$sql = "SELECT {$flt} {$col} FROM {$tbl}  WHERE {$cond}";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
            /* @var $stmt type */
            $stmt->closeCursor();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
	}
	/**
	* form sanitization
	*/
	public function sanitize($validat){
		foreach($validat as $key =>$data):
			switch($data){
				case "string":
					$ret[$key] = FILTER_SANITIZE_STRING;
					break;
				case "int":
					$ret[$key] = FILTER_SANITIZE_NUMBER_INT;
					break;
				case "email":
					$ret[$key] = FILTER_SANITIZE_EMAIL;
					break;
				default:
					$ret[$key] = "";
					break;
			}
		endforeach;
		return filter_input_array(INPUT_POST, $ret);

	}
	/**
	*function insert
	*/
	public function insert($tbl,$validate) {
			$x = self::sanitize($validate);			
			$col		=	implode(",",array_map(function($a){ return "$a";},array_keys($x)));
			$place		=	implode(",",array_map(function($a){ return ":$a";},array_keys($x)));
			foreach($x as $k=>$v):
				$nk = ":".$k;
				$x[$nk] = $v;
				unset($x[$k]);
			endforeach;
          //try {
            //$this->pdo->beginTransaction(); 
			
         try {
            $sql = "INSERT INTO {$tbl} ({$col}) VALUES ({$place})";
             $stmt = $this->pdo->prepare($sql);
            $stmt->execute($x);
		 }catch (PDOException $e) {
            $this->pdo->rollBack();
            die($e->getMessage());
		 }
    }
	public function eraseId($tbl,$data){
		if(is_array($data)){
			$sql =  "IN (".implode(',',$data).")";
		}else{
			$sql = "=". $data;
		}
		$sqls = "DELETE FROM {$tbl} WHERE id ".$sql; 
		$stmt = $this->pdo->prepare($sqls);
            $stmt->execute();
	}
	/**
	* function traversing in tree view
	**/
	public function tree($tbl,$pid, $l = 0) {
		
		 $sql="SELECT * FROM {$tbl} Where parent =:pid";
			 $stmt = $this->pdo->prepare($sql);
			 $stmt->execute(array(":pid"=>$pid));
				while($xs = $stmt->fetchObject()){
						echo "<option value='".$xs->id."' id='i".$xs->id."'>";
						$i= $l;
						while($i > 0){
							echo "| &nbsp;&nbsp; &nbsp;&nbsp;";
							$i--;
					}
					echo "|-----".$xs->category."</option>";
					$l++;
					$pid = $xs->id;
					self::tree($tbl,$pid,$l);
					$l--;
					}
	}
	// category display
	public function createTree($tbl,$pid, $l = 0) {
		
		 $sql="SELECT * FROM {$tbl} Where parent =:pid";
			 $stmt = $this->pdo->prepare($sql);
			 $stmt->execute(array(":pid"=>$pid));
			if($pid == $l):
				echo "<ul class='tree'>";
				while($xs = $stmt->fetchObject()){
					echo "<li>";
					echo "<a href='#'>".$xs->category."</a>";
					$l++;
					$pid = $xs->id;
					self::createTree($tbl,$pid,$l);
					echo "</li>";
					$l--;
				}
				echo "</ul>";
			endif;
	}
    /**
     * close the database connection
     */
    public function __destruct() {
        // close the database connection
        $this->pdo = null;
    }
 
}
 $dbs = new dbs;