<?php
namespace App\Controllers;

class Page extends BaseController
{
    public function index()
    {
        return view('home', [
            'title'   => 'Halaman Home',
            'content' => 'Ini halaman Index. Selamat datang di Portal Berita!'
        ]);
    }

    public function about()
    {
        return view('about', [
            'title'   => 'Halaman About',
            'content' => 'Ini adalah halaman about yang menjelaskan tentang isi halaman ini.'
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'title'   => 'Halaman Kontak',
            'content' => 'Silakan hubungi kami jika ada pertanyaan atau saran.'
        ]);
    }

    public function faqs()
    {
        return view('faqs', [
            'title'   => 'Halaman FAQ',
            'content' => 'Pertanyaan yang sering diajukan akan muncul di sini.'
        ]);
    }

    public function tos()
    {
        return view('tos', [
            'title'   => 'Term of Services',
            'content' => 'Halaman ini berisi syarat dan ketentuan penggunaan layanan kami.'
        ]);
    }

    public function artikel()
    {
        return view('artikel/index', [
            'title'   => 'Daftar Artikel',
            'content' => 'Berikut adalah daftar artikel terbaru kami.'
        ]);
    }
}