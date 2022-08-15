<?php
session_start();
include "../koneksi.php";
$id_ruang = $_POST['id_ruang'];
$sql = "select ruang.*,nama_panjang from ruang,unit_kerja where ruang.id_unit_kerja=unit_kerja.id_unit and ruang.id_ruang=$id_ruang";
$query = mysqli_query($koneksi, $sql);
$kolom = mysqli_fetch_array($query);
?>
<form action="aksi/ruang.php" method="POST">
    <input type="hidden" name="aksi" value="ubah">
    <input type="hidden" name="id_ruang" value="<?= $kolom['id_ruang']; ?>">
    <input type="hidden" name="aksi" value="ubah">
    <label for="id_unit_kerja">Pemilik Ruang</label>
    <select class="form-control" name="id_unit_kerja" id="idunitkerja" required="">
        <option value="<?= $kolom['id_unit_kerja']; ?>"><?= $kolom['nama_panjang']; ?></option>
        <?php
        if ($_SESSION['level'] == 1) {

        ?>
            <?php
            $sql = "select * from unit_kerja order by nama_panjang";
            $perintah = mysqli_query($koneksi, $sql);
            while ($r = mysqli_fetch_array($perintah)) {
            ?>
                <option value="<?= $r['id_unit']; ?>"><?= $r['nama_panjang']; ?></option>
            <?php
            }
            ?>

        <?php
        } else {
            $id_unit = $_SESSION['idunit'];
            $nama_unit = $_SESSION['namalengkap'];
            echo "<option value='$id_unit'>$nama_unit</option>";
        }
        ?>
    </select>

    <label for="kode_ruang">Kode Ruang</label>
    <input type="text" name="kode_ruang" class="form-control" value="<?= $kolom['kode_ruang']; ?>" required>

    <label for="nama_ruang">Nama Ruang</label>
    <input type="text" name="nama_ruang" class="form-control" value="<?= $kolom['nama_ruang']; ?>" required>

    <label for="deskripsi">Deskripsi</label>
    <textarea name="deskripsi" rows="3" class="form-control"><?= $kolom['deskripsi']; ?></textarea>

    <label for="lokasi_lantai">Lantai Ke</label>
    <input type="text" name="lokasi_lantai" class="form-control" value="<?= $kolom['lokasi_lantai']; ?>" required>
    
    <button type="submit" class="btn btn-primary btn-block mt-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
</form>