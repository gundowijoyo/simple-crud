<?php
include("../../koneksi.php");
 if(isset($_POST["id"]) &&
 isset($_POST["namabarang"])&&isset($_POST["deskripsibarang"])&&isset($_POST["stokbarang"])){

  $id =  trim(htmlspecialchars($_POST["id"]));
    $nama_barang = trim(htmlspecialchars($_POST["namabarang"]));
    $deskripsi_barang = trim(htmlspecialchars($_POST["deskripsibarang"]));
    $stok_barang = trim(htmlspecialchars($_POST["stokbarang"]));

  if(($nama_barang == "" || trim($nama_barang)== "") ||($deskripsi_barang == "" || trim($deskripsi_barang) == "")|| ($stok_barang == "" || trim($stok_barang) == "")){
      echo "<script>
    alert('mohon untuk mengisi data dengan lengkap'); 
     window.location.href = '../../index.php';
        </script>";
     }else{
    $stmt = $pdo->prepare("UPDATE `barang_item` SET `nama_barang`='$nama_barang',
    `deskripsi_barang`='$deskripsi_barang',`stok_barang`=$stok_barang WHERE id
    =:id");
   $stmt->bindParam(':id',$id);
    $stmt->execute();
    if($stmt->execute()){
    echo "<script>
    alert('yeay berhasil mengedit data'); 
    window.location.href = '../../index.php';
    </script>";
    }else{
        echo "<script>
        alert('yahh gagal mengedit data'); 
        window.location.href = '../index.php';
        </script>";   
    }
    
 }

    } 

?>