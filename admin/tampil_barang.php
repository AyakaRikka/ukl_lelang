<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>DATA BARANG</h1>
                <form method="POST" action="tampil_barang.php" class="d-flex">
                    <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID BARANG</th>
                    <th scope="col">NAMA BARANG</th>
                    <th scope="col">DESKRIPSI</th>
                    <th scope="col">HARGA</th>
                    <th scope="col">DATE</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "koneksi.php";
                    if (isset($_POST['cari'])) {
                        $cari = $_POST['cari'];
                        $query_barang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$cari' or nama_barang like '%$cari%' or deskripsi like '%$cari%'");
                    }
                    else{
                        $query_barang = mysqli_query($koneksi, "SELECT * FROM barang");
                    }
                    while($data_barang = mysqli_fetch_array($query_barang)){
                ?>
                <a href="tambah_barang.php" type="button" class="btn btn-primary">Tambah Barang</a>
                    <tr>
                        <td><?=$data_barang['id_barang']?></td>
                        <td><?=$data_barang['nama_barang']?></td>
                        <td><?=$data_barang['deskripsi']?></td>
                        <td><?=$data_barang['harga_awal']?></td>
                        <td><?=$data_barang['tgl_daftar']?></td>
                        <td><img src="foto/<?=$data_barang['foto']?>" width=100></td>
                        <td>
                            <a href="ubah_barang.php?id_barang=<?=$data_barang['id_barang']?>" class="btn btn-success">Edit</a>
                            <a href="hapus_barang.php?id_barang=<?=$data_barang['id_barang']?>" class="btn btn-danger"
                            onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>