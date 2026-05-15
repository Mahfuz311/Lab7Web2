# Praktikum 1 - 6 PHP
**Nama:** Mahfuz Fauzi  
**Kelas:** I241C  
**NIM:** 312410412  
**Mata Kuliah:** Pemrograman Web 2  
**Dosen Pengampu:** Agung Nugroho, S.Kom., M.Kom  
**Universitas Pelita Bangsa**

---

# Laporan Praktikum 1: PHP Framework (Codeigniter)

Repository ini dibuat untuk memenuhi tugas Laporan Praktikum Pemrograman Web 2 di Universitas Pelita Bangsa

## Tujuan Praktikum
* Mahasiswa mampu memahami konsep dasar Framework
* Mahasiswa mampu memahami konsep dasar MVC
* Mahasaswa mampu membuat program sederhana menggunakan Framework Codeigniter4

---

## 🧩 Langkah-Langkah Praktikum

### 1. Persiapan Web Server
Sebelum memulai menggunakan Framework Codeigniter, konfigurasi pada webserver perlu dilakukan. Beberapa ekstensi PHP diaktifkan melalui XAMPP Control Panel pada menu Config -> PHP.ini. Ekstensi yang diaktifkan dengan menghilangkan tanda titik koma (;) meliputi php-json, php-mysqlnd, php-xml, php-intl, dan libcurl. Setelah file disimpan, Apache web server di-restart.

<img width="558" height="330" alt="1 1" src="https://github.com/user-attachments/assets/e59f290d-a92c-4327-923d-81ee6542a51e" />


### 2. Instalasi Codeigniter 4
Instalasi dilakukan secara manual dengan mengunduh framework dari website resmi Codeigniter. File diekstrak ke direktori htdocs/lab11_ci dan nama foldernya diubah menjadi ci4. Aplikasi kemudian diakses melalui browser di alamat http://localhost/lab11_ci/ci4/public/.

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/1.png" width="800">

### 3. Menjalankan CLI (Command Line Interface)
Codeigniter 4 menyediakan CLI untuk mempermudah proses development. Melalui terminal/command prompt, direktori diarahkan ke lokasi project (xampp/htdocs/lab11_ci/ci4/). CLI dipanggil dengan menjalankan perintah php spark.

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/2.png" width="800">

### 4. Mengaktifkan Mode Debugging
Secara default fitur debugging belum aktif, sehingga semua jenis error akan ditampilkan dengan pesan "Whoops!" yang sama. Untuk memudahkan mengetahui jenis error, mode debugging diaktifkan dengan mengubah nama file env menjadi .env. Di dalam file tersebut, nilai konfigurasi CI_ENVIRONMENT diubah menjadi development.

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/3.png" width="800">

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/6.png" width="800">

### 5. Memahami Konsep MVC, Routing, dan Controller
Codeigniter menggunakan konsep MVC (Model-View-Controller) untuk memisahkan kode program berdasarkan logic proses, data, dan tampilan. 
* Routing: Rute request diatur pada file app/config/Routes.php. Routing baru ditambahkan untuk halaman /about, /contact, dan /faqs.
* Controller: File Page.php dibuat di dalam direktori Controller untuk menangani routing yang telah dibuat. Fungsi-fungsi seperti about(), contact(), dan faqs() ditambahkan untuk menampilkan teks sederhana.
* Auto Routing: Fitur autoroute dicoba dengan menambahkan method tos() pada Controller Page, yang dapat diakses langsung melalui http://localhost:8080/page/tos tanpa didefinisikan secara eksplisit di file routes.

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/4.png" width="800">

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/5.png" width="800">

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/8.png" width="800">

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/9.png" width="800">

### 6. Membuat View dan Layout dengan CSS
Untuk membuat tampilan lebih menarik, file view about.php dibuat di dalam direktori app/view/. File Controller Page.php diperbarui agar memuat file view tersebut menggunakan return view('about', [...]) beserta pengiriman data array seperti judul dan konten.

Untuk layouting, file style.css diletakkan pada direktori public. Pembuatan template dilakukan dengan membuat folder template di dalam direktori view yang berisi header.php dan footer.php. File about.php kemudian dimodifikasi untuk memanggil layout header dan footer tersebut menggunakan fungsi include().

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/10.png" width="800">

---

## Penyelesaian Tugas

