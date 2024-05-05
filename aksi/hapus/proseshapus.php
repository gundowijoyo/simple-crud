<?php
include("../../koneksi.php");
if(isset($_GET['id'])){
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM `barang_item` WHERE id=:id");
$stmt->bindParam(':id',$id);
$send_query = $stmt->execute();

if($send_query){
    echo "<script>
    alert('yeay berhasil menghapus data '); 
    window.location.href = '../../index.php';
    </script>";
    }else{
        echo "<script>
        alert('yahh gagal menghapus data'); 
        window.location.href = '../../index.php';
        </script>";   
    }
}
?>