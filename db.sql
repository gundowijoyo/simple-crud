CREATE DATABASE barang;
USE barang;
CREATE TABLE tambah_barang(
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_barang VARCHAR(255) NOT NULL,
  deskripsi_barang VARCHAR(255) NOT NULL,
  stok_barang INT NOT NULL
);
