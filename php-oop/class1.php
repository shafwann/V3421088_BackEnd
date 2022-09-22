<?php

class rumah {
	// Properties
	public $tipe;
	public $lantai;
	public $harga;
	
	//Method setting propertis
	function set_tipe($tipe) {
		$this->tipe = $tipe;
	}

	function set_lantai($lantai){
		$this->lantai = $lantai;
	}

	function set_harga($harga){
		$this->harga = $harga;
	}

	function set_all_data ($tipe,$lantai,$harga){
		$this->tipe = $tipe;
		$this->lantai = $lantai;
		$this->harga = $harga;
	}
	
	//Method ambil data propertis
	function get_tipe() {
		return $this->tipe;
	}

	function get_lantai(){
		return $this->lantai;
	}

	function get_harga(){
		return $this->harga;
	}

	// tipe dibawah 60 -> Kecil, 60-90 --> Sedang , 90 --> Luas

	function klasifikasi(){
		if ($this->tipe < 60){
			$klasifikasinya = "Kecil";
		} else if ($this->tipe >= 60 and $this->tipe < 90){
			$klasifikasinya = "Sedang";
		} else {
			$klasifikasinya = "Luas";
		}
		echo $klasifikasinya;
	}

}

// Instantisasi Obyek
$rumah_rudi = new rumah();

// Set propertis
$rumah_rudi->set_tipe('64');
$rumah_rudi->set_harga('100000000');
$rumah_rudi->set_lantai('2');

// Ambil Data propertis dan menampilkan
echo "<h1>";
 echo $rumah_rudi->get_tipe(); echo "<br>";
 echo $rumah_rudi->get_harga(); echo "<br>";
 echo $rumah_rudi->get_lantai(); echo "<br>";
 $rumah_rudi->klasifikasi();
 echo "</h1>";

// Obyek Baru
$rumah_budi = new rumah();

// set properti
$rumah_budi->set_all_data('150','3','200000000');

echo "<h1>";
 echo $rumah_budi->get_tipe(); echo "<br>";
 echo $rumah_budi->get_harga(); echo "<br>";
 echo $rumah_budi->get_lantai(); echo "<br>";
 $rumah_budi->klasifikasi();
 echo "</h1>";

 // Post Data
 if ($_POST['harga'] != '' and $_POST['tipe'] != '' and $_POST['lantai'] != ''){
 $post_harga = $_POST['harga'];
 $post_tipe = $_POST['tipe'];
 $post_lantai = $_POST['lantai'];
 
 $rumah_post = new rumah();
 $rumah_post->set_all_data($post_tipe,$post_lantai,$post_harga);


 echo "<h1>";
 echo "Data Set POST"; echo "<br>";
 echo $rumah_post->get_tipe(); echo "<br>";
 echo $rumah_post->get_harga(); echo "<br>";
 echo $rumah_post->get_lantai(); echo "<br>";
 $rumah_post->klasifikasi();
 echo "</h1>";
}
 
?>

<form action="" method="post" >
  <label for="fname">Masukkan Tipe Rumah:</label>
  <input type="text" id="tipe" name="tipe"><br>
  <label for="lname">Masukkan Banyak Lantai:</label>
  <input type="text" id="lantai" name="lantai"><br>
  <label for="lname">Masukkan Haga:</label>
  <input type="text" id="harga" name="harga"><br>
  <input type="submit" value="Submit">
</form>