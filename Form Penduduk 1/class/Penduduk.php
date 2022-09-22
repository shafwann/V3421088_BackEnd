<?php
class Penduduk
{
    // Attribute
    public $nik;
    public $nama;
    public $jenis_kelamin;
    public $alamat;
    public $pekerjaan;
    public $tempat_lahir;
    public $warga;
    public $perkawinan;
    public $tgl_lahir;
    public $gol_darah;
    // END Attribute

    function set_all_data($nik, $nama, $jenis_kelamin, $alamat, $pekerjaan, $tempat_lahir, $warga, $perkawinan, $tgl_lahir, $gol_darah)
    {
        $this->nik = $nik;
        $this->nama = $nama;
        $this->jenis_kelamin = $jenis_kelamin;
        $this->alamat = $alamat;
        $this->pekerjaan = $pekerjaan;
        $this->tempat_lahir = $tempat_lahir;
        $this->warga = $warga;
        $this->perkawinan = $perkawinan;
        $this->tgl_lahir = $tgl_lahir;
        $this->gol_darah = $gol_darah;
    }

    // Method Tambah Penduduk
    function tambahpenduduk($koneksi, $nik, $nama,  $jenis_kelamin, $alamat, $pekerjaan, $tempat_lahir, $warga, $perkawinan, $tgl_lahir, $gol_darah)
    {

        $tambahdata = "INSERT INTO tbl_penduduk VALUES ('', '$nik', '$nama', '$jenis_kelamin', '$alamat', '$pekerjaan', '$tempat_lahir', '$warga', '$perkawinan', '$tgl_lahir', '$gol_darah')";
        $proses_tambah = mysqli_query($koneksi, $tambahdata);
    }

    // Method Ambil Data
    function ambildata_penduduk($koneksi)
    {
        $data_penduduk = "SELECT * FROM tbl_penduduk";
        $proses_ambil = mysqli_query($koneksi, $data_penduduk);
        return  $proses_ambil;
    }

    // Method Hapus Data
    function hapus_data($koneksi, $id)
    {
        $hapus = "DELETE FROM tbl_penduduk WHERE id_penduduk = '$id'";
        $proses_hapus = mysqli_query($koneksi, $hapus);
        return "Berhasil";
    }

    // Method Ambil Data By ID
    function ambildata_by_id($koneksi, $id)
    {
        $data_id = "SELECT * FROM tbl_penduduk WHERE id_penduduk = '$id'";
        $proses_data_id = mysqli_query($koneksi, $data_id);
        return $proses_data_id;
    }

    function update_data($koneksi, $id_penduduk, $nik, $nama, $jenis_kelamin, $alamat, $pekerjaan, $tempat_lahir, $warga, $perkawinan, $tgl_lahir, $gol_darah)
    {
        $updatedata = "UPDATE tbl_penduduk SET
                        nik = '$nik',
                        nama = '$nama',
                        jenis_kelamin = '$jenis_kelamin',
                        alamat = '$alamat',
                        pekerjaan = '$pekerjaan',
                        tempat_lahir = '$tempat_lahir',
                        warga = '$warga',
                        perkawinan = '$perkawinan',
                        tgl_lahir = '$tgl_lahir',
                        gol_darah = '$gol_darah'
                        WHERE id_penduduk = '$id_penduduk'
                        ";
        $proses_update = mysqli_query($koneksi, $updatedata);
        return $proses_update;
    }
}