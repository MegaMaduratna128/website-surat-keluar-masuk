<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
    $no_regrisKeluar = $_POST['no_regrisKeluar'];
    $no_suratKeluar = $_POST['no_suratKeluar'];
    $tgl_suratKeluar = $_POST['tgl_suratKeluar'];
    $kepada = $_POST['kepada'];
    $perihal = $_POST['perihal'];
    $bidang_mengajukan = $_POST['bidang_mengajukan'];
    // $file_suratKeluar = $_POST['file_suratKeluar'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $file_suratKeluar = $_FILES['file_suratKeluar']['name'];
  $tmp = $_FILES['file_suratKeluar']['tmp_name'];

  $fotoBaru = $file_suratKeluar;
    // Set path folder tempat menyimpan fotonya
    $path = "suratKeluar/".$fotoBaru;
    // Proses upload
    if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Query untuk menampilkan data suratkeluar berdasarkan no_regrisKeluar yang dikirim
      $query = "SELECT * FROM suratkeluar WHERE no_regrisKeluar='".$no_regrisKeluar."'";
      $result = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
      $data = mysqli_fetch_assoc($result); // Ambil data dari hasil eksekusi $sql

      // Proses ubah data ke Database
      $query = "UPDATE suratkeluar SET no_regrisKeluar='".$no_regrisKeluar."', no_suratKeluar='".$no_suratKeluar."', 
      tgl_suratKeluar='".$tgl_suratKeluar."', kepada='".$kepada."', 
      perihal='".$perihal."', bidang_mengajukan='".$bidang_mengajukan."', 
      file_suratKeluar='".$fotoBaru."' WHERE no_regrisKeluar='".$no_regrisKeluar."'";
      $result = mysqli_query($mysqli, $query); // Eksekusi/ Jalankan query dari variabel $query
      if($result){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: halamansuratkeluar.php"); // Redirect ke halaman index.php
      }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='halamansuratkeluar.php'>Kembali</a>";
      }
    }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
  $query = "UPDATE suratkeluar SET no_regrisKeluar='".$no_regrisKeluar."',
    no_suratKeluar='".$no_suratKeluar."', tgl_suratKeluar='".$tgl_suratKeluar."', 
    kepada='".$kepada."', perihal='".$perihal."', 
    bidang_mengajukan='".$bidang_mengajukan."' WHERE no_regrisKeluar='".$no_regrisKeluar."'";
   $result = mysqli_query($mysqli, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($result){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: halamansuratkeluar.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='halamansuratkeluar.php'>Kembali</a>";
  }
}
?>







