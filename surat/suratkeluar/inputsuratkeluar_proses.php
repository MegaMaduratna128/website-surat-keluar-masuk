<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// mengecek apakah tombol input dari form telah diklik
if (isset($_POST['simpan'])) {

	// membuat variabel untuk menampung data dari form
  
  $no_regrisKeluar = $_POST['no_regrisKeluar'];
  $no_suratKeluar = $_POST['no_suratKeluar'];
  $tgl_suratKeluar = $_POST['tgl_suratKeluar'];
  $kepada = $_POST['kepada'];
  $perihal = $_POST['perihal'];
  $bidang_mengajukan = $_POST['bidang_mengajukan'];
  $file_suratKeluar = $_POST['file_suratKeluar'];

  $data = mysqli_query($mysqli,"INSERT INTO suratkeluar SET no_regrisKeluar = '$no_regrisKeluar', no_suratKeluar='$no_suratKeluar', 
  tgl_suratKeluar='$tgl_suratKeluar', kepada='$kepada', perihal='$perihal', bidang_mengajukan='$bidang_mengajukan',
  file_suratKeluar='$file_suratKeluar'") 
  or die ("<script type='text/javascript'>
  alert('No Registrasi Sudah Ada!');
  history.back(self);
  </script>");

  if(!$data){
    echo 'Data berhasil di simpan! '; 
    echo '<a href="halamansuratkeluar.php?no_regrisKeluar='.$no_suratKeluar.'"> Kembali</a>';
    
  }else{
    echo 'Gagal menyimpan data! ';
    echo '<a href="inputsuratkeluar.php?no_regrisKeluar='.$no_suratKeluar.'"> Kembali</a>';
    echo "
        <script type='text/javascript'>
        alert('No Registrasi Sudah Ada!');
        history.back(self);
        </script>";
    
  }
}

// melakukan redirect (mengalihkan) ke halaman halamansuratkeluar.php
header("location:halamansuratkeluar.php");
?>