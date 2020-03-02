<?php 
include "koneksi.php";// memanggil file koneksi.php untuk menghubungkan ke database
 
 //peritah untuk menghapus data sesuai no_regrisMasuk yang dipilih
if(isset($_GET['no_regrisMasuk'])){
    if(empty($_GET['no_regrisMasuk'])){
        echo "<b>Data Yang Dihapus Tidak Ada</b>";
    }
    else {
        $hapus = mysqli_query($mysqli,"DELETE FROM suratmasuk WHERE no_regrisMasuk='$_GET[no_regrisMasuk]'") 
            or die ("Mysql Error : ".mysqli_error($mysqli)); // query sql hapus data
        if($hapus){
            header("Location:berhasilhapus_suratmasuk.php");
        }
    }
}
?>

