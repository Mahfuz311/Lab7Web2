<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

<form action="" method="post" enctype="multipart/form-data">
    <p>
        <label for="judul">Judul:</label><br>
        <input type="text" name="judul" id="judul" value="<?= $data['judul'];?>" style="width: 100%;">
    </p>
    
    <p>
        <label for="isi">Isi Artikel:</label><br>
        <textarea name="isi" id="isi" cols="50" rows="10" style="width: 100%;"><?= $data['isi']; ?></textarea>
    </p>

    <p>
        <label for="kategori">Kategori:</label><br>
        <input type="text" name="kategori" id="kategori" value="<?= isset($data['kategori']) ? $data['kategori'] : '' ?>" style="width: 100%;">
    </p>

    <p>
        <label for="gambar">Ganti Foto (Biarkan kosong jika tidak mengubah foto):</label><br>
        <input type="file" name="gambar" id="gambar">
    </p>

    <p>
        <input type="submit" value="Kirim" class="btn btn-large btn-primary">
    </p>
</form>

<?= $this->include('template/admin_footer'); ?>