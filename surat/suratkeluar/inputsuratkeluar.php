<?php
// KONEKSI KE DATABASE
include 'koneksi.php';
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
 
            <form action="inputsuratkeluar_proses.php" class="inner-login" method="post" > 
                  <tr>
                  <th colspan="2" scope="row"><h2><b><center>INPUT DATA SURAT KELUAR</center></b></h2></th> 
                  </tr>

                    <br><br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">NO REGRISTRASI</th> <br>
                <td><input type="text" name="no_regrisKeluar" id="no_regrisKeluar" class="form-control" required></td>
                </tr>
                </div>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">NO SURAT</th> <br>
                <td><input type="text" name="no_suratKeluar" id="no_suratKeluar" class="form-control" required></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">TANGGAL KELUAR SURAT</th> <br>
                <td><input type="date" name="tgl_suratKeluar" id="tgl_suratKeluar" class="form-control" required></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
               <th  class="cal-sm-2" scope="row">KEPADA</th> <br>
                <td><input type="text" name="kepada" id="kepada" class="form-control" required></td>
                </tr>
                </div>
                <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">PERIHAL </th> <br>
                <td><input type="text" name="perihal" id="perihal" class="form-control" required></td>
                </tr>
                </div>
                 <br>
                 <div class="form-group ">
                <label for="bidang_mengajukan">BIDANG MENGAJUKAN</label>
                <select id="bidang_mengajukan" name="bidang_mengajukan">
                    <option>Choose...</option>
                    <option value="Sekertaris">Sekertaris</option>
                    <option value="Bidang Penanaman Modal">Bidang Penanaman Modal</option>
                    <option value="Bidang Pelayanan Perizinan">Bidang Pelayanan Perizinan</option>
                    <option value="Bidang Pengembangan, Informasi dan Pengaduan">Bidang Pengembangan, Informasi dan Pengaduan</option>
                    <option value="Bidang Hubungan Industrial dan Tenaga Kerja">Bidang Hubungan Industrial dan Tenaga Kerja</option>
                    <option value="Bidang Penempatan dan Pelatihan Tenaga Kerja">Bidang Penempatan dan Pelatihan Tenaga Kerja</option>
                </select>
                </div>
                <br>
               <div class="custom-file">
                <th  class="cal-sm-2" scope="row">FILE SURAT </th> <br>
                   <td> <input type="file" class="custom-file-input" name="file_suratKeluar" id="file_suratKeluar" required>
                    
                    </tr>
                </div>
                <br>
                 <tr>
                  <th colspan="2" scope="row">
                  <input type="submit" name="simpan" id="simpan" class="btn btn-success" value="Simpan" />
                  <input type="reset" name="reset" id="reset" class="btn btn-success" value="Batal" /></th>
                  </tr>
                <br>
                <br>
                <tr>
                <p>  <a class="btn btn-success" href="halamansuratkeluar.php">Kembali</a></a><p> 
                </tr>
        </form>
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
