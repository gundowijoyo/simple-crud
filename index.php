<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">  
  <title>Welcome User</title>
<link rel="stylesheet" href="style/style.css">
<?php include("style/fontpoppins.php");?>
<style>
form{
    display: none;
}
#manipulasibg{
    display: none;  
}
</style>
</head>
<body>
<div>
	
<div class="sapaanadd">
<h4>Hai users</h4>
<input type="submit" id="showadd" value="Tambah Barang"/>
</div>
</div>

<!--manipulasi background hitam-->
<div id="manipulasibg">

</div>
<!--form penginputan data nya-->
<form action="aksi/tambah/prosestambah.php" method="post" id="form" enctype="multipart/form-data">
<p id="close">x</p>
<br/>

<div style="display:grid; justify-content:center;">
<label class="f14 mb-2">Masukkan nama barang</label>
<input type="text" name="namabarang" class="styleinput"/>
</div>

<div class="d-grid jcc mt-5px">
<label class="f14 mb-2">Masukkan deskripsi barang</label>
<input type="text" name="deskripsibarang" class="styleinput"/>
</div>

<div class="d-grid jcc mt-5px">
<label class="f14 mb-2">Masukkan stok barang barang</label>
<input type="number" name="stokbarang" class="styleinput"/>
</div>

<div style="margin-top:5px;">
<input type="submit" name="tambahbarang" id="tambah"/>
</div>

</form>

<!--Tampilkan data-->

<div id="conborder">
  <div id="conImg">
<img src="https://i.ibb.co/hs9ZX8k/search-not-found-8114526-6546845.png"
alt="not found data" border="0">
  </div>
<table border="1" id="border">
<tr>
<th>No</th>
<th>Nama Barang</th>
<th>Deskripsi barang</th>
<th>Stok Barang</th>
<th>Aksi</th>
</tr>

<?php 
include("koneksi.php");
$stmt = $pdo->prepare("SELECT * FROM `barang_item`") ;
$stmt->execute();
/* mengecek baris data */
$baris_nomor = $stmt->rowCount();
if($baris_nomor === 0){
  $trucante_stmt= $pdo->prepare("TRUNCATE TABLE `barang_item`");
$trucante_stmt->execute();
$alter_stmt = $pdo->prepare("ALTER TABLE `barang_item` AUTO_INCREMENT = 1");
$alter_stmt->execute();
?>
 <script>
 conImg.style.display = "block";
 border.style.display = "none";
 </script>
<?php 
}else{
    ?>
<script>
border.style.display = "block";
 conImg.style.display = "none";
 </script>
 <?php 
}

$index = 1;

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  ?>
<tr>
<td><?php echo $index;?></td>
<td><?php echo $row['nama_barang']; ?></td>
<td><?php echo $row['deskripsi_barang']; ?></td>
<td><?php echo $row['stok_barang']; ?></td>
<td class="flex-items-center">
<a href="aksi/edit/edit.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
  <a href="#" class="hapus" onclick="confirmDelete(<?php echo $row['id']; ?>)">Hapus</a>

</td>

</tr>
<?php
$index ++;
}

?>

</table>

</div>
<script src="style/script.js">
</script>
<script>
    function confirmDelete(id) {
        var confirmation = confirm("Apakah Anda yakin ingin menghapus data ini?");
        if (confirmation) {
            window.location.href = "aksi/hapus/proseshapus.php?id=" + id;
        } else {
            return false;
        }
    }
</script>

</body>
</html>