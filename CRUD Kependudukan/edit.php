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

  function set_all_data($nik,$nama,$gender,$alamat,$status,$pekerjaan,$warga,$asal,$tanggal,$darah){
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

  function ambildata_by_id($koneksi, $id){
    $data_id = "SELECT * FROM data WHERE id_penduduk = '$id'";
    $proses_data_id = mysqli_query($koneksi, $data_id);
    return $proses_data_id;
    }

    function update_data($koneksi,$id_penduduk,$nik,$nama,$gender,$alamat,$status,$pekerjaan,$warga,$asal,$tanggal,$darah){
        $updatedata = "UPDATE data SET nik = '$nik', nama = '$nama', gender = '$gender', alamat = '$alamat', status = '$status', pekerjaan = '$pekerjaan', warga = '$warga', asal = '$asal', tanggal = '$tanggal', darah = '$darah' WHERE id_penduduk = '$id_penduduk' ";
        $proses_update = mysqli_query($koneksi, $updatedata);
        return $proses_update;
    }
}

$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'kependudukan';
$db = new database($host,$user,$pass,$db);
$koneksi = $db->conn_mysql();

if (isset($_POST["Edit"])) {
    $id_penduduk = $_POST["id"];

    $penduduk = new penduduk();

    $data_penduduk = $penduduk->ambildata_by_id($koneksi, $id_penduduk);

    $semua_data = $data_penduduk->fetch_array();
}else {
    header("Location: data_penduduk.php");
}

if (isset($_POST["EditData"])) {
    $id_penduduk = $_POST["id_update"];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];
    $asal = $_POST['asal'];
    $warga = $_POST['warga'];
    $status = $_POST['status'];
    $tanggal = $_POST['tanggal'];
    $darah = $_POST['darah'];

    $penduduk_post = new penduduk();

    $penduduk_post->update_data($koneksi,$id_penduduk,$nik,$nama,$gender,$alamat,$status,$pekerjaan,$warga,$asal,$tanggal,$darah);

    echo "
    <script>
        alert('Data berhasil diubah!');
        document.location.href = 'index.php';
    </script>
";
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
                <h1>Edit Data Penduduk</h1>
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
                    <input type="hidden" name="id_update" value="<?= $semua_data["id_penduduk"]; ?>">
                    <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" class="form-control" id="nik" value="<?= $semua_data["nik"]; ?>" name="nik" placeholder="Masukkan NIK">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control" id="nama" value="<?= $semua_data["nama"]; ?>" name="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Jenis Kelamin</label>
                      <select class="form-control" id="gender" name="gender">
                        <option value="Laki-laki" <?php if ($semua_data["gender"] == "Laki-laki") {  ?> selected="selected" <?php }  ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if ($semua_data["gender"] == "Perempuan") {  ?> selected="selected" <?php }  ?>>Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <input type="text" class="form-control" value="<?= $semua_data["alamat"]; ?>" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Status Perkawinan</label>
                      <select class="form-control" name="status" id="status">
                        <option value="Belum Kawin" <?php if ($semua_data["status"] == "Belum Kawin") {  ?> selected="selected" <?php }  ?>>Belum Kawin</option>
                        <option value="Kawin" <?php if ($semua_data["status"] == "Kawin") {  ?> selected="selected" <?php }  ?>>Kawin</option>
                        <option value="Cerai Hidup" <?php if ($semua_data["status"] == "Cerai Hidup") {  ?> selected="selected" <?php }  ?>>Cerai Hidup</option>
                        <option value="Cerai Mati" <?php if ($semua_data["status"] == "Cerai Mati") {  ?> selected="selected" <?php }  ?>>Cerai Mati</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Pekerjaan</label>
                      <input type="text" class="form-control" value="<?= $semua_data["pekerjaan"]; ?>" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Kewarganegaraan</label>
                      <select class="form-control" name="warga" id="warga">
                        <option value="WNI" <?php if ($semua_data["warga"] == "WNI") {  ?> selected="selected" <?php }  ?>>WNI</option>
                        <option value="WNA" <?php if ($semua_data["warga"] == "WNA") {  ?> selected="selected" <?php }  ?>>WNA</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tempat Lahir</label>
                      <input type="text" class="form-control" value="<?= $semua_data["asal"]; ?>" id="asal" name="asal" placeholder="Masukkan Tempat Lahir">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tanggal Lahir</label>
                      <input type="date" class="form-control" value="<?= $semua_data["tanggal"]; ?>" id="tanggal" name="tanggal">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Golongan Darah</label>
                      <select class="form-control" name="darah" id="darah">
                        <option value="A" <?php if ($semua_data["darah"] == "A") {  ?> selected="selected" <?php }  ?>>A</option>
                        <option value="B" <?php if ($semua_data["darah"] == "B") {  ?> selected="selected" <?php }  ?>>B</option>
                        <option value="AB" <?php if ($semua_data["darah"] == "AB") {  ?> selected="selected" <?php }  ?>>AB</option>
                        <option value="O" <?php if ($semua_data["darah"] == "O") {  ?> selected="selected" <?php }  ?>>O</option>
                      </select>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button name="EditData" type="submit" class="btn btn-block1 btn-outline-info">Submit Tambah</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
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