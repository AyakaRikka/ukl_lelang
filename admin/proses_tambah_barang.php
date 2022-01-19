<?php
   $nama_barang = $_POST['nama_barang'];
   $deskripsi = $_POST['deskripsi'];
   $harga_awal = $_POST['harga_awal'];
   $date = $_POST['tgl_daftar'];

   $temp = $_FILES['foto']['tmp_name'];
   $type = $_FILES['foto']['type'];
   $size = $_FILES['foto']['size'];
   $name = rand(0,9999).$_FILES['foto']['name'];
   $folder = "foto/";

   // echo $temp;
   // echo $type;
   // echo $size;
   // echo $name;

   include "koneksi.php";
   
   if($size < 2048000 and ($type == "image/jpeg" or $type == "image/png"))
   {
       move_uploaded_file($temp, $folder . $name);

       $input = mysqli_query($koneksi, "INSERT INTO barang (nama_barang, 
       deskripsi,harga_awal, tgl_daftar, foto) VALUES ('".$nama_barang."',
       '".$deskripsi."', '".$harga_awal."', '".$date."', '".$name."')");

       if($input){
           echo "<script>alert('Berhasil');
           location.href='tampil_barang.php';</script>";
       } else {
           echo "<script>alert('Gagal');
           location.href='tampil_barang.php';</script>";
       }
   }
   else {
       echo "<script>alert('File tidak sesuai');
       location.href='tambah_barang.php';</script>";
   }

?>