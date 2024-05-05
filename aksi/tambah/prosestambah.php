<?php
include("../../koneksi.php");
if(isset($_POST["tambahbarang"])){
 $nama_barang = trim(htmlspecialchars($_POST["namabarang"]));
 $deskripsi_barang = trim(htmlspecialchars($_POST["deskripsibarang"]));
 $stok_barang = trim(htmlspecialchars($_POST["stokbarang"]));

 if(($nama_barang == "" || trim($nama_barang)== "") || ($deskripsi_barang == "" || trim($deskripsi_barang) == "")|| ($stok_barang == "" || trim($stok_barang) == "")){
    echo "<script>
    alert('mohon untuk mengisi data dengan lengkap'); 
    window.location.href = '../../index.php';
    </script>";
 }else{

 $stmt = $pdo->prepare("INSERT INTO `barang_item`(`nama_barang`,`deskripsi_barang`,`stok_barang`)
 VALUES ('$nama_barang','$deskripsi_barang',$stok_barang)");
$send_query = $stmt->execute();
if($send_query){
echo "<script>
alert('yeay berhasil menambahkan data'); 
window.location.href = '../../index.php';
</script>";
}else{
    echo "<script>
    alert('yahh gagal menambahkan data'); 
    window.location.href = '../../index.php';
    </script>";   
}

 }
}
?>

