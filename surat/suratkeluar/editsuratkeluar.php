<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include 'koneksi.php';

  // mengecek apakah di url ada nilai GET no_regrisKeluar
  if (isset($_GET['no_regrisKeluar'])) {
    // ambil nilai no_regrisKeluar dari url dan disimpan dalam variabel $no_regrisKeluar
    $no_regrisKeluar = ($_GET["no_regrisKeluar"]);

    // menampilkan data suratkeluar dari database yang mempunyai no_regrisKeluar=$no_regrisKeluar
    $query = "SELECT * FROM suratkeluar WHERE no_regrisKeluar='$no_regrisKeluar'";
    $result = mysqli_query($mysqli, $query);
    // mengecek apakah query gagal
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database dan membuat variabel" utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $data = mysqli_fetch_assoc($result);
    $no_regrisKeluar = $data['no_regrisKeluar'];
    $no_suratKeluar = $data['no_suratKeluar'];
    $tgl_suratKeluar = $data['tgl_suratKeluar'];
    $kepada = $data['kepada'];
    $perihal = $data['perihal'];
    $bidang_mengajukan = $data['bidang_mengajukan'];
    $file_suratKeluar = $data['file_suratKeluar'];

  } 

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Surat Keluar</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><?php echo "Last access :" . date("d-m-y"); ?>  &nbsp; <a href="../../index.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/kotabatu.png" class="user-image img-responsive"/>
					</li>           
                    <li>
                        <a href="halamansuratkeluar.php"><i class="fa  fa-envelope-o" style="font-size:36px"></i>Surat Keluar</a>
                    </li>
                    <li>
                        <a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </a>
                    </li>
                </ul>
            </div>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div class="container">
            <div class="card col-sm-8" style="background-color: #CCCCFF;"> 
 
            <form action="editsuratkeluar_proses.php" class="inner-login" id="form_suratkeluar" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="no_regrisKeluar" value="<?php echo $no_regrisKeluar; ?>" >
                  <tr>
                  <th colspan="2" scope="row"><h2><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Edit Data Surat Keluar</b></h2></th> 
                  </tr>

                    <br><br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">NO REGRISTRASI</th> <br>
                <td><input type="text" name="no_regrisKeluar" id="no_regrisKeluar" class="form-control" value="<?php echo $no_regrisKeluar ?>" disabled></td>
                </tr>
                </div>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">NOMOR SURAT </th> <br>
                <td><input type="text" name="no_suratKeluar" id="no_suratKeluar" class="form-control" value="<?php echo $no_suratKeluar ?>"></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">TANGGAL KELUAR SURAT</th> <br>
                <td><input type="date" name="tgl_suratKeluar" id="tgl_suratKeluar" class="form-control" value="<?php echo $tgl_suratKeluar ?>"></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">KEPADA </th> <br>
                <td><input type="text" name="kepada" id="kepada" class="form-control" value="<?php echo $kepada ?>"></td>
                </tr>
                </div>
                <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row"> PERIHAL </th> <br>
                <td><input type="text" name="perihal" id="perihal" class="form-control" value="<?php echo $perihal ?>"></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">BIDANG MENGAJUKAN</label>
                <input type="text" class="form-control" name="bidang_mengajukan" id="bidang_mengajukan" rows="3"  value="<?php echo $bidang_mengajukan ?>"></td>
                </tr>
                </div>
                <br>
               <div class="custom-file">
               <tr>
                <th  class="cal-sm-2" scope="row">FILE SURAT </th> <br>
                   <td> 
                    <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
                    <input type="file" name="file_suratKeluar" id="file_suratKeluar">
                   </td>
                 </tr>
                </div>
                    <br>
                 <tr>
                  <th colspan="2" scope="row">
                  <input type="submit" name="edit" class="btn btn-success" value="Perbarui Data" />
                  <input type="reset" class="btn btn-success" name="button2" id="button2" value="Batal" />
                  </tr>
                  </th>
                  
                <br>
                <br>
            
        </div>
    </div>
</div>
</form>
        </div>
                 <!-- /. ROW  -->           
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
