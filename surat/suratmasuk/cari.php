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
    
	<div class="card-body">
<b>
<h3><center>HASIL PENCARIAN</center><h3></b>
 <!--membuat tabel -->
<table class="table table-bordered table-hover">
	<thead>
	<tr>
  <th>&nbsp;&nbsp; NOMOR REGISTRASI &nbsp;&nbsp;</th>
   <th>&nbsp;&nbsp; NOMOR SURAT &nbsp;&nbsp;</th>
   <th>&nbsp;&nbsp; TANGGAL MASUK SURAT &nbsp;&nbsp;</th>
   <th>&nbsp;&nbsp; ALAMAT PENGIRIM &nbsp;&nbsp;</th>
   <th>&nbsp;&nbsp; TANGGAL SURAT &nbsp;&nbsp;</th>
   <th>&nbsp;&nbsp; PERIHAL &nbsp;&nbsp;</th>
   <th>&nbsp;&nbsp; ISI DISPOSISI &nbsp;&nbsp;</th>
   <th>&nbsp;&nbsp; PENERIMA SURAT &nbsp;&nbsp;</th>
   <th>&nbsp;&nbsp; FILE SURAT &nbsp;&nbsp;</th>
   <th>&nbsp;&nbsp; FILE DISPOSISI &nbsp;&nbsp;</th>
   <th>&nbsp;&nbsp; DITERUSKAN KEPADA &nbsp;&nbsp;</th>
   <th>&nbsp;&nbsp; PILIHAN &nbsp;&nbsp;</th>
                

	</tr>
	</thead>
	 <!--untuk mencari data -->
        <?php
	        $cari= $_POST['input_cari'];
	        $q = "SELECT * FROM suratmasuk WHERE perihal OR tgl_masuk OR isi_disposisi like '%$cari%' ";
	        $result = mysqli_query($mysqli, $q);
		        
        
			while ($data = mysqli_fetch_array($result)) {
        ?>
			<tr>
            <td><?php echo $data['no_regrisMasuk'];?></td>
            <td><?php echo $data['no_suratMasuk'];?></td> 
            <td><?php echo $data['tgl_masuk'];?></td>
            <td><?php echo $data['alamat_pengirim'];?></td>
            <td><?php echo $data['tgl_surat'];?></td>
            <td><?php echo $data['perihal'];?></td>
            <td><?php echo $data['isi_disposisi'];?></td>
            <td><?php echo $data['penerima_surat'];?></td>
            <th><img src="surat/<?php echo $data['file_surat'];?>" alt="" class="image" width="100" height="80"> </th>
            <th><img src="disposisi/<?php echo $data['file_disposisi'];?>" alt="" class="image" width="100" height="80"> </th>
            <td><?php echo $data['diteruskan_kepada'];?></td>
			<td><center>
            <div class="btn-group" role="group" aria-label="Basic example">
				<a class="btn btn-info" href="editsuratmasuk.php?no_suratMasuk=<?php echo $data['no_suratMasuk'];?>">Edit</a>&nbsp;&nbsp;
				<a class="btn btn-danger" href="hapussuratmasuk.php?no_suratMasuk=<?php echo $data['no_suratMasuk'];?>">Delete</a></td>
				
				</center>
			</div>
        </tr>
        <?php } ?>
  
    </table>
    	<br>
		<a class="btn btn-info" href="halamansuratmasuk.php">Back</a> 
	</div>
    </body>
    </center>
</html>