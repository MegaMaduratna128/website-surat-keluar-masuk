<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include 'koneksi.php';

  // mengecek apakah di url ada nilai GET no_regrisMasuk
  if (isset($_GET['no_regrisMasuk'])) {
    // ambil nilai no_regrisMasuk dari url dan disimpan dalam variabel $no_regrisMasuk
    $no_regrisMasuk = ($_GET["no_regrisMasuk"]);

    // menampilkan data suratmasuk dari database yang mempunyai no_regrisMasuk=$no_regrisMasuk
    $query = "SELECT * FROM suratmasuk WHERE no_regrisMasuk='$no_regrisMasuk'";
    $result = mysqli_query($mysqli, $query);
    // mengecek apakah query gagal
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database dan membuat variabel" utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $data = mysqli_fetch_assoc($result);
    $no_regrisMasuk = $data['no_regrisMasuk'];
    $no_suratMasuk = $data['no_suratMasuk'];
    $tgl_masuk = $data['tgl_masuk'];
    $alamat_pengirim = $data['alamat_pengirim'];
    $tgl_surat = $data['tgl_surat'];
    $perihal = $data['perihal'];
    $isi_disposisi = $data['isi_disposisi'];
    $penerima_surat = $data['penerima_surat'];
    $file_surat = $data['file_surat'];
    $file_disposisi = $data['file_disposisi'];
    $diteruskan_kepada = $data['diteruskan_kepada'];

  } else {
    echo 'Gagal mengedit data data! ';
    echo '<a href="halamansuratmasuk.php?id='.$no_suratMasuk.'"> Kembali</a>';
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
       <div id="page-wrapper" >
            <div class="container">
            <div class="card col-sm-8" style="background-color: #CCCCFF;"> 
 
            <form action="prosesSuratMasuk_proses.php" class="inner-login" id="form_usersm" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="no_regrisMasuk" value="<?php echo $no_regrisMasuk; ?>" >
                  <tr>
                  <th colspan="2" scope="row"><h2><b><center>Proses Lanjut Surat Masuk</center></b></h2></th> 
                  </tr>

                    <br><br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">NO REGRISTRASI</th> <br>
                <td><input type="text" name="no_regrisMasuk" id="no_regrisMasuk" class="form-control" value="<?php echo $no_regrisMasuk ?>" disabled></td>
                </tr>
                </div>
                 <div class="form-group">
                 <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">NOMOR SURAT </th> <br>
                <td><input type="text" name="no_suratMasuk" id="no_suratMasuk" class="form-control" disabled value="<?php echo $no_suratMasuk ?>"></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">TANGGAL MASUK SURAT</th> <br>
                <td><input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" disabled value="<?php echo $tgl_masuk ?>"></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">Alamat Pengirim </th> <br>
                <td><input type="text" name="alamat_pengirim" id="alamat_pengirim" class="form-control" disabled value="<?php echo $alamat_pengirim ?>"></td>
                </tr>
                </div>
                <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">TANGGAL SURAT </th> <br>
                <td><input type="date" name="tgl_surat" id="tgl_surat" class="form-control" disabled value="<?php echo $tgl_surat ?>"></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">PERIHAL </th> <br>
                <td><input type="text" name="perihal" id="perihal" class="form-control" disabled value="<?php echo $perihal ?>"></td>
                </tr>
                </div>
                 <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">ISI DISPOSISI</label>
                <input type="text" class="form-control" name="isi_disposisi" id="isi_disposisi" rows="3" value="<?php echo $isi_disposisi ?>"></td>
                </tr>
                </div>
                    <br>
                <div class="form-group">
                <tr>
                <th  class="cal-sm-2" scope="row">PENERIMA SURAT</label>
                <input type="text" class="form-control" name="penerima_surat" id="penerima_surat" rows="3"  value="<?php echo $penerima_surat ?>"></td>
                </tr>
                </div>
                <br>
                <div class="form-group ">
                <label for="diteruskan_kepada">Diteruskan Kepada</label>
                <select id="diteruskan_kepada" name="diteruskan_kepada">
                    <option selected>Choose...</option>
                    <option value="Sekertaris" <?php if($data['diteruskan_kepada'] == 'Sekertaris'){ echo 'selected';} ?>>
                    Sekertaris </option>
                    <option value="Bidang Penanaman Modal" <?php if($data['diteruskan_kepada'] == 'Sekertaris'){ echo 'selected';} ?>>
                    Bidang Penanaman Modal</option>
                    <option value="Bidang Pelayanan Perizinan"<?php if($data['diteruskan_kepada'] == 'Sekertaris'){ echo 'selected';} ?>>
                    Bidang Pelayanan Perizinan</option>
                    <option value="Bidang Pengembangan, Informasi dan Pengaduan"<?php if($data['diteruskan_kepada'] == 'Sekertaris'){ echo 'selected';} ?>>
                    Bidang Pengembangan, Informasi dan Pengaduan</option>
                    <option value="Bidang Hubungan Industrial dan Tenaga Kerja"<?php if($data['diteruskan_kepada'] == 'Sekertaris'){ echo 'selected';} ?>>
                    Bidang Hubungan Industrial dan Tenaga Kerja</option>
                    <option value="Bidang Penempatan dan Pelatihan Tenaga Kerja"<?php if($data['diteruskan_kepada'] == 'Sekertaris'){ echo 'selected';} ?>>
                    Bidang Penempatan dan Pelatihan Tenaga Kerja</option>
                </select>
                </div>
                 <br>
                <div class="custom-file">
                <th  class="cal-sm-2" scope="row">FILE SURAT </th> <br>
                <td><?php echo "<img src='surat/$data[file_surat]' width='150'/>"?></td>
                   <td> <input type="file" class="custom-file-input" name="file_surat" id="file_disposisi" disabled>
                    <label class="custom-file-label" for="validatedCustomFile"></label></td>
                    </tr>
                </div>
                 <br>
               <div class="custom-file">
                <th  class="cal-sm-2" scope="row">FILE DISPOSISI </th> <br>
                <td><?php echo "<img src='disposisi/$data[file_disposisi]' width='150'/>"?></td><br>
                  <td> 
                    <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
                    <input type="file" name="file_disposisi" id="file_disposisi">
                   </td>
                    </tr>
                </div>
                 <br>   
            
                 <tr>
                  <th colspan="2" scope="row">
                  <input type="submit" name="proses" class="btn btn-success" value="Simpan Data" />
                    <a class="btn btn-warning" href="halamansuratmasuk.php">Kembali</a></a><p> 
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
