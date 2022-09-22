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
        }return $status;
    }
    function kisaranHarga(){
        if($this->tipe>=60){
            $harga=300000000;
        }else if($this->tipe>=40){
            $harga=200000000;
        }else{
            $harga=100000000;
        }return $harga;
    }
}

//membuat objek
$inforumah=new rumah();

//setting properti data
$inforumah->setData("Rudi","Putih","43");

//menampilkan data rumah
$inforumah->tampilData();
echo ", termasuk kategori ";
$inforumah->statusRumah();
echo " dengan kisaran harga ";
$inforumah->kisaranHarga();

echo "\n";
echo "=======DP=======";
echo "\n";
echo $inforumah->kisaranHarga()*0.3;

?>