<?php
require "class/Database.php";
require "class/Penduduk.php";


if (isset($_POST['submit-data'])) {

    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $warga = $_POST['warga'];
    $perkawinan = $_POST['perkawinan'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $gol_darah = $_POST['gol_darah'];

    $penduduk_post = new Penduduk();

    $penduduk_post->tambahpenduduk($koneksi, $nik, $nama, $jenis_kelamin, $alamat, $pekerjaan, $tempat_lahir, $warga, $perkawinan, $tgl_lahir, $gol_darah);

    $data_penduduk_db = $penduduk_post->ambildata_penduduk($koneksi);
} else {
}

if (isset($_POST['hapus'])) {
    if ($_POST['id'] != '') {
        $penduduk_hapus = new Penduduk();
        $hapus_data = $penduduk_hapus->hapus_data($koneksi, $_POST['id']);

        $data_penduduk_db = $penduduk_hapus->ambildata_penduduk($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Data Penduduk</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="img/Profile.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Reyhan Naufal</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Formulir </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="data_penduduk.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Penduduk</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper mt-0">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="mt-3">Formulir Data Penduduk</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nik">Nomor Induk Kewarganegaraan (NIK)</label>
                                    <input required name="nik" type="number" class="form-control" id="nik"
                                        placeholder="Masukkan NIK Anda">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input required name="nama" type="text" class="form-control" id="nama"
                                        placeholder="Masukkan nama lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Rumah</label>
                                    <input required name="alamat" type="text" class="form-control" id="alamat"
                                        placeholder="Masukkan alamat rumah">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input required name="pekerjaan" type="text" class="form-control" id="pekerjaan"
                                        placeholder="Masukkan pekerjaan Anda">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Kelahiran</label>
                                    <input required name="tempat_lahir" type="text" class="form-control"
                                        id="tempat_lahir" placeholder="Masukkan tempat kelahiran">
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label>Golongan darah</label>
                                        <select name="gol_darah" class="form-control select2" style="width: 100%;">
                                            <option value="A" selected="selected">A</option>
                                            <option value="B">B</option>
                                            <option value="O">O</option>
                                            <option value="AB">AB</option>
                                        </select>
                                    </div>
                                    <div class="form-group col">
                                        <div class="">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir"
                                                class="d-block w-100 bg-dark border-white px-2 py-1 rounded">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label>Kewarganegaraan</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-blue" type="radio"
                                                id="warga" name="warga" value="WNI" checked>
                                            <label for="warga" class="custom-control-label d-block">Warga Negara
                                                Indonesia</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-blue" type="radio"
                                                id="wna" name="warga" value="WNA">
                                            <label for="wna" class="custom-control-label">Warga Negara Asing</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="alamat">Status Perkawinan</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-blue" type="radio"
                                                id="sudah" name="perkawinan" value="Sudah Menikah" checked>
                                            <label for="sudah" class="custom-control-label d-block">Sudah
                                                Menikah</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-blue" type="radio"
                                                id="belum" name="perkawinan" value="Belum Menikah">
                                            <label for="belum" class="custom-control-label">Belum Menikah</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Jenis Kelamin</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-blue" type="radio"
                                                id="pria" name="jenis_kelamin" value="Pria" checked>
                                            <label for="pria" class="custom-control-label d-block">Pria</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-blue" type="radio"
                                                id="wanita" name="jenis_kelamin" value="Wanita">
                                            <label for="wanita" class="custom-control-label">Wanita</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary px-5" name="submit-data">Kirim</button>
                            </div>
                        </form>
                    </div>

                    <!-- TABLE DATA -->
                    <?php if (isset($_POST['submit-data']) or isset($_POST['hapus'])) { ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Penduduk</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: fit-content;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Pekerjaan</th>
                                        <th>Tempat Kelahiran</th>
                                        <th>Kewarganergaraan</th>
                                        <th>Status</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Gol. Darah</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($semua_data_ok = $data_penduduk_db->fetch_array()) { ?>
                                    <tr>
                                        <td>
                                            <?= $semua_data_ok["nik"]; ?>
                                        </td>
                                        <td>
                                            <?= $semua_data_ok["nama"]; ?>
                                        </td>
                                        <td>
                                            <?= $semua_data_ok["jenis_kelamin"]; ?>
                                        </td>
                                        <td>
                                            <?= $semua_data_ok["alamat"]; ?>
                                        </td>
                                        <td>
                                            <?= $semua_data_ok["pekerjaan"]; ?>
                                        </td>
                                        <td>
                                            <?= $semua_data_ok["tempat_lahir"]; ?>
                                        </td>
                                        <td>
                                            <?= $semua_data_ok["warga"]; ?>
                                        </td>
                                        <td>
                                            <?= $semua_data_ok["perkawinan"]; ?>
                                        </td>
                                        <td>
                                            <?= $semua_data_ok["tgl_lahir"]; ?>
                                        </td>
                                        <td>
                                            <?= $semua_data_ok["gol_darah"]; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <form action="" method="POST">
                                                    <input type="hidden" value="<?= $semua_data_ok['id_penduduk']; ?>"
                                                        name="id">
                                                    <div class="mr-1">
                                                        <button type="submit" name="hapus"
                                                            class="border-0 bg-danger rounded"
                                                            onclick="return confirm('Yakin ingin menghapus data?');"><i
                                                                class="fa-solid fa-trash"></i></button>
                                                    </div>
                                                </form>
                                                <p>|</p>
                                                <div class="ml-1">
                                                    <form action="update.php" method="POST">
                                                        <input type="hidden"
                                                            value="<?= $semua_data_ok['id_penduduk']; ?>" name="id">
                                                        <button type="submit" name="ubah"
                                                            class="border-0 bg-warning rounded"><i
                                                                class="fa-solid fa-pen-to-square"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <?php } ?>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- ./wrapper -->
</body>

</html>