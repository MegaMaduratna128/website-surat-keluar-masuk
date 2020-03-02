<?php
    @session_start(); //memulai session
    include "koneksi.php";
?>

<html>
<head>
	<title>Pencarian</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" href="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" href="js/jquery-3.2.1.min.js"></script>
    <style>
        #a{
            margin-left:200px;
        }
        #b{
            margin-left:490px;
        }
    </style>
</head>
<body background="images/b.jpg">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse">
                
                        <div id="b">
                        </div>
                        <div id="a">
						<span class="navbar-text">
                        <a href="../../index.php">
                        <span class="btn btn-info">Log Out</span></a></span>
                        </div>
                    </ul>
                </div>
                </nav>

<br>
<div id="index">
	<div class="container">
    <div class="card col-sm-11">
	<div class="card-body">
<b>
<h3><center>HASIL PENCARIAN</center><h3></b>
 <!--membuat tabel -->
<table class="table table-bordered table-hover">
	<thead>
	<tr>
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
	 <!--untuk mencari data -->
        <?php
	        $cari= $_POST['input_cari'];
	        $q = "SELECT * FROM suratkeluar WHERE perihal OR tgl_suratKeluar OR kepada like '%$cari%' ";
	        $result = mysqli_query($mysqli, $q);
		    
			while ($data = mysqli_fetch_array($result)) {
        ?>
			<tr>
            <td><?php echo $data['no_regrisKeluar'];?></td>
            <td><?php echo $data['no_suratKeluar'];?></td> 
            <td><?php echo $data['tgl_suratKeluar'];?></td>
            <td><?php echo $data['kepada'];?></td>
            <td><?php echo $data['perihal'];?></td>
            <td><?php echo $data['bidang_mengajukan'];?></td>
            <th><img src="suratKeluar/<?php echo $data['file_suratKeluar'];?>" alt="" class="image" width="100" height="80"> </th>
			<td><center>
            <div class="btn-group" role="group" aria-label="Basic example">
				<a class="btn btn-info" href="editsuratkeluar.php?no_suratKeluar=<?php echo $data['no_suratKeluar'];?>">Edit</a>&nbsp;&nbsp;
				<a class="btn btn-danger" href="hapussuratkeluar.php?no_suratKeluar=<?php echo $data['no_suratKeluar'];?>">Delete</a></td>
				
				</center>
			</div>
        </tr>
        <?php } ?>
  
    </table>
    	<br>
		<a class="btn btn-info" href="halamansuratkeluar.php">Back</a> 
	</div>
    </body>
    </center>
</html>