Untuk melengkapi navigasi header agar menampilkan layout yang seragam, file view baru (artikel.php dan contact.php) ditambahkan di dalam direktori app/view/. File-file view ini memanggil template header dan footer yang sama dengan halaman about. Selanjutnya, method pada Controller Page.php diperbarui untuk merender view tersebut beserta pengiriman variabel judul dan konten yang sesuai dengan masing-masing halaman.

---

# Laporan Praktikum 2: Framework Lanjutan (CRUD)

Repository ini merupakan lanjutan tugas Praktikum Pemrograman Web 2 di Universitas Pelita Bangsa. 

## Tujuan Praktikum
* Mahasiswa mampu memahami konsep dasar Model.
* Mahasiswa mampu memahami konsep dasar CRUD.
* Mahasaswa mampu membuat program sederhana menggunakan Framework Codeigniter4.

---

## 🧩 Langkah-Langkah Praktikum

### 1. Persiapan Database
Persiapan awal untuk membuat aplikasi CRUD adalah menyiapkan database server menggunakan MySQL. Database baru dibuat dengan nama `lab_ci4`. Di dalam database tersebut, dibuat sebuah tabel bernama `artikel` yang berisi field `id`, `judul`, `isi`, `gambar`, `status`, dan `slug`.

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/14.png" width="800">

### 2. Konfigurasi Koneksi Database
Konfigurasi untuk menghubungkan aplikasi dengan database server dilakukan melalui file `.env`. Nilai variabel seperti hostname, nama database (`lab_ci4`), username (`root`), dan password disesuaikan dengan environment sistem.

<img width="338" height="101" alt="13 1" src="https://github.com/user-attachments/assets/1f44b21f-8da7-40cf-b5f3-3cba5609be53" />


### 3. Membuat Model
Model dibuat untuk memproses data dari tabel Artikel. File baru bernama `ArtikelModel.php` dibuat pada direktori `app/Models`. Model ini mendefinisikan nama tabel, primary key, dan field yang diizinkan untuk dimanipulasi melalui properti `allowedFields`.

### 4. Membuat Controller dan View (Menampilkan Data)
Controller `Artikel.php` dibuat pada direktori `app/Controllers` untuk menangani logika aplikasi. Method `index()` ditambahkan untuk mengambil seluruh data artikel dari `ArtikelModel` dan mengirimkannya ke view. View untuk menampilkan daftar artikel dibuat pada file `app/views/artikel/index.php`. Untuk menampilkan isi detail dari masing-masing artikel, dibuat method `view($slug)` pada controller dan file view `app/views/artikel/detail.php`.

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/13.png" width="800">

### 5. Membuat Routing
Untuk mengatur rute URL, file `app/config/Routes.php` dimodifikasi. Routing baru ditambahkan untuk halaman detail artikel (`/artikel/(:any)`) dan sebuah *group routing* khusus untuk memisahkan akses menu admin (`/admin/artikel`).

### 6. Membuat Menu Admin (Implementasi CRUD)
Menu admin dibuat untuk mengelola proses CRUD (Create, Read, Update, Delete) pada keseluruhan data artikel.
* **Read:** Menampilkan data di dashboard admin menggunakan method `admin_index()` dan file view `admin_index.php`.
* **Create (Tambah Data):** Menambahkan method `add()` yang berisi validasi data (seperti memastikan judul terisi) dan eksekusi query insert, beserta form input pada view `form_add.php`.
* **Update (Ubah Data):** Menambahkan method `edit($id)` untuk mengambil data lama berdasarkan ID dan melakukan update data baru, beserta form edit pada view `form_edit.php`.
* **Delete (Hapus Data):** Menambahkan method `delete($id)` pada controller untuk mengeksekusi penghapusan data artikel berdasarkan ID yang dipilih.

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/18.png" width="800">

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/19.png" width="800">

---

# Laporan Praktikum 3: View Layout dan View Cell

Repository ini merupakan lanjutan tugas Praktikum Pemrograman Web 2.

## Tujuan Praktikum
* Memahami konsep View Layout di CodeIgniter 4.
* Menggunakan View Layout untuk membuat template tampilan.
* Memahami dan mengimplementasikan View Cell dalam CodeIgniter 4.
* Menggunakan View Cell untuk memanggil komponen UI secara modular.

---

## 🧩 Langkah-Langkah Praktikum

