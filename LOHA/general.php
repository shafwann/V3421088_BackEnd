<?php
ini_set('display_errors',1);
error_reporting(-1);

class database{
  private $dbhost;
  private $dbuser;
  private $dbpass;
  private $dbname;

  function __construct($a,$b,$c,$d){
    $this->dbhost=$a;
    $this->dbuser=$b;
    $this->dbpass=$c;
    $this->dbname=$d;
  }

  function conn_mysql(){
    $konek_db=mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
    return $konek_db;
  }
}

class penduduk{
  public $nik;
  public $nama;
  public $gender;
  public $alamat;
  public $status;
  public $pekerjaan;
  public $warga;
  public $asal;
  public $tanggal;
  public $darah;
  public $nikEdit;
  public $namaEdit;
  public $genderEdit;
  public $alamatEdit;
  public $statusEdit;
  public $pekerjaanEdit;
  public $wargaEdit;
  public $asalEdit;
  public $tanggalEdit;
  public $darahEdit;
  public $idEdit;

  function set_all_data($nik,$nama,$gender,$alamat,$status,$pekerjaan,$warga,$asal,$tanggal,$darah,$nikEdit,$namaEdit,$genderEdit,$alamatEdit,$statusEdit,$pekerjaanEdit,$wargaEdit,$asalEdit,$tanggalEdit,$darahEdit,$idEdit){
    $this->nik=$nik;
    $this->nama=$nama;
    $this->gender=$gender;
    $this->alamat=$alamat;
    $this->status=$status;
    $this->pekerjaan=$pekerjaan;
    $this->warga=$warga;
    $this->asal=$asal;
    $this->tanggal=$tanggal;
    $this->darah=$darah;
    $this->nikEdit=$nikEdit;
    $this->namaEdit=$namaEdit;
    $this->genderEdit=$genderEdit;
    $this->alamatEdit=$alamatEdit;
    $this->statusEdit=$statusEdit;
    $this->pekerjaanEdit=$pekerjaanEdit;
    $this->wargaEdit=$wargaEdit;
    $this->asalEdit=$asalEdit;
    $this->tanggalEdit=$tanggalEdit;
    $this->darahEdit=$darahEdit;
    $this->idEdit=$idEdit;
  }

  function get_nik(){
    return $this->nik;
  }
  function get_nama(){
    return $this->nama;
  }
  function get_gender(){
    return $this->gender;
  }
  function get_alamat(){
    return $this->alamat;
  }
  function get_status(){
    return $this->status;
  }
  function get_pekerjaan(){
    return $this->pekerjaan;
  }
  function get_warga(){
    return $this->warga;
  }
  function get_asal(){
    return $this->asal;
  }
  function get_tanggal(){
    return $this->tanggal;
  }
  function get_darah(){
    return $this->darah;
  }
  function get_nikEdit(){
    return $this->nikEdit;
  }
  function get_namaEdit(){
    return $this->namaEdit;
  }
  function get_genderEdit(){
    return $this->genderEdit;
  }
  function get_alamatEdit(){
    return $this->alamatEdit;
  }
  function get_statusEdit(){
    return $this->statusEdit;
  }
  function get_pekerjaanEdit(){
    return $this->pekerjaanEdit;
  }
  function get_wargaEdit(){
    return $this->wargaEdit;
  }
  function get_asalEdit(){
    return $this->asalEdit;
  }
  function get_tanggalEdit(){
    return $this->tanggalEdit;
  }
  function get_darahEdit(){
    return $this->darahEdit;
  }
  function get_idEdit(){
    return $this->idEdit;
  }

  // TAMBAH PENDUDUK
  function tambahpenduduk ($koneksi,$nik,$nama,$gender,$alamat,$status,$pekerjaan,$warga,$asal,$tanggal,$darah){
    $tambahdata = "INSERT INTO data (nik,nama,gender,alamat,status,pekerjaan,warga,asal,tanggal,darah) VALUES ('$nik','$nama','$gender','$alamat','$status','$pekerjaan','$warga','$asal','$tanggal','$darah')";
		$proses_tambah =mysqli_query($koneksi, $tambahdata);
	}

  function ambildata_penduduk ($koneksi){
    $data_penduduk = "SELECT * FROM data";
    $proses_ambil =mysqli_query($koneksi, $data_penduduk);
    return  $proses_ambil;
  }

  function hapus_data ($koneksi, $id){
    $hapus = "DELETE FROM data WHERE id_penduduk = '$id'";
    $proses_hapus = mysqli_query($koneksi,$hapus);
    return "Berhasil Hapus";
  }

