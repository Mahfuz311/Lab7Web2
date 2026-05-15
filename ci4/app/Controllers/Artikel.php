<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
// Kita tidak perlu "use KategoriModel" di sini karena kita akan tembak langsung alamatnya di bawah

class Artikel extends BaseController
{
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->getArtikelDenganKategori(); 
        return view('artikel/index', compact('artikel', 'title'));
    }

    public function view($slug)
    {
        $model = new ArtikelModel();
        // Menggunakan JOIN agar nama_kategori ikut terbawa saat membuka detail artikel
        $artikel = $model->select('artikel.*, kategori.nama_kategori')
                         ->join('kategori', 'kategori.id_kategori = artikel.id_kategori')
                         ->where('slug', $slug)
                         ->first();

        if (empty($artikel)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        /** @var array $artikel */
        $title = $artikel['judul'];
        return view('artikel/detail', compact('artikel', 'title'));
    }

    public function admin_index()
    {
        $title = 'Daftar Artikel (Admin)'; 
        $model = new ArtikelModel();
        
        $q = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? ''; 
        
        $data = [
            'title'       => $title,
            'q'           => $q,
            'kategori_id' => $kategori_id, 
        ];
        
        $builder = $model->table('artikel')
            ->select('artikel.*, kategori.nama_kategori') 
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori'); 
            
        if ($q != '') {
            $builder->like('artikel.judul', $q); 
        }
        
        if ($kategori_id != '') {
            $builder->where('artikel.id_kategori', $kategori_id); 
        }
        
        $data['artikel'] = $builder->paginate(4); 
        $data['pager']   = $model->pager; 
        
        // --- PERBAIKAN ERROR DI SINI ---
        // Menembak alamat folder Models secara langsung
        $kategoriModel = new \App\Models\KategoriModel(); 
        $data['kategori'] = $kategoriModel->findAll(); 
        
        return view('artikel/admin_index', $data); 
    }

    public function add()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul'       => 'required',
            'id_kategori' => 'required' 
        ]);
        
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) { 
            $artikel = new \App\Models\ArtikelModel();
            
            $namaGambar = '';
            $fileGambar = $this->request->getFile('gambar');
            if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
                $namaGambar = $fileGambar->getRandomName();
                $fileGambar->move('gambar', $namaGambar);
            }

            $artikel->insert([
                'judul'       => $this->request->getPost('judul'), 
                'isi'         => $this->request->getPost('isi'), 
                'slug'        => url_title($this->request->getPost('judul'), '-', TRUE), 
                'id_kategori' => $this->request->getPost('id_kategori'), 
                'gambar'      => $namaGambar 
            ]);

            return redirect()->to('/admin/artikel'); 
        }

        $kategoriModel = new \App\Models\KategoriModel(); 
        $data['kategori'] = $kategoriModel->findAll(); 
        $data['title'] = "Tambah Artikel"; 
        
        return view('artikel/form_add', $data); 
    }

    public function edit($id)
    {
        $model = new ArtikelModel(); 
        
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul'       => 'required', 
            'id_kategori' => 'required' 
        ]);
        
        $isDataValid = $validation->withRequest($this->request)->run();
        
        // KITA UBAH JUGA KONDISI IF-NYA DI SINI
        if ($isDataValid) { 
            $model->update($id, [ 
                'judul'       => $this->request->getPost('judul'), 
                'isi'         => $this->request->getPost('isi'), 
                'id_kategori' => $this->request->getPost('id_kategori'), 
            ]);
            return redirect()->to('/admin/artikel'); 
        }
        
        $data['artikel'] = $model->find($id); 
        $kategoriModel = new \App\Models\KategoriModel(); 
        $data['kategori'] = $kategoriModel->findAll(); 
        $data['title'] = "Edit Artikel"; 
        
        return view('artikel/form_edit', $data); 
    }

    public function delete($id)
    {
        $model = new ArtikelModel(); 
        $model->delete($id); 
        return redirect()->to('/admin/artikel'); 
    }
}