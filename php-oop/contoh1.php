<?php

class rumah{
    //properties
    public $tipe;
    public $lantai;

    //method setting properties
    function set_tipe($tipe){
        $this->tipe = $tipe;
    }

    //method ambil data properties
    function get_tipe(){
        return $this->tipe;
    }
}

//instalansi objek
$rumah = new rumah();

//set properties
$rumah->set_tipe('21');

//ambil data properties
echo $rumah->get_tipe();

?>