### 1. Persiapan dan Pembuatan Layout Utama
Praktikum ini beralih dari konsep layout parsial menjadi penggunaan View Layout dan View Cell untuk kemudahan manajemen template.
* Langkah pertama adalah membuat direktori baru bernama `layout` di dalam `app/Views/`.
* Di dalamnya, dibuat file `main.php` yang berfungsi sebagai template utama aplikasi.
* File `main.php` ini berisi struktur dasar HTML, navigasi, dan fungsi `<?= $this->renderSection('content') ?>` untuk menentukan area di mana konten spesifik halaman akan di-render.
* Pada bagian *sidebar*, disisipkan pemanggilan View Cell menggunakan sintaks `<?= view_cell('App\Cells\ArtikelTerkini::render') ?>`.

### 2. Modifikasi File View (Implementasi Layout)
File view yang sudah ada, seperti `app/Views/home.php`, dimodifikasi agar menggunakan *layout* yang baru saja dibuat.
* Pemanggilan layout utama dilakukan dengan menambahkan kode `<?= $this->extend('layout/main') ?>` di bagian paling atas file.
* Konten utama dari halaman tersebut kemudian dibungkus menggunakan kode `<?= $this->section('content') ?>` dan diakhiri dengan `<?= $this->endSection() ?>`.
* Penyesuaian ini juga diterapkan pada halaman lainnya (seperti about, artikel, kontak) agar struktur tampilannya konsisten mengikuti `main.php`.

### 3. Membuat Class View Cell
View Cell digunakan untuk membuat komponen UI modular yang dapat digunakan secara berulang, seperti elemen *sidebar* yang menampilkan daftar artikel terbaru.
* Direktori baru bernama `Cells` dibuat di dalam direktori `app/`.
* File class `ArtikelTerkini.php` ditambahkan di dalam folder tersebut.
* Class `ArtikelTerkini` mewarisi properti dari `Cell` dan berisi method `render()` yang bertugas menginisialisasi `ArtikelModel`.
* Method tersebut mengambil 5 data artikel terbaru secara *descending* (menurun) berdasarkan waktu pembuatan (`created_at`), lalu mengirimkan data tersebut ke file view komponen.

### 4. Membuat View untuk View Cell
* Folder baru dengan nama `components` ditambahkan di dalam `app/Views/`.
* File `artikel_terkini.php` dibuat di dalam folder `components` tersebut untuk menangani tampilan antarmuka dari View Cell.
* File ini bertugas mengeksekusi perulangan (`foreach`) pada array `$artikel` untuk menampilkan daftar judul artikel terkini dalam bentuk *list HTML* (`<li>`), beserta tautan yang mengarah ke halaman detail artikel berdasarkan *slug*.

Hasilnya:
<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/13.png" width="800">

---

## Jawaban Pertanyaan dan Tugas

* **Penyesuaian Database:** Agar fitur View Cell berjalan dengan baik, struktur tabel `artikel` pada database dimodifikasi dengan menambahkan *field* `created_at` (tipe data TIMESTAMP/DATETIME). Ini memungkinkan pengambilan dan pengurutan data artikel terbaru.
* **Manfaat Utama View Layout:** Memudahkan pengelolaan dan pemeliharaan *template* aplikasi web. Perubahan struktur utama (seperti *header* atau *footer*) hanya perlu dilakukan di satu file utama, tanpa harus mengubah struktur dasar pada setiap file halaman.
* **Perbedaan View Cell dan View Biasa:** View biasa digunakan untuk me-render keseluruhan halaman utama yang terikat langsung dengan Controller. Sedangkan View Cell adalah komponen mini/modular yang memiliki logika pengambilan datanya sendiri secara independen, yang dapat disisipkan ke dalam View biasa mana pun layaknya sebuah *widget*.
* **Tugas View Cell Kategori:** View Cell dapat dimodifikasi dengan menambahkan metode filter tambahan (seperti `where()`) pada *query builder* di dalam class `ArtikelTerkini` agar hanya menampilkan artikel dengan kriteria atau kategori tertentu.

---

# Laporan Praktikum 4: Framework Lanjutan (Modul Login)

Repository ini merupakan lanjutan tugas Praktikum Pemrograman Web 2 di Universitas Pelita Bangsa untuk mengimplementasikan sistem autentikasi.

## Tujuan Praktikum
* Mahasiswa mampu memahami konsep dasar Auth dan Filter.
* Mahasiswa mampu memahami konsep dasar Login System.
* Mahasaswa mampu membuat modul login menggunakan Framework Codeigniter 4.

---

## 🧩 Langkah-Langkah Praktikum

### 1. Persiapan Database dan Tabel
Langkah pertama untuk membuat modul login adalah memastikan database MySQL berjalan melalui XAMPP. Setelah itu, sebuah tabel baru bernama `user` dibuat di dalam database dengan kolom `id` (Auto Increment), `username`, `useremail`, dan `userpassword`.

