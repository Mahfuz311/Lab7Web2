<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        return view('artikel/index', compact('artikel', 'title'));
    }

    public function view($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model->where([
            'slug' => $slug
        ])->first();

        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $title = $artikel['judul'];
        return view('artikel/detail', compact('artikel', 'title'));
    }

    public function admin_index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        return view('artikel/admin_index', compact('artikel', 'title'));
    }

    public function add()
    {
        // Validasi form (opsional tapi sangat disarankan)
        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $artikel = new \App\Models\ArtikelModel();
            
            // 1. Inisiasi variabel nama gambar
            $namaGambar = '';

            // 2. Tangkap file gambar dari form
            $fileGambar = $this->request->getFile('gambar');

            // 3. Periksa apakah gambar valid dan berhasil diunggah
            if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
                // Generate nama acak agar tidak ada file yang tertimpa jika namanya sama
                $namaGambar = $fileGambar->getRandomName();
                
                // Pindahkan file ke direktori public/gambar
                $fileGambar->move('gambar', $namaGambar);
            }

            // 4. Simpan semua data ke database, termasuk nama gambarnya
            $artikel->insert([
                'judul'    => $this->request->getPost('judul'),
                'isi'      => $this->request->getPost('isi'),
                'slug'     => url_title($this->request->getPost('judul'), '-', TRUE),
                'kategori' => $this->request->getPost('kategori'),
                'gambar'   => $namaGambar // Simpan nama file ke tabel
            ]);

            return redirect()->to('/admin/artikel');
        }

        $title = "Tambah Artikel";
        return view('artikel/form_add', compact('title'));
    }

    public function edit($id)
    {
        $artikel = new ArtikelModel();
        
        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $artikel->update($id, [
                'judul'    => $this->request->getPost('judul'),
                'isi'      => $this->request->getPost('isi'),
                'kategori' => $this->request->getPost('kategori'), // Baris baru untuk kategori
            ]);
            return redirect()->to('/admin/artikel');
        }
        
        $data = $artikel->where('id', $id)->first();
        $title = "Edit Artikel";
        return view('artikel/form_edit', compact('title', 'data'));
    }

    public function delete($id)
    {
        $artikel = new ArtikelModel();
        $artikel->delete($id);
        return redirect()->to('/admin/artikel');
    }
}