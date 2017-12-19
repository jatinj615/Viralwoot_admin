<?php 
	/**
	* 
	*/
	class DatabaseConnect
	{
		public function connect() {
			$connect_var = mysql_connect('localhost','root','1234');
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