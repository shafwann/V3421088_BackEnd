<?php
class Database
{
    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;

    function __construct($dbhost, $dbuser, $dbpass, $dbname)
    {
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbname = $dbname;
    }

    function conn_mysql()
    {
        $konek_db = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        return  $konek_db;
    }
}

// Koneksi DB
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'reyhan';
$db = new Database($host, $user, $pass, $db);
$koneksi = $db->conn_mysql();
// END Koneksi DB