  function edit_data($koneksi,$nikEdit,$namaEdit,$genderEdit,$alamatEdit,$statusEdit,$pekerjaanEdit,$wargaEdit,$asalEdit,$tanggalEdit,$darahEdit,$idEdit){
    $edit = "UPDATE data SET nik='$nikEdit', nama='$namaEdit', gender='$genderEdit', alamat='$alamatEdit', status='$statusEdit', pekerjaan='$pekerjaanEdit', warga='$wargaEdit', asal='$asalEdit', tanggal='$tanggalEdit', darah='$darahEdit' WHERE id_penduduk='$idEdit'";
    $proses_edit = mysqli_query($koneksi,$edit);
    return "Berhasil Edit";
  }
}

$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'kependudukan';
$db = new database($host,$user,$pass,$db);
$koneksi = $db->conn_mysql();

if(isset($_POST['submit'])){
  if($_POST['nik'] !='' and $_POST['nama'] !='' and $_POST['gender'] !='' and $_POST['alamat'] !='' and $_POST['status'] !='' and $_POST['pekerjaan'] !='' and $_POST['warga'] !='' and $_POST['asal'] !='' and $_POST['tanggal'] !='' and $_POST['darah'] !='' ){
    $post_nik = $_POST['nik'];
    $post_nama = $_POST['nama'];
    $post_gender = $_POST['gender'];
    $post_alamat = $_POST['alamat'];
    $post_status = $_POST['status'];
    $post_pekerjaan = $_POST['pekerjaan'];
    $post_warga = $_POST['warga'];
    $post_asal = $_POST['asal'];
    $post_tanggal = $_POST['tanggal'];
    $post_darah = $_POST['darah'];

    $penduduk_post = new penduduk();
    $klasifikasi = $penduduk_post;
    $penduduk_post->tambahpenduduk($koneksi,$post_nik,$post_nama,$post_gender,$post_alamat,$post_status,$post_pekerjaan,$post_warga,$post_asal,$post_tanggal,$post_darah);

    $data_penduduk_db = $penduduk_post->ambildata_penduduk($koneksi);
  }
}

if (isset($_POST['Hapus'])){
  if ($_POST['id'] != ''){
    $penduduk_hapus = new penduduk();
    $hapus_data = $penduduk_hapus->hapus_data($koneksi,$_POST['id']);
 
    $data_penduduk_db = $penduduk_hapus->ambildata_penduduk($koneksi);    
  }
}

