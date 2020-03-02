<?php 
include "koneksi.php";// memanggil file koneksi.php untuk menghubungkan ke database
 
 //peritah untuk menghapus data sesuai no_regrisKeluar yang dipilih
if(isset($_GET['no_regrisKeluar'])){
    if(empty($_GET['no_regrisKeluar'])){
        echo "<b>Data Yang Dihapus Tidak Ada</b>";
    }
    else {
        $hapus = mysqli_query($mysqli,"DELETE FROM suratkeluar WHERE no_regrisKeluar='$_GET[no_regrisKeluar]'") 
            or die ("Mysql Error : ".mysqli_error($mysqli)); // query sql hapus data
        if($hapus){
            header("Location:berhasilhapus_suratkeluar.php");
        }
    }
}
?>
