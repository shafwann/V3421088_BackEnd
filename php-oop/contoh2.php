<?php

class rumah{
    public $pemilik;
    public $warna;
    public $tipe;

    function setData($pemilik,$warna,$tipe){
        $this->pemilik=$pemilik;
        $this->warna=$warna;
        $this->tipe=$tipe;
    }
    function tampilData(){
        echo "Rumah {$this->pemilik} berwarna {$this->warna} dengan tipe {$this->tipe}";
    }
}

//membuat objek
$inforumah=new rumah();

//setting properti data
$inforumah->setData("Rudi","Putih","23");

//menampilkan data rumah
$inforumah->tampilData();

?>