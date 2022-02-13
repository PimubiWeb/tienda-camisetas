<?php

require_once 'config/db.php';

class Categoria extends Database{
	private $id;
	private $nombre;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	public function getAll(){
		// $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
		// return $categorias;
		$db = $this->connect();

		try{
			$sel = $db->prepare("SELECT * FROM categorias");
			$sel->execute();
			if($sel){
				return $sel->fetchAll(PDO::FETCH_ASSOC);
			}else{
				return -1;
			}
	
			$db = NULL;
			unset($db);
		}catch(PDOException $e){
			//error
			return -1;
		}
		
    }
	
	
	public function getOne(){
		$categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()}");
		return $categoria->fetch_object();
	}
	
	public function save(){
		$sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	
}