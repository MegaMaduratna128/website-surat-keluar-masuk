<?php
// KONEKSI KE DATABASE
include 'koneksi.php';
include 'pdo.php';
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
            <div class="panel-heading">
            INFORMASI SURAT KELUAR
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-9 col-xs-6">
                <a href="inputsuratkeluar.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Surat Keluar </a>
              </div>
              </div>
              <br>
               <form class="form-inline" action="cari.php" method="post">
   					    <input class="form-control mr-sm-2" type="text" name="input_cari" placeholder="Cari Berdasar Perihal" class="css-input" style="width:250px;" />
   					    <input class="btn btn-success" type="submit" name="cari" value="  Search  " class="btn" style="padding:3px;" margin="6px;" width="50px;"  />
  				        </form>
                <br>
<table class="table table-bordered table-hover">
    <thead>
    <tr align="center" style="font-weight:bold">
      <th>&nbsp;&nbsp; NOMOR REGISTRASI &nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp; NOMOR SURAT &nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp; TANGGAL KELUAR SURAT &nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp; KEPADA &nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp; PERIHAL &nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp; BIDANG MENGAJUKAN &nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp; FILE SURAT &nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp; PILIHAN &nbsp;&nbsp;</th>
    </tr>
    </thead>

    <?php
     //Pengaturan Pagination
 
        $page = (isset($_GET['page']))? $_GET['page'] : 1;
          
          $limit = 20; // Jumlah data per halamannya
          
          // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
          $limit_start = ($page - 1) * $limit;
          
          // Buat query untuk menampilkan data suratkeluar sesuai limit yang ditentukan
          $sql = $pdo->prepare("SELECT * FROM suratkeluar LIMIT ".$limit_start.",".$limit);
          $sql->execute(); // Eksekusi querynya

    // hasil query akan disimpan dalam variabel $data dalam bentuk array
    // kemudian dicetak dengan perulangan while
    while($data = $sql->fetch()){
    ?>
      <tr>
      <td class="align-middle text-center"><?php echo $data['no_regrisKeluar']+$limit_start; ?></td>
      <td class=""><?php echo $data['no_suratKeluar']; ?></td>
      <td><?php echo date('d-m-Y', strtotime($data["tgl_suratKeluar"]));?></td>
      <td class=""><?php echo $data['kepada']; ?></td>
      <td class=""><?php echo $data['perihal']; ?></td>
      <td class=""><?php echo $data['bidang_mengajukan']; ?></td>
      <td>&nbsp;&nbsp; <?php echo "<embed src='suratKeluar/$data[file_suratKeluar]' width='150'/>"?>&nbsp;</td>
      <?php
      

      // membuat link untuk mengedit dan menghapus data
      echo '<td> &nbsp;
        <a href="editsuratkeluar.php?no_regrisKeluar='.$data['no_regrisKeluar'].'" class="btn btn-primary">EDIT</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; /  <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="hapussuratkeluar.php?no_regrisKeluar='.$data['no_regrisKeluar'].'"
          onclick="return confirm(\'Anda yakin akan menghapus data?\')" ><span class="glyphicon glyphicon-trash">
                    </span></a> &nbsp;
      </td>';
      echo "</tr>";
    }
    ?>
  </table>
  </div>

<!--
      -- Buat Paginationnya
      -- Dengan bootstrap, kita jadi dimudahkan untuk membuat tombol-tombol pagination dengan design yang bagus tentunya
      -->
      <ul class="pagination">
        <!-- LINK FIRST AND PREV -->
        <?php
        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
        ?>
          <li class="disabled"><a href="#">First</a></li>
          <li class="disabled"><a href="#">&laquo;</a></li>
        <?php
        }else{ // Jika page bukan page ke 1
          $link_prev = ($page > 1)? $page - 1 : 1;
        ?>
          <li><a href="halamansuratkeluar.php?page=1">First</a></li>
          <li><a href="halamansuratkeluar.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>
        
        <!-- LINK NUMBER -->
        <?php
        // Buat query untuk menghitung semua jumlah data
        $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM suratkeluar");
        $sql2->execute(); // Eksekusi querynya
        $get_jumlah = $sql2->fetch();
        
        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li<?php echo $link_active; ?>><a href="halamansuratkeluar.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        
        <!-- LINK NEXT AND LAST -->
        <?php
        // Jika page sama dengan jumlah page, maka disable link NEXT nya
        // Artinya page tersebut adalah page terakhir 
        if($page == $jumlah_page){ // Jika page terakhir
        ?>
          <li class="disabled"><a href="#">&raquo;</a></li>
          <li class="disabled"><a href="#">Last</a></li>
        <?php
        }else{ // Jika Bukan page terakhir
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        ?>
          <li><a href="halamansuratkeluar.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
          <li><a href="halamansuratkeluar.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
        <?php
        }
    ?>
  


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