if(isset($_POST['submitEdit']) and isset($_POST['Edit'])){
  if($_POST['nikEdit'] !='' and $_POST['namaEdit'] !='' and $_POST['genderEdit'] !='' and $_POST['alamatEdit'] !='' and $_POST['statusEdit'] !='' and $_POST['pekerjaanEdit'] !='' and $_POST['wargaEdit'] !='' and $_POST['asalEdit'] !='' and $_POST['tanggalEdit'] !='' and $_POST['darahEdit'] !='' ){
    $post_nik_edit = $_POST['nikEdit'];
    $post_nama_edit = $_POST['namaEdit'];
    $post_gender_edit = $_POST['genderEdit'];
    $post_alamat_edit = $_POST['alamatEdit'];
    $post_status_edit = $_POST['statusEdit'];
    $post_pekerjaan_edit = $_POST['pekerjaanEdit'];
    $post_warga_edit = $_POST['wargaEdit'];
    $post_asal_edit = $_POST['asalEdit'];
    $post_tanggal_edit = $_POST['tanggalEdit'];
    $post_darah_edit = $_POST['darahEdit'];

    $edit_penduduk = new penduduk();
    $edit_data = $edit_penduduk->edit_data($koneksi,$post_nik_edit,$post_nama_edit,$post_gender_edit,$post_alamat_edit,$post_status_edit,$post_pekerjaan_edit,$post_warga_edit,$post_asal_edit,$post_tanggal_edit,$post_darah_edit,$_POST['idEdit']);

    $edit_penduduk_db = $edit_penduduk->ambildata_penduduk($koneksi);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Shafwan Eksa Jayadi</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
            <li class="nav-item menu-open">
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../forms/general.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Penduduk</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <?php if(isset($_POST['Edit'])){
                  echo "<h1>Edit Data Penduduk</h1>";
                }else{
                  echo "<h1>Form Data Penduduk</h1>";
                }
              ?>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Home</li>
                <li class="breadcrumb-item active">Data Penduduk</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <?php if(isset($_POST['Edit'])){
                        echo '<input type="text" class="form-control" id="nikEdit" name="nikEdit" placeholder="Masukkan NIK Baru">';
                      }else{
                        echo '<input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK">';
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <?php if(isset($_POST['Edit'])){
                        echo '<input type="text" class="form-control" id="namaEdit" name="namaEdit" placeholder="Masukkan Nama Baru">';
                      }else{
                        echo '<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">';
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Jenis Kelamin</label>
                      <?php if(isset($_POST['Edit'])){
                        echo '<select class="form-control" id="genderEdit" name="genderEdit">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>';
                      }else{
                        echo '<select class="form-control" id="gender" name="gender">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>';
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <?php if(isset($_POST['Edit'])){
                        echo '<input type="text" class="form-control" id="alamatEdit" name="alamatEdit" placeholder="Masukkan Alamat Baru">';
                      }else{
                        echo '<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">';
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Status Perkawinan</label>
                      <?php if(isset($_POST['Edit'])){
                        echo '<select class="form-control" name="statusEdit" id="statusEdit">
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                      </select>';
                      }else{
                        echo '<select class="form-control" name="status" id="status">
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                      </select>';
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Pekerjaan</label>
                      <?php if(isset($_POST['Edit'])){
                        echo '<input type="text" class="form-control" id="pekerjaanEdit" name="pekerjaanEdit" placeholder="Masukkan Pekerjaan Baru">';
                      }else{
                        echo '<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan">';
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Kewarganegaraan</label>
                      <?php if(isset($_POST['Edit'])){
                        echo '<select class="form-control" name="wargaEdit" id="wargaEdit">
                        <option value="WNI">WNI</option>
                        <option value="WNA">WNA</option>
                      </select>';
                      }else{
                        echo '<select class="form-control" name="warga" id="warga">
                        <option value="WNI">WNI</option>
                        <option value="WNA">WNA</option>
                      </select>';
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tempat Lahir</label>
                      <?php if(isset($_POST['Edit'])){
                        echo '<input type="text" class="form-control" id="asalEdit" name="asalEdit" placeholder="Masukkan Tempat Lahir Baru">';
                      }else{
                        echo '<input type="text" class="form-control" id="asal" name="asal" placeholder="Masukkan Tempat Lahir">';
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tanggal Lahir</label>
                      <?php if(isset($_POST['Edit'])){
                        echo '<input type="date" class="form-control" id="tanggalEdit" name="tanggalEdit">';
                      }else{
                        echo '<input type="date" class="form-control" id="tanggal" name="tanggal">';
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Golongan Darah</label>
                      <?php if(isset($_POST['Edit'])){
                        echo '<select class="form-control" name="darahEdit" id="darahEdit">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                      </select>';
                      }else{
                        echo '<select class="form-control" name="darah" id="darah">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                      </select>';
                      }
                      ?>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <?php if(isset($_POST['Edit'])){
                      echo '<button name="submitEdit" type="submit" class="btn btn-block1 btn-outline-info">Submit Edit</button>';
                    }else{
                      echo '<button name="submit" type="submit" class="btn btn-block1 btn-outline-info">Submit Tambah</button>';
                    }
                    ?>
                  </div>
                </form>
              </div>
              <!-- /.card -->
              <?php if(isset($_POST['submit']) or isset($_POST['Hapus']) or isset($_POST['submitEdit'])){ ?>
              <!--TABEL DATA-->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Status Perkawinan</th>
                            <th>Pekerjaan</th>
                            <th>Kewarganegaraan</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Golongan Darah</th>
                            <th>Tool</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php while($semua_data_ok = $data_penduduk_db->fetch_array()){ ?>
                          <tr>
                            <td> <?php echo $semua_data_ok['nik'];?></td>
                            <td><?=$semua_data_ok['nama'];?> </td>
                            <td> <?=$semua_data_ok['gender'];?></td>
                            <td><?=$semua_data_ok['alamat'];?></td>
                            <td><?=$semua_data_ok['status'];?></td>
                            <td><?=$semua_data_ok['pekerjaan'];?></td>
                            <td><?=$semua_data_ok['warga'];?></td>
                            <td><?=$semua_data_ok['asal'];?></td>
                            <td><?=$semua_data_ok['tanggal'];?></td>
                            <td><?=$semua_data_ok['darah'];?></td>
                            <td>
                              <form action="" method="post">
                                <input type="hidden" class="form-control" id="id" name='id' value='<?=$semua_data_ok['id_penduduk'];?>'>
                                <input name='Hapus' value='Hapus' type="submit">
                              </form>
                              <form action='' method="post">
                                <input type="hidden" class="form-control" id="idEdit" name='idEdit' value='<?=$semua_data_ok['id_penduduk'];?>'>
                                <input name='Edit' value='Edit' type="submit">
                              </form>
                            </td> 
                          </tr>
                          <?php } ?> 
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
              <?php } ?>
            </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function (event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      })

      $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function (file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function () { myDropzone.enqueueFile(file) }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function (progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function (file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function (progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function () {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function () {
      myDropzone.removeAllFiles(true)
    }
  // DropzoneJS Demo Code End
</script>
</body>

</html>