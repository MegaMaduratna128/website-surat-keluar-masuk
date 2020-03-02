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
                <a class="navbar-brand" href="index.php">Super Admin</a> 
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
                        <a href="halamanusersm.php"><i class="fa fa-group" style="font-size:36px"></i>User Surat Masuk</a>
                    </li>
                    <li>
                        <a href="halamanusersk.php"><i class="fa fa-group" style="font-size:36px"></i>User Surat Keluar</a>
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
                <div class="card col-sm-8 min-height:1200px;" style="background-color: #CCCCFF;" > 
            <form action="inputusersm_proses.php" class="inner-login" method="post"> 
                  <tr>
                  <th colspan="2" scope="row"><h2><b>&nbsp;&nbsp;&nbsp;&nbsp; INPUT USER SURAT MASUK BARU</b></h2></th> 
                  </tr>

                    <br><br>

                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row"> NIP </th> <br>
                <td><input type="text" name="NIP" id="NIP" class="form-control" required></td>
                </tr>
                </div>
                <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row"> NAMA PEGAWAI </th> <br>
                <td><input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" required></td>
                </tr>
                </div>
                 <br>
                 <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row"> NO HP </th> <br>
                <td><input type="text" name="no_hp" id="no_hp" class="form-control" required></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <label for="exampleFormControlTextarea1"> ALAMAT </label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
                </tr>
                </div>
                <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row"> USERNAME </th> <br>
                <td><input type="text" name="username_usersm" id="username_usersm" class="form-control" required></td>
                </tr>
                </div>
                 <br>
                 <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row"> PASSWORD </th> <br>
                <td><input type="text" name="password_usersm" id="password_usersm" class="form-control" required></td>
                </tr>
                </div>
                 <br>
            
                 <tr>
                  <th colspan="2" scope="row">
                  <input type="submit" name="simpan" id="simpan" class="btn btn-success" value="Simpan" />
                  <input type="reset" name="reset" id="reset" class="btn btn-success" value="Batal" />
                  </th>
                 </tr>
                <br>
                <br>
                <tr>
                <p>  <a class="btn btn-success" href="halamanusersm.php">Kembali</a></a><p> 
                </tr>
            
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
