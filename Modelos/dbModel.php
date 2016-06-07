<?php


public class db {

	private $servidor="localhost", $dbname="iste", $user="postgres", $password="administrador";



	function conectar ()
	{
		pg_connect("host=".$servidor." dbname=".$iste." user=".$postgres." password=".$administrador"") or
		die("Fallo en el establecimiento de la conexion");


		//Conexion con adodb

		$db = ADONewConnection($this->db);
		$db->debug = false;
		$db->Conect($this->servidor, $this->user, $this->password, $this->dbname);

		return $db;

	}

}



