<?php 

include("config.php");

/**
* 
*/
class Db
{
	    
	  private $con = null;
	
	 function __construct()
	{
		//$instance = Connection::getInstance();
		//$this->con = $instance->getConncetion();
		$this->con = Connection::getInstance();
		
	}
	public function insert($table_name, $data)
	{
		$fields = array_keys($data);
		$sql = "INSERT INTO `".$table_name."`( `".implode("`,`",$fields)."`) value ('".implode("','",$data)."')";
		 $qry = $this->con->prepare($sql);
		 return $qry->execute();
	}

	 public function update($table_name, $formdata, $where_clause="")
	{
		$wehersql ="";
		//check the WHERE clause when it is not empty
		if (!empty($where_clause)) {
					//if there is no such substring called where then 
			if (substr(strtoupper(trim($where_clause)), 0,5) != "WHERE") {
					//it will add up a where clause itself 
				$wehersql = "WHERE ".$where_clause;
			}else{
				//and if exists then simply added to the $wheresql variable  

				$wehersql = " ".trim($where_clause);
			}
		}
		$updatesal = "UPDATE ".$table_name." SET ";
		$sets = array();
		foreach ($formdata as $coloumn => $value) {
			$sets[] = "`".$coloumn."` = '".$value."'";
		}
		$updatesal .= implode(",", $sets);
		$updatesal .= $wehersql;
		//$obj = self::getConncetion();
		$qry = $this->con->prepare($updatesal);
		return $qry->execute();
	}
	
	public function selectAll($table_name,$where_clause=""){
		$wheresql="";
		if (!empty($where_clause)) {
			if(substr(strtoupper(trim($where_clause)), 0,5)!="WHERE")
			{
				$wheresql = "WHERE ".$where_clause;
			}else{

				$wheresql = " ".$where_clause;
			}
		}


		$sal; 

		if (!empty($wheresql)) {
			$sal = "SELECT * FROM ".$table_name." ".$wheresql;
			
		}else{
			$sal = "SELECT * FROM ".$table_name;
			
		}
		
		$data = $this->con->prepare($sal);
		$data->execute();
		return $data;
	}
	public function joinQuery($sql){
		$qry = $this->con->prepare($sql);
		$qry->execute();
		return $qry;
	}
	public function delete($table,$id){
			$qry = $this->con->prepare("DELETE FROM `".$table."` WHERE ".$id."");
		    $qry->execute();
		return $qry;
	}
	
	public function getInsertId() {
		return $this->con->lastInsertId('order_id');
	}
}


?>