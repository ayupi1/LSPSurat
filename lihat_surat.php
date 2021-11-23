<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi Arsip Surat</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">





            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="index.php"></i> MENU</a>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-star"></i> Arsip</a>
                    </li>
                    <li>
                        <a href="about.php"><i class="fa fa-warning"></i> About</a>
                    </li>
                   
                   

                  
                    
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
            <div class="row">
                    <div class="col-md-6">
                        <h1 class="page-header">
                            Arsip Surat >> Lihat
                        </h1>
                    </div>
                    
                </div>
                <?php
                include "koneksi.php";
$id    = mysqli_real_escape_string($koneksi,$_GET['id']);
$query = mysqli_query($koneksi,"SELECT arsip_surat.id, arsip_surat.nomor_surat, arsip_surat.judul, arsip_surat.waktu_pengarsipan, arsip_surat.file_surat, kategori.nama_kategori
FROM arsip_surat, kategori 
WHERE id='$id'
AND arsip_surat.id_kategori = kategori.id_kategori ");
$data  = mysqli_fetch_array($query);
?>
<hr>
<h5>Nomor Surat: <?php echo $data['nomor_surat'];?></h5>
<h5>Kategori: <?php echo $data['nama_kategori'];?></h5>
<h5>Judul:</b> <?php echo $data['judul'];?></h5>
<h5>Waktu Pengarsipan: <?php echo $data['waktu_pengarsipan'];?></h5>
<hr>
 <embed src="files/<?php echo $data['file_surat'];?>" type="application/pdf" width="1000" height="600" >

 <br><br>
 
 <a href="index.php" class="btn btn-default"><< Kembali</a>
 <a href="files/<?php echo $data['file_surat'];?>" class="btn btn-success" donwload><i class="fa fa-download"></i> Unduh</a>
 <a href="#" class="btn btn-warning"><i class="fa fa-pencil"></i>Edit File</a>


                </div>
            </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>
