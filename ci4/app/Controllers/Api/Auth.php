<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Auth extends ResourceController
{
    protected $format = 'json';

    // MEMBUKA GERBANG CORS AGAR TIDAK DIBLOKIR BROWSER
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            exit();
        }
    }

    public function login()
    {
        // Menerima data input dari request body JSON
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $model = new UserModel();

        // Cari user berdasarkan username
        $user = $model->where('username', $username)->first();

        if ($user) {
            // Verifikasi password 
            // (Mendukung password biasa atau yang sudah di-hash dari Praktikum 4)
            if ($password === $user['userpassword'] || password_verify($password, $user['userpassword'])) {
                
                // Jika sukses, kirim status data dan token respon
                return $this->respond([
                    'status'   => 200,
                    'error'    => null,
                    'messages' => 'Login Berhasil',
                    'data'     => [
                        'id'       => $user['id'],
                        'username' => $user['username'],
                        'token'    => base64_encode("TOKEN-SECRET-" . $user['username'])
                    ]
                ], 200);
            }
        }

        // Jika gagal, kirim status error 401 (Unauthorized)
        return $this->failUnauthorized('Username atau Password yang Anda masukkan salah.');
    }
}