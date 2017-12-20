<?php 
	/**
	* 
	*/
	class DatabaseConnect
	{
		public function connect() {
			$connect_var = mysql_connect('104.155.160.210','teampass','w4FEjHEWPpXxrUdT');
			mysql_select_db('viralwoot');
			if(!$connect_var){
				echo "Connection Failed";
			}else {
				return $connect_var;
			}
		}
		public function closeConnection($conn){
			mysqli_close($conn);
		}
	}
?>