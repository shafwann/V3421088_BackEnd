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
    function statusRumah(){
        if($this->tipe>40){
            $status='Luas';
        }else{
            $status='Minimalis';
        }echo $status;
    }
}

//membuat objek
$inforumah=new rumah();

//setting properti data
$inforumah->setData("Rudi","Putih","43");

//menampilkan data rumah
$inforumah->tampilData();
echo " ";
$inforumah->statusRumah();

?>