<img width="959" height="535" alt="13 2" src="https://github.com/user-attachments/assets/2134daf4-4171-4b1b-bc7d-a774b0595b57" />


### 2. Membuat Model User
File model baru bernama `UserModel.php` ditambahkan ke dalam direktori `app/Models`. Model ini bertugas untuk berinteraksi dengan tabel `user` dan membatasi kolom mana saja yang boleh dimanipulasi menggunakan properti `$allowedFields`.

### 3. Membuat Controller User
Pemrosesan logika login ditangani oleh `User.php` yang dibuat di dalam `app/Controllers`. Controller ini memuat method `index()` untuk menampilkan daftar pengguna, dan method `login()` yang menangani proses autentikasi. Method login ini mencakup inisialisasi session, pengecekan email di database, dan verifikasi password menggunakan fungsi bawaan `password_verify`. Jika berhasil, data *session* pengguna akan disimpan.

### 4. Membuat View Login
Antarmuka untuk halaman login dibuat pada file `login.php` yang berlokasi di `app/views/user/`. View ini memuat form HTML yang menggunakan metode POST untuk mengirimkan data inputan *Email address* dan *Password* kembali ke Controller.

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/17.png" width="800">

### 5. Membuat Database Seeder
Agar sistem login dapat diuji coba tanpa harus membuat fitur registrasi terlebih dahulu, data *dummy* dimasukkan menggunakan Database Seeder. File seeder dibuat melalui perintah CLI `php spark make:seeder UserSeeder`. Di dalamnya disisipkan data kredensial default yaitu email `admin@email.com` dan password `admin123` yang sudah dienkripsi menggunakan `password_hash`. Data ini kemudian dieksekusi ke database dengan perintah `php spark db:seed UserSeeder`.

<img width="959" height="352" alt="20" src="https://github.com/user-attachments/assets/6f948c70-719b-4a86-ab10-a15f34dab621" />


### 6. Menambahkan Auth Filter
Keamanan halaman admin ditingkatkan dengan fitur Filter. File `Auth.php` dibuat di direktori `app/Filters`. Filter ini bekerja dengan mengecek ketersediaan *session* `logged_in`; jika tidak ada, pengguna akan langsung dilempar kembali (redirect) ke halaman login. Filter ini kemudian didaftarkan sebagai *aliases* di dalam file konfigurasi `app/Config/Filters.php`.

### 7. Penerapan Routing dan Logout
Filter autentikasi diimplementasikan pada `app/Config/Routes.php` dengan menambahkan parameter `['filter' => 'auth']` pada *group routing* `admin`, sehingga seluruh URL yang berada di bawah grup ini terlindungi secara otomatis. Terakhir, fitur untuk keluar dari sesi ditambahkan melalui method `logout()` pada Controller User yang berfungsi untuk menghancurkan *session* (`session()->destroy()`) dan mengarahkan pengguna kembali ke halaman login.

### Hasil

Login:

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/login.png" width="800">

Home:

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/home.png" width="800">

Kontak:

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/kontak.png" width="800">

Admin:

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/827658c625c797deb3f2a9b1d3b705deb661e049/ss/18.png" width="800">

---

# Laporan Praktikum 5: Pagination dan Pencarian

Ini adalah lanjutan tugas Praktikum Pemrograman Web 2

## Tujuan Praktikum
1. Memahami konsep dasar *Pagination* (Paging) untuk membatasi tampilan data.
2. Memahami konsep dasar Pencarian (*Search*) untuk memfilter data.
3. Mampu membuat fitur *Paging* dan Pencarian menggunakan Framework CodeIgniter 4.

---

## 🧩 Langkah-Langkah Praktikum

### 1. Modifikasi Controller Artikel (Pagination & Pencarian)
- Membuka file `app/Controllers/Artikel.php`.
- Memodifikasi method `admin_index()` untuk menangkap parameter pencarian (request GET `q`).
- Mengganti fungsi `findAll()` menjadi gabungan fungsi `like('judul', $q)` untuk mencari data berdasarkan judul, dan fungsi `paginate()` untuk membatasi jumlah baris data yang ditampilkan per halaman.
- Mengirimkan data `pager` dari model ke *view* untuk menampilkan tombol halaman.

### 2. Menambahkan Form Pencarian di View
- Membuka file `app/Views/artikel/admin_index.php`.
- Menambahkan form pencarian menggunakan metode `GET` tepat di atas tabel data artikel. Form ini memiliki inputan teks untuk memasukkan kata kunci pencarian.

