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
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script src="dist/jquery/jquerycekbarang.js"></script>
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
   
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        
                        <ol class="breadcrumb">
                            <h1 class="page-header">
                            Arsip Surat
                        </h1>
                            Berikut ini adalah surat-surat yang telah terbit dan diarsipkan <br>
                            Klik "Lihat" pada kolom aksi untuk menampilkan surat
                        </ol>
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">

                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">


                                    <form action="index.php" method="get">

                                        <label>Cari Surat :</label>
                                        <input type="text" style="width: 500px; height: 32px;" name="cari" 
                                            placeholder="Search">


                                        <label></label>
                                        <input type="submit" class="btn btn-primary" value="Cari">


                                    </form>
                                    <br>

                                    <?php 
                                    if(isset($_GET['cari'])){
                                        $cari = $_GET['cari'];
                                        echo "<b>Hasil pencarian judul surat : ".$cari."</b>";
                                    }
                                    ?>
                                    <br></form>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Kategori</th>
                                                <th>Judul</th>
                                                <th>Waktu Pengarsipan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                        include 'koneksi.php';
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$query = mysqli_query($koneksi,"SELECT arsip_surat.id, arsip_surat.nomor_surat, arsip_surat.judul, arsip_surat.waktu_pengarsipan, arsip_surat.file_surat, kategori.nama_kategori
        FROM arsip_surat, kategori
        WHERE arsip_surat.id_kategori = kategori.id_kategori AND arsip_surat.judul like '%".$cari."%'");				
	}else{
		$query = mysqli_query($koneksi, "SELECT arsip_surat.id, arsip_surat.nomor_surat, arsip_surat.judul, arsip_surat.waktu_pengarsipan, arsip_surat.file_surat, kategori.nama_kategori
                                            FROM arsip_surat, kategori
                                            WHERE arsip_surat.id_kategori = kategori.id_kategori");		
	}
	$jumlah = mysqli_num_rows($query);
                                            while ($data = mysqli_fetch_array($query)){
	?>
                                            <!-- <?php 
                                            // include 'koneksi.php';
                                            // $query = mysqli_query($koneksi, "SELECT arsip_surat.id, arsip_surat.nomor_surat, arsip_surat.judul, arsip_surat.waktu_pengarsipan, arsip_surat.file_surat, kategori.nama_kategori
                                            // FROM arsip_surat, kategori
                                            // WHERE arsip_surat.id_kategori = kategori.id_kategori");
                                            // $jumlah = mysqli_num_rows($query);
                                            // while ($data = mysqli_fetch_array($query)){
                                            ?> -->
                                            <tr>
                                                <td><?php echo $data['nomor_surat'] ?></td>
                                                <td><?php echo $data['nama_kategori'] ?></td>
                                                <td><?php echo $data['judul'] ?></td>
                                                <td><?php echo $data['waktu_pengarsipan'] ?></td>
                                                <td>
                                                    <a href="#"
                                                        onclick="confirm_modal('hapus_surat.php?&id=<?php echo  $data['id']; ?>');"><button
                                                            class="btn btn-danger" title="Hapus"><i
                                                                class="fa fa-ban"></i> Hapus</button></a>
                                                    <a href="files/<?php echo $data['file_surat'];?>"
                                                        class="btn btn-success" donwload><i class="fa fa-download"></i>
                                                        Unduh</a>
                                                    <!-- <a id="unduhfile"> <button class="btn btn-success">Unduh File</button></a>  -->
                                                    <a href="lihat_surat.php?id=<?php echo $data['id'];?>"
                                                        class="btn btn-info"><i class="fa fa-eye"></i>
                                                        Lihat</a>
                                                </td>
                                            </tr>


                                            <?php }?>
                                        </tbody>
                                    </table>
                                    <div class="text-align right">
                                    <a href="tambah_surat.php" class="btn btn-primary"><i class="fa fa-plus"></i>
                                        Arsipkan
                                        Surat</a>

                                </div>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
            </div>
            <!-- /. ROW  -->

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
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <!-- Javascript untuk popup modal Delete-->
    <script type="text/javascript">
        function confirm_modal(delete_url) {
            $('#modal_delete').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', delete_url);
        }
    </script>
    <!-- <script>
    var file_surat
    // menampilkan pdf
		var a = '/sertifikasi_surat/files/' + $(this).data('file_surat');
		console.log(a);
		$('.cobak').html('<iframe id="tampil" src="' + a + '" height="550" width="100%" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" allowtransparency="true"  frameborder="0"></iframe>');

		// unduh button from modal lihat
		$("#unduhfile").attr("href", a)

		$('#ModalLihat').modal({
			backdrop: 'static',
			keyboard: false, // to prevent closing with Esc button (if you want this too)
			show: true
		})
	});

</script> -->

    <!-- page script -->
    //modal hapus
    <div class="modal fade" id="modal_delete">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Anda yakin akan menghapus data ini ?</h4>
                </div>

                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</body>


</html>