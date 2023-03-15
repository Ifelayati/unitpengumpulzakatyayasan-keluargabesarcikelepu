<?php 

class Mesjid_model {

	private $table='t_mesjid';
	private $db;

	public function __construct(){
		$this->db = new database;
	}

	public function getAllMesjid()
	{
		$this->db->query("SELECT * FROM t_mesjid");
	 		return $this->db->resultSet();
	}

	public function getMesjidById($id)
	{

		$this->db->query('SELECT * FROM '.$this-> table .' WHERE id_mesjid=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahDataMesjid($data)
	{
		$query = "INSERT INTO t_mesjid
		VALUES ('', :nama_program, :tujuan, :alokasi_dana, :penerima_manfaat)";
		$this->db->query($query);
		$this->db->bind('nama_program', $data['nama_program']);
		$this->db->bind('tujuan', $data['tujuan']);
		$this->db->bind('alokasi_dana', $data['alokasi_dana']);
		$this->db->bind('penerima_manfaat', $data['penerima_manfaat']);
		$this->db->execute();

		return $this->db->rowCount();

	}
	
	public function cariMesjid(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM t_mesjid WHERE nama_program LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword',"%$keyword%");
		return $this ->db->resultSet();
		
	}
	public function hapusDataMesjid($id){
		$query = "DELETE FROM ". $this->table ." WHERE id_mesjid= :id_mesjid";
		$this->db->query($query);
		$this->db->bind('id_mesjid',$id);
		$this->db->execute();
		return $this ->db->rowCount();
		
	}

	public function ambilDataMesjid($id)
	{
		$this->db->query('SELECT * FROM '.$this-> table .' WHERE id_mesjid=:id_mesjid');
		$this->db->bind('id_mesjid',$id);
		return $this->db->single();
	}

	public function editDataMesjid($data){
		$query = "UPDATE t_mesjid SET 
		nama_program= :nama_program,
		tujuan= :tujuan,
		alokasi_dana= :alokasi_dana,
		penerima_manfaat= :penerima_manfaat
		WHERE id_mesjid = :id_mesjid ";

		$this->db->query($query);
		$this->db->bind('id_mesjid', $data['id_mesjid']);
		$this->db->bind('nama_program', $data['nama_program']);
		$this->db->bind('tujuan', $data['tujuan']);
		$this->db->bind('alokasi_dana', $data['alokasi_dana']);
		$this->db->bind('penerima_manfaat', $data['penerima_manfaat']);
		$this->db->execute();

		return $this->db->rowCount();
	}

}