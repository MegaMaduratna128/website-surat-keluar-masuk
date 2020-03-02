<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// mengecek apakah tombol input dari form telah diklik
if (isset($_POST['simpan'])) {

	// membuat variabel untuk menampung data dari form
  $no_regrisMasuk = $_POST['no_regrisMasuk'];
  $no_suratMasuk = $_POST['no_suratMasuk'];
  $tgl_masuk = $_POST['tgl_masuk'];
  $alamat_pengirim = $_POST['alamat_pengirim'];
  $tgl_surat = $_POST['tgl_surat'];
  $perihal = $_POST['perihal'];
  $file_surat = $_POST['file_surat'];

  $data = mysqli_query($mysqli,"INSERT INTO suratmasuk SET no_regrisMasuk='$no_regrisMasuk', 
  no_suratMasuk='$no_suratMasuk', tgl_masuk='$tgl_masuk', alamat_pengirim='$alamat_pengirim', 
  tgl_surat='$tgl_surat', perihal='$perihal', file_surat='$file_surat'") 
  or die ("<script type='text/javascript'>
  alert('No Registrasi Sudah Ada!');
  history.back(self);
  </script>");

  if(!$result){
    echo 'Data berhasil di simpan! '; 
    echo '<a href="halamansuratmasuk.php?no_regrisMasuk='.$no_regrisMasuk.'"> Kembali</a>';
    
  }else{
    echo 'Gagal menyimpan data! ';
    echo '<a href="inputsuratmasuk.php?no_regrisMasuk='.$no_regrisMasuk.'"> Kembali</a>';
    echo "
        <script type='text/javascript'>
        alert('No Registrasi Sudah Ada!');
        history.back(self);
        </script>";
  }
}

// melakukan redirect (mengalihkan) ke halaman halamansuratmasuk.php
header("location:halamansuratmasuk.php");
?>

