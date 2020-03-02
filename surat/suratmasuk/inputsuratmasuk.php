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
                <a class="navbar-brand" href="index.php">Surat Masuk</a> 
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
                        <a href="halamansuratmasuk.php"><i class="fa  fa-envelope-o" style="font-size:36px"></i>Surat Masuk</a>
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
       <div id="page-wrapper"  >
            <div class="container">
            <div class="card col-sm-8" style="background-color: #CCCCFF;"> 
               <form action="inputsuratmasuk_proses.php" class="inner-login" method="post"> 
                  <tr>
                  <th colspan="2" scope="row"><h2><b>&nbsp;&nbsp;&nbsp;&nbsp; INPUT DATA SURAT MASUK BARU</b></h2></th> 
                  </tr>

                    <br><br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">NO REGRISTRASI</th> <br>
                <td><input type="text" name="no_regrisMasuk" id="no_regrisMasuk" class="form-control" required></td>
                </tr>
                </div>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">NOMOR SURAT </th> <br>
                <td><input type="text" name="no_suratMasuk" id="no_suratMasuk" class="form-control" required>
                </td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">TANGGAL MASUK SURAT</th> <br>
                <td><input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" required></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <label for="exampleFormControlTextarea1">ALAMAT PENGRIRIM</label>
                <input class="form-control" name="alamat_pengirim" id="alamat_pengirim"></textarea>
                </tr>
                </div>
                <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">TANGGAL SURAT </th> <br>
                <td><input type="date" name="tgl_surat" id="tgl_surat" class="form-control"></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">PERIHAL </th> <br>
                <td>  <textarea class="form-control" name="perihal" id="perihal" rows="2" required></textarea></td>
                </tr>
                </div>
                 <br>
                <div class="custom-file">
                <th  class="cal-sm-2" scope="row">FILE SURAT </th> <br>
                   <td> <input type="file" name="file_surat" class="custom-file-input" id="file_surat" required>
                    <label class="custom-file-label" for="validatedCustomFile"></label></td>
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
                <p>  <a class="btn btn-success" href="halamansuratmasuk.php">Kembali</a></a><p> 
                </tr>
            
        </div>
    </div>
</div>
</form>

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
