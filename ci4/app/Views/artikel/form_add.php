<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

<form action="" method="post" enctype="multipart/form-data">
    <p>
        <label for="judul">Judul:</label><br>
        <input type="text" name="judul" id="judul" placeholder="Judul Artikel" style="width: 100%;">
    </p>
    
    <p>
        <label for="isi">Isi Artikel:</label><br>
        <textarea name="isi" id="isi" cols="50" rows="10" placeholder="Isi Artikel" style="width: 100%;"></textarea>
    </p>

    <p>
        <label for="kategori">Kategori:</label><br>
        <input type="text" name="kategori" id="kategori" placeholder="Kategori (Contoh: Berita, Informasi, Tutorial)" style="width: 100%;">
    </p>

    <p>
        <label for="gambar">Foto Artikel:</label><br>
        <input type="file" name="gambar" id="gambar">
    </p>

    <p>
        <input type="submit" value="Kirim" class="btn btn-large btn-primary">
    </p>
</form>

<?= $this->include('template/admin_footer'); ?>