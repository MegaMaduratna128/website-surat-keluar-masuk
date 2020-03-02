<?php 
include "koneksi.php";// memanggil file koneksi.php untuk menghubungkan ke database
 
 //peritah untuk menghapus data sesuai id yang dipilih
if(isset($_GET['NIP'])){
    if(empty($_GET['NIP'])){
        echo "<b>Data Yang Dihapus Tidak Ada</b>";
    }
    else {
        $hapus = mysqli_query($mysqli,"DELETE FROM user_sk WHERE NIP='$_GET[NIP]'") 
            or die ("Mysql Error : ".mysqli_error($mysqli)); // query sql hapus data
        if($hapus){
            header("Location:berhasilhapus_usersk.php");
        }
    }
}
?>
