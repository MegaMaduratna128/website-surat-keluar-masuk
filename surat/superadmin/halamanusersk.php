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
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
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

        </div>
        <div id="page-wrapper">
            <div class="row" align="center">
            <div class="col-md-16">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        INFORMASI USER SURAT KELUAR
                    </div>
          <div class="panel-body">
                <div class="row">
                    <div class="col-md-9 col-xs-6">
                        <a href="inputusersk.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah User Surat Keluar </a>
                    </div>
                </div>
              <br><br>
              <table class="table table-bordered table-hover">
    <thead>
    <tr align="center" style="font-weight:bold">
      <th>&nbsp;&nbsp; NO &nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp; NIP &nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp; NAMA PEGAWAI &nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NO HP &nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp;&nbsp;ALAMAT&nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp; USERNAME &nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp; PASSWORD &nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp; Pilihan &nbsp;&nbsp;</th>
    </tr>
    </thead>
    <?php
    // jalankan query untuk menampilkan semua data 
    $query = "SELECT * FROM user_sk";
    $result = mysqli_query($mysqli, $query);
    //mengecek apakah ada error ketika menjalankan query
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }

    $no = 1; //variabel untuk membuat nomor urut
    // hasil query akan disimpan dalam variabel $data dalam bentuk array
    // kemudian dicetak dengan perulangan while
    while($data = mysqli_fetch_assoc($result))
    {
      // mencetak / menampilkan data
      echo "<tr>";
      echo "<td> &nbsp;&nbsp; $no</td>"; //menampilkan no urut
      echo "<td> &nbsp;&nbsp; $data[NIP]</td>"; //menampilkan data NIP
      echo "<td> &nbsp;&nbsp; $data[nama_pegawai]</td>"; //menampilkan data nama_pegawai
      echo "<td> &nbsp;&nbsp; $data[no_hp]</td>"; //menampilkan data no_hp
      echo "<td> &nbsp;&nbsp; $data[alamat]</td>"; //menampilkan data alamat
      echo "<td> &nbsp;&nbsp; $data[username_usersk]</td>"; //menampilkan data username_usersk
      echo "<td> &nbsp;&nbsp; $data[password_usersk]</td>"; //menampilkan data password_usersk
     
      // membuat link untuk mengedit dan menghapus data
      echo '<td> &nbsp;
        
        <a href="hapususersk.php?NIP='.$data['NIP'].'"
          onclick="return confirm(\'Anda yakin akan menghapus data?\')" ><span class="glyphicon glyphicon-trash">
                    </span></a> &nbsp;
      </td>';
      echo "</tr>";
      $no++; // menambah nilai nomor urut
    }
    ?>
  </table>
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
