
<?php
include("../../koneksi.php");

if(isset($_GET['id'])){
$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM `barang_item` WHERE id= :id");
$stmt->bindParam(':id',$id);
$stmt->execute();
if($stmt->rowCount() > 0){
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">   
    <title>Edit Data</title>
    <link rel="stylesheet" href="../../style/style.css">
<?php include("../../style/fontpoppins.php");?>
</head>
<body>
  <br/>
  <br/>
  <br/>
<form action="prosesedit.php" method="post" id="form" enctype="multipart/form-data">
<h4>Edit data</h4>
<p id="close">x</p>
<br/>
<div>
<input type="hidden" value="<?php echo $row['id']?>" name="id">
<label class="f14 mb-2">Masukkan nama barang</label>
<input type="text" name="namabarang" class="styleinput" value="<?php echo $row['nama_barang']?>"/>
</div>

<div class="d-grid jcc mt-5px">
<label class="f14 mb-2">Masukkan deskripsi barang</label>
<input type="text" name="deskripsibarang" class="styleinput" value="<?php echo $row['deskripsi_barang']?>"/>
</div>

<div class="d-grid jcc mt-5px">
<label class="f14 mb-2">Masukkan stok barang barang</label>
<input type="number" name="stokbarang" class="styleinput" value="<?php echo $row['stok_barang']?>"/>
</div>

<div style="margin-top:5px;">
<input type="submit" name="tambahbarang" id="tambah"/>
</div>

</form>
 
<div id="manipulasibg">

</div>
</body>
</html>
<?php
}
}

?>

<script>
    const idclose = document.getElementById("close");
  idclose.addEventListener("click",()=>{
        window.location.href = '../../home.php';
});

</script>