<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

<div class="mb-3" id="formTambahContainer">
    <h4>Tambah Artikel AJAX</h4>
    <form id="formTambah">
        <input type="text" id="judulArtikel" class="form-control mb-2" placeholder="Judul Artikel" required>
        <textarea id="isiArtikel" class="form-control mb-2" placeholder="Isi Artikel" required></textarea>
        <button type="submit" class="btn btn-success">Simpan Data</button>
    </form>
</div>

<div class="mb-3" id="formEditContainer" style="display: none;">
    <h4>Edit Artikel AJAX</h4>
    <form id="formEdit">
        <input type="hidden" id="editId">
        <input type="text" id="editJudul" class="form-control mb-2" required>
        <textarea id="editIsi" class="form-control mb-2" required></textarea>
        <button type="submit" class="btn btn-warning">Update Data</button>
        <button type="button" class="btn btn-secondary" id="btnBatal">Batal</button>
    </form>
</div>
<hr>

<table class="table table-bordered table-striped" id="artikelTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    
    function showLoadingMessage() {
        $('#artikelTable tbody').html('<tr><td colspan="4" class="text-center">Loading data...</td></tr>');
    }

    // Fungsi memuat data tabel
    function loadData() {
        showLoadingMessage();
        $.ajax({
            url: "<?= base_url('ajaxcontroller/getdata') ?>",
            method: "GET",
            dataType: "json",
            success: function(data) {
                var tableBody = "";
                for (var i = 0; i < data.length; i++) {
                    var row = data[i];
                    tableBody += '<tr>';
                    tableBody += '<td>' + row.id + '</td>';
                    tableBody += '<td><b>' + row.judul + '</b></td>';
                    tableBody += '<td><span class="badge bg-success">Aktif</span></td>';
                    tableBody += '<td>';
                    // Tombol Edit dan Hapus digabung di sini
                    tableBody += '<button class="btn btn-sm btn-info btn-edit" style="margin-right: 5px;" data-id="' + row.id + '">Edit AJAX</button>';
                    tableBody += '<button class="btn btn-sm btn-danger btn-delete" data-id="' + row.id + '">Hapus AJAX</button>';
                    tableBody += '</td>';
                    tableBody += '</tr>';
                }
                $('#artikelTable tbody').html(tableBody);
            },
            error: function() {
                $('#artikelTable tbody').html('<tr><td colspan="4" class="text-center text-danger">Gagal memuat data!</td></tr>');
            }
        });
    }

    // Panggil data pertama kali
    loadData();

    // 1. Logika Tambah Data
    $('#formTambah').submit(function(e) {
        e.preventDefault();
        var judul = $('#judulArtikel').val();
        var isi = $('#isiArtikel').val();
        $.ajax({
            url: "<?= base_url('ajaxcontroller/add') ?>",
            method: "POST",
            data: { judul: judul, isi: isi },
            success: function(response) {
                alert(response.message);
                $('#formTambah')[0].reset();
                loadData();
            }
        });
    });

    // 2. Logika Hapus Data
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
            $.ajax({
                url: "<?= base_url('ajaxcontroller/delete/') ?>" + id,
                method: "POST",
                success: function(response) {
                    alert(response.message);
                    loadData();
                }
            });
        }
    });

    // 3. Logika Memunculkan Form Edit
    $(document).on('click', '.btn-edit', function() {
        var id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('ajaxcontroller/edit/') ?>" + id,
            method: "GET",
            dataType: "json",
            success: function(data) {
                // Isi form dengan data lama
                $('#editId').val(data.id);
                $('#editJudul').val(data.judul);
                $('#editIsi').val(data.isi);
                
                // Ganti tampilan form
                $('#formTambahContainer').hide();
                $('#formEditContainer').show();
            }
        });
    });

    // 4. Logika Update Data
    $('#formEdit').submit(function(e) {
        e.preventDefault();
        var id = $('#editId').val();
        var judul = $('#editJudul').val();
        var isi = $('#editIsi').val();
        $.ajax({
            url: "<?= base_url('ajaxcontroller/update') ?>",
            method: "POST",
            data: { id: id, judul: judul, isi: isi },
            success: function(response) {
                alert(response.message);
                $('#formEditContainer').hide();
                $('#formTambahContainer').show();
                loadData();
            }
        });
    });

    // 5. Logika Tombol Batal
    $('#btnBatal').click(function() {
        $('#formEditContainer').hide();
        $('#formTambahContainer').show();
    });

});
</script>

<?= $this->include('template/admin_footer'); ?>