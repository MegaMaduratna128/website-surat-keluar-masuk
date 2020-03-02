<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include 'koneksi.php';

  // mengecek apakah di url ada nilai GET NIP
  if (isset($_GET['NIP'])) {
    // ambil nilai NIP dari url dan disimpan dalam variabel $NIP
    $NIP = ($_GET["NIP"]);

    // menampilkan data user surat keluar dari database yang mempunyai NIP=$NIP
    $query = "SELECT * FROM user_sk WHERE NIP='$NIP'";
    $result = mysqli_query($mysqli, $query);
    // mengecek apakah query gagal
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database dan membuat variabel" utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $data = mysqli_fetch_assoc($result);
    $NIP = $data['NIP'];
    $nama_pegawai = $data['nama_pegawai'];
    $no_hp = $data['no_hp'];
    $alamat = $data['alamat'];
    $username_usersk = $data['username_usersk'];
    $password_usersk = $data['password_usersk'];
    $pw_decrypt = base64_decode($password_usersk);

    echo $pw_decrypt;

  } else {
    echo 'Gagal mengedit data data! ';
    echo '<a href="halamanusersk.php?NIP='.$NIP.'"> Kembali</a>';
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
               <div class="card col-sm-6" style="background-color: #CCCCFF;"> 
 
            <form action="editusersk_proses.php" class="inner-login" id="form_usersm" method="post"> 
            <input type="hidden" name="NIP" value="<?php echo $NIP; ?>" >
                  <tr>
                  <th colspan="2" scope="row"><h2><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit User Surat Keluar</b></h2></th> 
                  </tr>

                    <br><br>

                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row"> NIP </th> <br>
                <td><input type="text" name="NIP" id="NIP" class="form-control" value="<?php echo $NIP ?>" disabled></td>
                </tr>
                </div>
                <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">NAMA PEGAWAI </th> <br>
                <td><input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" value="<?php echo $nama_pegawai ?>"></td>
                </tr>
                </div>
                 <br>
                 <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">NO HP </th> <br>
                <td><input type="text" name="no_hp" id="no_hp" class="form-control" value="<?php echo $no_hp ?>"></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <th  class="col-md-9" scope="row">ALAMAT </th> <br>
                <td><input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $alamat ?>"></td>
                </tr>
                </div>
                 <br>
                 <div class="form-group">
                <tr>
                <th  class="col-md-9" scope="row">USERNAME </th> <br>
                <td><input type="text" name="username_usersk" id="username_usersk" class="form-control" value="<?php echo $username_usersk ?>"></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <th  class="col-md-9" scope="row">PASSWORD </th> <br>
                <td><input type="text" name="password_usersk" id="password_usersk" class="form-control" value="<?php echo $pw_decrypt ?>"></td>
                </tr>
                </div>
                 <br>
                 <tr>
                  <th colspan="2" scope="row">
                  <input type="submit" name="edit" class="btn btn-success" value="Update Data usersk" />
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
