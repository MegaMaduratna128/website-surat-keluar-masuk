<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
    $no_regrisMasuk = $_POST['no_regrisMasuk'];
    $no_suratMasuk = $_POST['no_suratMasuk'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $alamat_pengirim = $_POST['alamat_pengirim'];
    $tgl_surat = $_POST['tgl_surat'];
    $perihal = $_POST['perihal'];
    $isi_disposisi = $_POST['isi_disposisi'];
    $penerima_surat = $_POST['penerima_surat'];
    // $file_surat = $_POST['file_surat'];
    // $file_disposisi = $_POST['file_disposisi'];
    $diteruskan_kepada = $_POST['diteruskan_kepada'];

    if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
      // Ambil data foto yang dipilih dari form
      $file_surat = $_FILES['file_surat']['name'];
      $tmp = $_FILES['file_surat']['tmp_name'];
    
      $fotoBaru = $file_surat;
        // Set path folder tempat menyimpan fotonya
        $path = "surat/".$fotoBaru;
        // Proses upload
        if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
          // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
          $query = "SELECT * FROM suratmasuk WHERE no_suratMasuk='".$no_suratMasuk."'";
          $result = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
          $data = mysqli_fetch_assoc($result); // Ambil data dari hasil eksekusi $sql
          
          // Proses ubah data ke Database
          $query = "UPDATE suratmasuk SET no_suratMasuk='$no_suratMasuk', tgl_masuk='$tgl_masuk', alamat_pengirim='$alamat_pengirim', 
            tgl_surat='$tgl_surat', perihal='$perihal', isi_disposisi='$isi_disposisi', penerima_surat='$penerima_surat'
            , file_surat='$file_surat', diteruskan_kepada='$diteruskan_kepada' WHERE no_regrisMasuk='$no_regrisMasuk'";
          $result = mysqli_query($mysqli, $query); // Eksekusi/ Jalankan query dari variabel $query
          if($result){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            header("location: halamansuratmasuk.php"); // Redirect ke halaman index.php
          }else{
            // Jika Gagal, Lakukan :
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='halamansuratmasuk.php'>Kembali</a>";
          }
        }
    }elseif(isset($_POST['ubah_foto1'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
      // Ambil data foto yang dipilih dari form
      $file_disposisi = $_FILES['file_disposisi']['name'];
      $tmp = $_FILES['file_disposisi']['tmp_name'];
    
      $fotoBaru = $file_disposisi;
        // Set path folder tempat menyimpan fotonya
        $path = "disposisi/".$fotoBaru;
        // Proses upload
        if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
          // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
          $query = "SELECT * FROM suratmasuk WHERE no_regrisMasuk='".$no_regrisMasuk."'";
          $result = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
          $data = mysqli_fetch_assoc($result); // Ambil data dari hasil eksekusi $sql
          
          // Proses ubah data ke Database
          $query = "UPDATE suratmasuk SET no_suratMasuk='$no_suratMasuk', tgl_masuk='$tgl_masuk', 
            alamat_pengirim='$alamat_pengirim', 
            tgl_surat='$tgl_surat', perihal='$perihal', isi_disposisi='$isi_disposisi', 
            penerima_surat='$penerima_surat', file_disposisi='$file_disposisi', 
            diteruskan_kepada='$diteruskan_kepada' WHERE no_regrisMasuk='$no_regrisMasuk'";
          
          $result = mysqli_query($mysqli, $query); // Eksekusi/ Jalankan query dari variabel $query
          if($result){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            header("location: halamansuratmasuk.php"); // Redirect ke halaman index.php
          }else{
            // Jika Gagal, Lakukan :
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='halamansuratmasuk.php'>Kembali</a>";
          }
        }
    }else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
      // Proses ubah data ke Database
      $query = "UPDATE suratmasuk SET no_suratMasuk='$no_suratMasuk', tgl_masuk='$tgl_masuk', alamat_pengirim='$alamat_pengirim', 
            tgl_surat='$tgl_surat', perihal='$perihal', isi_disposisi='$isi_disposisi', penerima_surat='$penerima_surat', 
            diteruskan_kepada='$diteruskan_kepada' WHERE no_regrisMasuk='$no_regrisMasuk'";
       $result = mysqli_query($mysqli, $query); // Eksekusi/ Jalankan query dari variabel $query
      if($result){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: halamansuratmasuk.php"); // Redirect ke halaman index.php
      }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='halamansuratmasuk.php'>Kembali</a>";
      }
    }
?>