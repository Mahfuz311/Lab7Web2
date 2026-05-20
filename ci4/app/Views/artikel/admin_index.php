<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

<div class="row mb-3">
    <div class="col-md-6">
        <form id="search-form" class="form-inline" style="display: flex; gap: 10px;">
            <input type="text" name="q" id="search-box" value="<?= $q; ?>" placeholder="Cari judul artikel" class="form-control">
            <select name="kategori_id" id="category-filter" class="form-control">
                <option value="">Semua Kategori</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                        <?= $k['nama_kategori']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Cari" class="btn btn-primary">
        </form>
    </div>
</div>

<div id="loading-indicator" style="display: none;" class="mb-3 text-info">
    <i>Memuat data artikel... Tunggu sebentar.</i>
</div>

<div id="article-container"></div>
<div id="pagination-container"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    const articleContainer = $('#article-container');
    const paginationContainer = $('#pagination-container');
    const searchForm = $('#search-form');
    const searchBox = $('#search-box');
    const categoryFilter = $('#category-filter');
    const loadingIndicator = $('#loading-indicator');

    // Fungsi utama mengambil data
    const fetchData = (url) => {
        loadingIndicator.show();
        articleContainer.css('opacity', '0.5');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data) {
                renderArticles(data.artikel);
                renderPagination(data.pager, data.q, data.kategori_id);
                
                loadingIndicator.hide();
                articleContainer.css('opacity', '1'); 
            },
            error: function() {
                loadingIndicator.hide();
                articleContainer.html('<p style="color:red;">Gagal memuat data.</p>').css('opacity', '1');
            }
        });
    };

    // Fungsi menggambar tabel
    const renderArticles = (articles) => {
        let html = '<table class="table">';
        html += '<thead><tr><th>ID</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr></thead><tbody>';

        if (articles.length > 0) {
            articles.forEach(article => {
                let isiSingkat = article.isi ? article.isi.substring(0, 50) : '';
                let kategori = article.nama_kategori ? article.nama_kategori : 'Tidak ada';
                
                html += `<tr>
                    <td>${article.id}</td>
                    <td>
                        <b>${article.judul}</b>
                        <p><small>${isiSingkat}...</small></p>
                    </td>
                    <td>${kategori}</td>
                    <td>${article.status}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="<?= base_url('/admin/artikel/edit/') ?>${article.id}">Ubah</a>
                        <a class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('/admin/artikel/delete/') ?>${article.id}">Hapus</a>
                    </td>
                </tr>`;
            });
        } else {
            html += '<tr><td colspan="5">Tidak ada data.</td></tr>';
        }
        html += '</tbody></table>';
        articleContainer.html(html);
    };

    // Fungsi menggambar link halaman
    const renderPagination = (pager, q, kategori_id) => {
        let html = '<nav><ul class="pagination">';
        if (pager && pager.links) {
            pager.links.forEach(link => {
                let url = link.url ? `${link.url}&q=${q}&kategori_id=${kategori_id}` : '#';
                let activeClass = link.active ? 'active' : '';
                html += `<li class="page-item ${activeClass}"><a class="page-link" href="${url}">${link.title}</a></li>`;
            });
        }
        html += '</ul></nav>';
        paginationContainer.html(html);
    };

    // Trigger saat form pencarian disubmit
    searchForm.on('submit', function(e) {
        e.preventDefault();
        const q = searchBox.val();
        const kategori_id = categoryFilter.val();
        fetchData(`<?= base_url('/admin/artikel') ?>?q=${q}&kategori_id=${kategori_id}`);
    });

    // Trigger saat dropdown kategori diubah
    categoryFilter.on('change', function() {
        searchForm.trigger('submit');
    });

    // Trigger saat tombol pagination diklik
    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        if (url && url !== '#') {
            fetchData(url);
        }
    });

    // Load data pertama kali saat halaman dibuka
    fetchData('<?= base_url('/admin/artikel') ?>');
});
</script>

<?= $this->include('template/admin_footer'); ?>