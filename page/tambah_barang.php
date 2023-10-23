<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah barang</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-4 center">
            <div class="panel panel-primary">
                <div class="panel-heading">Tambah Inventaris</div>
                <div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Kode Inventaris</label>
                                <input type="text" class="form-control" name="kode_inventaris" placeholder="Masukkan Kode Barang">
                            </div>
                            <div class="form-group">
                                <label>Nama Inventaris</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Barang">
                            </div>
                            <div class="form-group">
                                <label>Kondisi</label>
                                <select name="kondisi" id="" class="form-control">
                                    <option value="" name="kondisi" class="form-control">Pilih</option>
                                    <option value="Baru" name="kondisi" class="form-control">Baru</option>
                                    <option value="Rusak" name="kondisi" class="form-control">Rusak</option>
                                    <option value="Bekas" name="kondisi" class="form-control">Bekas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" name="jumlah" placeholder="Masukkan Jumlah Barang">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Inventaris</label>
                                <select class="form-control" name="id_jenis" id="">
                                <option value="" class="form-control">-- pilih --</option>
                                <?php
                                    $sql_jenis = "SELECT * FROM jenis";
                                    $q_jenis = mysqli_query($koneksi, $sql_jenis);
                                    while($jenis = mysqli_fetch_array($q_jenis)){
                                        ?>
                                        <option value="<?= $jenis['id_jenis'] ?>"><?= $jenis['nama_jenis'] ?></option>
                                        <?php
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Ruang</label>
                                <select class="form-control" name="id_ruang" id="">
                                <option value="" class="form-control">-- pilih --</option>
                                <?php
                                    $sql_ruang = "SELECT * FROM ruang";
                                    $q_ruang = mysqli_query($koneksi, $sql_ruang);
                                    while($ruang = mysqli_fetch_array($q_ruang)){
                                        ?>
                                        <option value="<?= $ruang['id_ruang'] ?>"><?= $ruang['nama_ruang'] ?></option>
                                        <?php
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" id="" cols="30" rows="5" placeholder="Masukkan Keterangan" class="form-control"></textarea>
                            </div>
                            <div class="form-group hidden">
                                <label>Keterangan</label>
                                <input type="number" name="id_petugas" value="1" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-md btn-primary" name="simpan">Simpan</button>
                                <a href="?p=list_barang" class="btn btn-md btn-default">Kembali</a>
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['simpan'])){
                                $kode_inventaris = $_POST['kode_inventaris'];
                                $nama = $_POST['nama'];
                                $kondisi = $_POST['kondisi'];
                                $jumlah = $_POST['jumlah'];
                                $id_jenis = $_POST['id_jenis'];
                                $id_ruang = $_POST['id_ruang'];
                                $keterangan = $_POST['keterangan'];
                                $id_petugas = $_POST['id_petugas'];

                                $sql = "INSERT INTO inventaris  SET 
                                kode_inventaris = '$kode_inventaris' ,
                                nama ='$nama',
                                kondisi = '$kondisi' ,
                                jumlah = '$jumlah' ,
                                id_jenis = '$id_jenis' ,
                                id_ruang = '$id_ruang' ,
                                keterangan = '$keterangan',
                                id_petugas = '$id_petugas' ";

                                $query = mysqli_query($koneksi, $sql);
                                if($query){
                                ?>
                                    <div class="alert alert-success">Barang Berhasil Ditambahkan</div>
                                <?php
                                }else{
                                ?>
                                    <div class="alert alert-danger">Barang Gagal Ditambahkan</div>
                                <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>