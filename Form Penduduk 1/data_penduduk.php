<?php
require "class/Database.php";
require "class/Penduduk.php";

$penduduk_post = new Penduduk();
$data_penduduk_db = $penduduk_post->ambildata_penduduk($koneksi);

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
    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                            <h1 class="mt-3">Data Penduduk</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body table-responsive p-0" style="height: fit-content;">
                            <table class="table table-head-fixed">
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
                                        <td><?= $semua_data_ok["nik"]; ?></td>
                                        <td><?= $semua_data_ok["nama"]; ?></td>
                                        <td><?= $semua_data_ok["jenis_kelamin"]; ?></td>
                                        <td>
                                            <?= $semua_data_ok["alamat"]; ?>
                                        </td>
                                        <td><?= $semua_data_ok["pekerjaan"]; ?></td>
                                        <td><?= $semua_data_ok["tempat_lahir"]; ?></td>
                                        <td><?= $semua_data_ok["warga"]; ?></td>
                                        <td><?= $semua_data_ok["perkawinan"]; ?></td>
                                        <td><?= $semua_data_ok["tgl_lahir"]; ?></td>
                                        <td><?= $semua_data_ok["gol_darah"]; ?></td>
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
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- ./wrapper -->
</body>

</html>