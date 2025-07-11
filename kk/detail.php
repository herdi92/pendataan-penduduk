<!DOCTYPE html>
<?php 
include ("kk.php");
$new = new Kk();
include ("../penduduk/penduduk.php");
$pend = new Penduduk();

$_SESSION['aktif'] = 'kk';
$level = $_SESSION['level'];
if ($level == 'admin') {
    $menu = "../menu.php";
}else{
    $menu = "../menu_user.php";
}

//untuk select option
$agama = $new->get_agama();
$klasifikasi = $new->get_klasifikasi();

//read
if (isset($_GET['detail'])) {
    $penduduk = $new->get_penduduk_kk();
    $judul = $new->get_judul_kk();
    }

//edit
if (isset($_POST['edit_kk'])) {
    $new->jadikan_kk();
    }

//tambah anggota
if (isset($_POST['tambah_anggota'])) {
    $pend->tambah_anggota();
    }

//hapus anggota
if (isset($_GET['hapus'])) {
    $pend->hapus();
    }

$profil = "../profil.php";
$title = "ANGGOTA || KK || JIHAN";
 ?>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
<style>
.img4{
width:100px;
transition: all 0.5s;
-o-transition: all 0.5s;
-moz-transition: all 0.5s;
-webkit-transition: all 0.5s;
}
.img4:hover {
transition: all 0.3s;
-o-transition: all 0.3s;
-moz-transition: all 0.3s;
-webkit-transition: all 0.3s;
transform: scale(2.5);
-moz-transform: scale(2.5);
-o-transform: scale(2.5);
-webkit-transform: scale(2.5);
box-shadow: 2px 2px 6px rgba(0,0,0,0.5);
}
</style>
        <meta charset="utf-8">

        <title><?php echo $title; ?></title>

        <meta name="description" content="AppUI is a Web App Bootstrap Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="icon" type="image/png" href="../assets/img/logo.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="../assets/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="../assets/css/main.css">

        <!-- Include a specific file here from ../assets/css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="../assets/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="../assets/js/vendor/modernizr-3.3.1.min.js"></script>

        <!--file upload-->
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-fileupload.min.css" />
    </head>
    <body>
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper" class="page-loading">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in ../assets/js/app.js) - pageLoading() -->
            <!-- Used only if page preloader enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
            <div class="preloader">
                <div class="inner">
                    <!-- Animation spinner for all modern browsers -->
                    <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

                    <!-- Text for IE9 -->
                    <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
                </div>
            </div>
            <!-- END Preloader -->

            <!-- Page Container -->
            <!-- In the PHP version you can set the following options from inc/config file -->
            <!--
                Available #page-container classes:

                'sidebar-light'                                 for a light main sidebar (You can add it along with any other class)

                'sidebar-visible-lg-mini'                       main sidebar condensed - Mini Navigation (> 991px)
                'sidebar-visible-lg-full'                       main sidebar full - Full Navigation (> 991px)

                'sidebar-alt-visible-lg'                        alternative sidebar visible by default (> 991px) (You can add it along with any other class)

                'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
                'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

                'fixed-width'                                   for a fixed width layout (can only be used with a static header/main sidebar layout)

                'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links (You can add it along with any other class)
            -->
            <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">

                <!-- Main Sidebar -->
                <?php include $menu; ?>
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Header -->
                    <!-- In the PHP version you can set the following options from inc/config file -->
                    <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in ../assets/js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in ../assets/js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
                    <header class="navbar navbar-inverse navbar-fixed-top">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                                    <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                                </a>
                            </li>
                            <!-- END Main Sidebar Toggle Button -->

                            <!-- Header Link -->
                            <li class="hidden-xs animation-fadeInQuick">
                                <a href="../pilihan.php"><strong>SELAMAT DATANG DI PENDATAAN WARGA</strong></a>
                            </li>
                            <!-- END Header Link -->
                        </ul>
                        <!-- END Left Header Navigation -->

                        <!-- Right Header Navigation -->
                            <?php include $profil; ?>
                        <!-- END Right Header Navigation -->
                    </header>
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Table Styles Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1><?php echo $title; ?></h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                            <li><a href="../dashboard">JIHAN</a></li>
                                            <li><a href="../pilihan.php?menu=4">KK</a></li>
                                            <li>ANGGOTA</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Table Styles Header -->

                        <!-- Datatables Block -->
                        <!-- Datatables is initialized in ../assets/js/pages/uiTables.js -->
                        <?php 
                            if (isset($_COOKIE['alert'])) {
                                echo $_COOKIE['alert'];
                            }else{
                                echo "";
                            }
                        ?>
                        <div class="block full">
                            <div class="block-title">
                                <h2><i class="fa fa-user sidebar-nav-icon"></i>  KELUARGA <?php echo $judul['nama'] ?></h2>
                            </div>
                            <a href="#modal-fade" title="Tambah Agama" class="btn btn-effect-ripple btn-info" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Keluarga</a>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">No</th>
                                            <th>KK</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat, Tanggal Lahir</th>
                                            <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i> Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=0; foreach ($penduduk as $row): $no++?>
                                        <tr>
                                            <td class="text-center"><?php echo $no; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    $id = $row['nik'];
                                                    include('../koneksi.php');
                                                    $jum = $_mysqli->query("SELECT penduduk.nama FROM penduduk, kk 
                                                                            WHERE penduduk.nik = kk.kepala_keluarga
                                                                            AND kk.kepala_keluarga = '$id'");
                                                    $jumlah = mysqli_num_rows($jum);
                                                if ($jumlah > 0) {
                                                    echo '<a href="#" data-toggle="tooltip" title="Kepala Keluarga" class="btn btn-effect-ripple btn-primary"><i class="fa fa-users"></i></a>';
                                                }else{
                                                    echo '
                                                <form action="detail.php" method="post">
                                                    <input type="hidden" name="no_kk" value="'.$row['no_kk'].'">
                                                    <input type="hidden" name="nik" value="'.$row['nik'].'">
                                                    <button type="submit" name="edit_kk" href="" data-toggle="tooltip" title="Jadikan Kepala Keluarga" class="btn btn-effect-ripple btn-default"><i class="fa fa-cube"></i></button>
                                                </form>'; 
                                                }
                                                ?>
                                            </td>
                                            <td><strong><?php echo $row['nik'] ?></strong></td>
                                            <td><?php echo $row['nama'] ?></td>
                                            <td>
                                                <?php 
                                                    if ($row['jk'] == "L") {$tampil = "LAKI - LAKI";} 
                                                    else {$tampil = "PEREMPUAN";}
                                                ?>
                                                <?php echo "$tampil"; ?>
                                            </td>
                                            <td><?php echo $row['tempat_lahir'].", ".$row['tanggal_lahir'] ?></td>
                                            <td class="text-center" width="200px">
                                                <a href="../penduduk/detail.php?detail=<?php echo $row['nik'] ?>" data-toggle="tooltip" title="Detail <?php echo $row['nama'] ?>" class="btn btn-effect-ripple btn-warning"><i class="fa fa-search"></i></a>
                                                <a href="../penduduk/edit.php?edit=<?php echo $row['nik'] ?>" data-toggle="tooltip" title="Edit <?php echo $row['nama'] ?>" class="btn btn-effect-ripple btn-success"><i class="fa fa-pencil"></i></a>
                                                <a href="detail.php?hapus=<?php echo $row['nik'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row['nama']?>');" data-toggle="tooltip" title="Hapus <?php echo $row['nama'] ?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Block -->
                    </div>
                    <!-- END Page Content -->

                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Regular Fade -->
        <div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title"><strong><i class="fa fa-plus"></i> Tambah Penduduk</strong></h3>
                    </div>
                    <div class="modal-body">
                        <form id="form-validation" action="detail.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control" id="val-number" required placeholder="Masukkan NIK">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control"  placeholder="Masukkan Tempat Lahir" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input id="example-datepicker3" type="text" name="tanggal_lahir" class="form-control input-datepicker"  placeholder="Tanggal/Bulan/Tahun" data-date-format="dd-mm-yyyy" required>
                            </div>
                            <div class="form-group">
                                <label>JK</label>
                                <select name="jk" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Golongan Darah</label>
                                <select name="golongan_darah" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Pilih Golongan Darah--</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <select name="pendidikan" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Pilih Pendidikan--</option>
                                    <option value="SD">SD Sederajat</option>
                                    <option value="SMP">SMP Sederajat</option>
                                    <option value="SMA">SMP Sederajat</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4 / S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <select name="pekerjaan" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Pilih Pekerjaan--</option>
                                    <option value="KARYAWAN SWASTA">KARYAWAN SWASTA</option>
                                    <option value="PNS">PNS</option>
                                    <option value="PELAJAR/MAHASISWA">PELAJAR/MAHASISWA</option>
                                    <option value="PETANI" >PETANi</option>
                                    <option value="WIRAUSAHA">WIRAUSAHA</option>
                                    <option value="TIDAK BEKERJA">TIDAK BEKERJA</option>
                                    <option value="Lainnya">WIRAUSAHA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status Perkawinan</label>
                                <select name="status_perkawinan" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Status Perkawinan--</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kewarganegaraan</label>
                                <select name="kewarganegaraan" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Kewarganegaraan--</option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <select name="id_agama" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Pilih Agama--</option>
                                <?php foreach($agama as $row): ?>
                                    <option value="<?php echo $row['id_agama'] ?>"><?php echo $row['nama_agama'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Klasifikasi</label>
                                <?php 
                                    //tahun_sekarang
                                    date_default_timezone_set('Asia/Jakarta');
                                    $sekarang = date("Y");
                                ?>
                                <select name="id_klasifikasi" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Klasifikasi Penduduk--</option>
                                <?php foreach($klasifikasi as $rows): ?>
                                    <option value="<?php echo $rows['id_klasifikasi'] ?>"><?php echo $rows['nama_klasifikasi'] ?></option>
                                <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="no_kk" value="<?php echo $_GET['detail'] ?>">
                            </div>
                            <div class="form-group">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="" alt=""/>
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                       <span class="btn btn-default btn-file">
                                       <span class="fileupload-new"><i class="fa fa-camera"></i> Tambah Foto</span>
                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                       <input type="file" class="default" name="foto" required/>
                                       </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>
                            </div>
                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" name="tambah_anggota">Tambah</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Regular Fade -->

        <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="../assets/js/vendor/bootstrap.min.js"></script>
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="../assets/js/pages/uiTables.js"></script>
        <script>$(function () {UiTables.init();});</script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="../assets/js/pages/formsValidation.js"></script>
        <script>$(function(){ FormsValidation.init(); });</script>

        <!--file upload-->
        <script type="text/javascript" src="../assets/js/bootstrap-fileupload.min.js"></script>

    </body>
</html>