<?php 


	class ciudadesModel {

		public function GetAllCiudades ()
		{
			$sql = "Select id_Ciudad,nombre_Ciudad from ciudades";
			$rs  = $this->db->Execute($sql);
			return $rs;
		}

		public function GetCiudadById($id_Ciudad)
		{
			$sql = "Select id_Ciudad, nombre_Ciudad from ciudades where id_Ciudad = ?";
			$prp = $this->Prepare($sql);
			$rs  = $this->db->Execute($prp, array($id_Ciudad));
		}
	}

?>