<?= $this->include('template/admin_header'); ?>

<form method="get" class="form-search" style="margin-bottom: 15px; display: flex; gap: 10px;">
    <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari data" style="padding: 5px; width: 250px;" class="form-control">
    
    <select name="kategori_id" class="form-control" style="width: 200px;">
        <option value="">Semua Kategori</option>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                <?= $k['nama_kategori']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <input type="submit" value="Cari" class="btn btn-primary">
</form>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th> <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $no = 1 + (4 * ($page - 1)); 
        
        if($artikel): foreach($artikel as $row): 
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td>
                <b><?= $row['judul']; ?></b>
                <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
            </td>
            <td><?= $row['nama_kategori']; ?></td> <td><?= $row['status']; ?></td>
            <td>
                <a class="btn" href="<?= base_url('/admin/artikel/edit/' . $row['id']); ?>">Ubah</a>
                <a class="btn btn-danger" onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('/admin/artikel/delete/' . $row['id']);?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr>
            <td colspan="5">Belum ada data.</td>
        </tr>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
</table>

<?= $pager->only(['q', 'kategori_id'])->links(); ?>

<?= $this->include('template/admin_footer'); ?>