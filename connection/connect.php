<?php
session_start();
class Connection{//Connecting to the database
	public function dbConnect(){
		try{
			return new PDO ("mysql:host=localhost; dbname=pua_system", 'root', '');
		}catch(PDOExceptiion $e){
			die($e->getMessage());
		}
	}
}//end of connection class
?>