<?php
require "class/Database.php";
require "class/Penduduk.php";

if (isset($_POST["ubah"])) {
    $id_penduduk = $_POST["id"];

    $penduduk = new Penduduk();

    $data_penduduk = $penduduk->ambildata_by_id($koneksi, $id_penduduk);

    $semua_data = $data_penduduk->fetch_array();
} else {
    header("Location: data_penduduk.php");
}

if (isset($_POST["update-data"])) {
    $id_penduduk = $_POST["id_update"];
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

    $penduduk_post->update_data($koneksi, $id_penduduk, $nik, $nama, $jenis_kelamin, $alamat, $pekerjaan, $tempat_lahir, $warga, $perkawinan, $tgl_lahir, $gol_darah);

    echo "
    <script>
        alert('Data berhasil diubah!');
        document.location.href = 'data_penduduk.php';
    </script>
";
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
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="css/style.css">
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
                            <h1 class="mt-3">Update Data Penduduk</h1>
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
                            <input type="hidden" name="id_update" value="<?= $semua_data["id_penduduk"]; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nik">Nomor Induk Kewarganegaraan (NIK)</label>
                                    <input required name="nik" type="number" class="form-control" id="nik"
                                        placeholder="Masukkan NIK Anda" value="<?= $semua_data["nik"]; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input required name="nama" type="text" class="form-control" id="nama"
                                        placeholder="Masukkan nama lengkap" value="<?= $semua_data["nama"]; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat Rumah</label>
                                    <input required name="alamat" type="text" class="form-control" id="alamat"
                                        placeholder="Masukkan alamat rumah" value="<?= $semua_data["alamat"]; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input required name="pekerjaan" type="text" class="form-control" id="pekerjaan"
                                        placeholder="Masukkan pekerjaan Anda" value="<?= $semua_data["pekerjaan"]; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Kelahiran</label>
                                    <input required name="tempat_lahir" type="text" class="form-control"
                                        id="tempat_lahir" placeholder="Masukkan tempat kelahiran"
                                        value="<?= $semua_data["tempat_lahir"]; ?>">
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <div>
                                            <label>Golongan darah</label>
                                            <select name="gol_darah" class="form-control select2" style="width: 100%;">
                                                <option value="A" <?php if ($semua_data["gol_darah"] == "A") {  ?>
                                                    selected="selected" <?php }  ?>>A</option>
                                                <option value="B" <?php if ($semua_data["gol_darah"] == "B") {  ?>
                                                    selected="selected" <?php }  ?>>B</option>
                                                <option value="O" <?php if ($semua_data["gol_darah"] == "O") {  ?>
                                                    selected="selected" <?php }  ?>>O</option>
                                                <option value="AB" <?php if ($semua_data["gol_darah"] == "AB") {  ?>
                                                    selected="selected" <?php }  ?>>AB</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        <div>
                                            <label for="reservationdate">Tanggal Lahir</label>
                                            <input type="date"
                                                class="d-block w-100 bg-dark border-white px-2 py-1 rounded"
                                                name="tgl_lahir" value="<?= $semua_data["tgl_lahir"]; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label>Kewarganegaraan</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-blue" type="radio"
                                                id="warga" name="warga" value="WNI"
                                                <?php if ($semua_data["warga"] == "WNI") {  ?> checked <?php }  ?>>
                                            <label for="warga" class="custom-control-label d-block">Warga Negara
                                                Indonesia</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-blue" type="radio"
                                                id="wna" name="warga" value="WNA"
                                                <?php if ($semua_data["warga"] == "WNA") {  ?> checked <?php }  ?>>
                                            <label for="wna" class="custom-control-label">Warga Negara Asing</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="alamat">Status Perkawinan</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-blue" type="radio"
                                                id="sudah" name="perkawinan" value="Sudah Menikah"
                                                <?php if ($semua_data["perkawinan"] == "Sudah Menikah") {  ?> checked
                                                <?php }  ?>>
                                            <label for="sudah" class="custom-control-label d-block">Sudah
                                                Menikah</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-blue" type="radio"
                                                id="belum" name="perkawinan" value="Belum Menikah"
                                                <?php if ($semua_data["perkawinan"] == "Belum Menikah") {  ?> checked
                                                <?php }  ?>>
                                            <label for="belum" class="custom-control-label">Belum Menikah</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Jenis Kelamin</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-blue" type="radio"
                                                id="pria" name="jenis_kelamin" value="Pria"
                                                <?php if ($semua_data["jenis_kelamin"] == "Pria") {  ?> checked
                                                <?php }  ?>>
                                            <label for="pria" class="custom-control-label d-block">Pria</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-blue" type="radio"
                                                id="wanita" name="jenis_kelamin" value="Wanita"
                                                <?php if ($semua_data["jenis_kelamin"] == "Wanita") {  ?> checked
                                                <?php }  ?>>
                                            <label for="wanita" class="custom-control-label">Wanita</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary px-5" name="update-data">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- jQuery -->
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

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
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'))
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

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
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

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
            myDropzone.enqueueFile(file)
        }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
    </script>
</body>

</html>