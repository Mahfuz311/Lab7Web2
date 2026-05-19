<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class AjaxController extends BaseController 
{
    public function index()
    {
        $title = "Kelola Artikel dengan AJAX";
        return view('ajax/index', compact('title'));
    }

    public function getData()
    {
        $model = new ArtikelModel();
        $data = $model->orderBy('id', 'DESC')->findAll(); 
        
        return $this->response->setJSON($data);
    }

    public function delete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);
        
        $response = [
            'status' => 'OK',
            'message' => 'Data berhasil dihapus'
        ];
        
        return $this->response->setJSON($response);
    }

    public function add()
    {
        $model = new ArtikelModel();
        
        $model->insert([
            'judul'  => $this->request->getPost('judul'),
            'isi'    => $this->request->getPost('isi'),
            'slug'   => url_title($this->request->getPost('judul'), '-', TRUE),
            'status' => 'Aktif'
        ]);
        
        return $this->response->setJSON([
            'status' => 'OK',
            'message' => 'Artikel baru berhasil ditambahkan!'
        ]);
    }

    public function edit($id)
    {
        $model = new ArtikelModel();
        $data = $model->find($id); 
        
        return $this->response->setJSON($data);
    }

    public function update()
    {
        $model = new ArtikelModel();
        $id = $this->request->getPost('id');
        
        $model->update($id, [
            'judul' => $this->request->getPost('judul'),
            'isi'   => $this->request->getPost('isi')
        ]);
        
        return $this->response->setJSON([
            'status' => 'OK',
            'message' => 'Artikel berhasil diperbarui!'
        ]);
    }
}