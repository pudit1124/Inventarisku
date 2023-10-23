<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pengembalian</title>
</head>
<body>
    <div class="col-lg-12">
        <!-- a -->
        <h2><center>Pengembalian Inventaris</center></h2> <hr>
        <div class="panel panel-primary">
            <div class="panel-heading">Daftar Barang Yang Dipinjam</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Peminjaman</th>
                            <th>Tanggal Pinjam</th>
                            <th>Nama Peminjam</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $hari = date('d-m-Y');
                            $d_peminjaman = "SELECT *, detail_pinjam.jumlah as jml FROM detail_pinjam 
                            LEFT JOIN peminjaman ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman 
                            LEFT JOIN inventaris ON inventaris.id_inventaris = detail_pinjam.id_inventaris
                            LEFT JOIN pegawai ON pegawai.id_pegawai = peminjaman.id_pegawai WHERE peminjaman.status_peminjaman = '1'";

                            $d_query = mysqli_query($koneksi, $d_peminjaman);
                            $cek = mysqli_num_rows($d_query);

                            if ($cek > 0) {
                                $no = 1;
                                while ($data_d = mysqli_fetch_array($d_query)) {
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data_d['id_peminjaman']?></td>
                                        <td><?= $hari ?></td>
                                        <td><?= $data_d['nama_pegawai']?></td>
                                        <td><?= $data_d['nama']?></td>
                                        <td><?= $data_d['jml']?></td>
                                        <td><?= $data_d['tanggal_kembali']?></td>
                                        <td>
                                            <?php
                                                if($data_d['status_peminjaman'] == '0'){
                                                    echo "<label class='label label-danger'>Konfimasi</label>";
                                                }else if($data_d['status_peminjaman'] == '1'){
                                                    echo "<label class='label label-warning'>Dipinjam</label>";
                                                }else{
                                                    echo "<label class='label label-success'>Dikembalikan</label>";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="?p=detail_pengembalian&id_peminjaman=<?= $data_d['id_peminjaman'] ?>" 
                                            class="btn btn-sm btn-primary">Proses</a>
                                        </td>
                                    </tr>
                                  <?php  
                                }
                            }else{
                                ?>
                                    <tr>
                                        <td colspan="9">Tidak Ada Data</td>
                                    </tr>
                                <?php
                            }
                        ?>
                        <!-- <tr>
                            <td>1</td>
                            <td>12-10-2023</td>
                            <td>Abdul Somat</td>
                            <td>Laptop</td>
                            <td>190</td>
                            <td>13-10-2023</td>
                            <td>
                                <label for="" class="label label-warning">Dipinjam</label>
                            </td>
                            <td>
                                <a href="?p=detail_pengembalian" class="btn btn-sm btn-primary ">Konfirmasi</a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>