### 3. Menambahkan Link Pagination dan Menyesuaikan Nomor Urut
- Di file `app/Views/artikel/admin_index.php`, menyisipkan perintah `<?= $pager->only(['q'])->links(); ?>` di bawah tabel untuk memunculkan tombol navigasi halaman. Parameter `only(['q'])` digunakan agar kata kunci pencarian tetap tersimpan saat berpindah halaman.
- Memodifikasi kolom penomoran ID tabel agar menggunakan nomor urut tampilan (1, 2, 3...) yang dinamis sesuai halamannya menggunakan perhitungan variabel `$no`.

### 4. Uji Coba (Testing)
- Mengakses halaman Admin Portal Berita dan menambahkan beberapa data artikel *dummy* (via fitur *Seeder* maupun manual).
- Melakukan uji coba memasukkan kata kunci pada kotak pencarian untuk melihat apakah tabel berhasil difilter.
- Menguji coba perpindahan halaman dengan menekan tombol navigasi di bawah tabel.

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/dbc52e9216a65ddfe8643345b62cf518d1cfc85e/ss/21.png">

---

# Laporan Praktikum 6: Relasi Tabel dan Query Builder

## Tujuan Praktikum
1. Memahami konsep relasi antar tabel (One-to-Many) dalam database.
2. Mengimplementasikan relasi menggunakan tabel `kategori` dan `artikel`.
3. Melakukan query join antar tabel menggunakan fitur Query Builder di CodeIgniter 4.
4. Menampilkan data dari tabel yang saling berelasi pada antarmuka pengguna (View).

---

## 🧩 Langkah-Langkah Praktikum

### 1. Persiapan Database & Relasi Tabel
- Membuat tabel baru bernama `kategori` untuk menyimpan daftar nama kategori.
- Memodifikasi tabel `artikel` dengan menambahkan kolom `id_kategori` sebagai *Foreign Key* yang berelasi dengan tabel `kategori`.
- Menyisipkan beberapa data kategori awal (Informasi, Teknologi, Pendidikan, Gaya Hidup) melalui phpMyAdmin.

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/dbc52e9216a65ddfe8643345b62cf518d1cfc85e/ss/Praktikum6.1.png">

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/dbc52e9216a65ddfe8643345b62cf518d1cfc85e/ss/praktikum6.2.png">

### 2. Konfigurasi Model (Kategori & Artikel)
- Membuat file `KategoriModel.php` untuk memetakan tabel kategori.
- Memperbarui `ArtikelModel.php` dengan menambahkan `id_kategori` ke dalam `$allowedFields`.
- Membuat method `getArtikelDenganKategori()` di dalam `ArtikelModel` yang menggunakan fitur **Query Builder** untuk melakukan operasi `JOIN` antara tabel artikel dan kategori.

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/dbc52e9216a65ddfe8643345b62cf518d1cfc85e/ss/praktikum6.3.png">

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/dbc52e9216a65ddfe8643345b62cf518d1cfc85e/ss/praktikum6.4.png">

### 3. Pembaruan Controller Artikel
- Mengimpor `KategoriModel` ke dalam Controller `Artikel.php`.
- Memodifikasi method `admin_index()` untuk menangani parameter pencarian (`q`) dan filter kategori (`kategori_id`), sekaligus mengimplementasikan *pagination*.
- Mengubah metode `add()` dan `edit()` agar dapat menangkap inputan `id_kategori` dari form pengguna dan menyimpannya ke dalam database.

### 4. Modifikasi View (Antarmuka Pengguna)
- **Halaman Admin (`admin_index.php`):** Menambahkan elemen dropdown filter kategori di samping kolom pencarian dan memunculkan kolom kategori pada tabel data.
- **Form Tambah/Edit (`form_add.php` & `form_edit.php`):** Mengganti input teks biasa menjadi tag `<select>` yang melooping data kategori dari database secara dinamis.
- **Halaman Publik:** Memperbarui `index.php` (daftar artikel) dan `detail.php` (detail artikel tunggal) untuk menampilkan nama kategori milik masing-masing artikel sebagai bentuk penyelesaian tugas wajib modul.

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/dbc52e9216a65ddfe8643345b62cf518d1cfc85e/ss/praktikum6.6.png">

<img src="https://github.com/Mahfuz311/Lab7Web2/blob/dbc52e9216a65ddfe8643345b62cf518d1cfc85e/ss/21.png">

---
