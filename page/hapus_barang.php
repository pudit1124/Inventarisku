<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hapus</title>
</head>
<body>
    <?php

    include "../config/koneksi.php";

    $id_inventaris = $_GET['id_inventaris'];
    $sql = "DELETE FROM inventaris WHERE id_inventaris = '$id_inventaris'";
    $query = mysqli_query($koneksi,$sql);
    if($query){
        ?>
            <script type="text/javascript">
                window.location.href="../index.php?p=list_barang&halaman=1";
            </script>
        <?php
    }else{
        ?>
            <script type="text/javascript">
                alert('terjadi kesalahan');
                window.location.href="../index.php?p=list_barang&halaman=1";
            </script>
        <?php
    }
    ?>
</body>
</html>