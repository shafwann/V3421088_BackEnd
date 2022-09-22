<?php
class database {
	//properti yang dibuthkan
	private $dbhost;
	private $dbuser;
	private $dbpass;
	private $dbname;
	//construc
	function __construct($a, $b, $c, $d){
		$this->dbhost = $a;
		$this->dbuser = $b;
		$this->dbpass = $c;
		$this->dbname = $d;
	}
	//method koneksi mysql db
	function conn_mysql(){
		$konek_db = mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
		return  $konek_db;
	}
	// Tambah user
	function tambahuser ($koneksi,$user, $nama){
		$tambahdata = "INSERT INTO user (user,nama) VALUES ('$user','$nama')";
		$proses_tambah =mysqli_query($koneksi, $tambahdata);
		if ($proses_tambah) echo "Data Berhasil Ditambah";
		else echo "Data Gagal Ditambah";
	}
}

// Parameter Data MYSQL
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'backend';
// Instantitasi dan setting obyek
$db = new database($host,$user,$pass,$db);
//Koneksi Mysql method
//$db->conn_mysql();

$koneksi = $db->conn_mysql();
//Tambah Data
$db->tambahuser($koneksi,'idur','Rudi Hartono','Karanganyar');
