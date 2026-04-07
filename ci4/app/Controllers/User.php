<?php
namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $title = 'Daftar User';
        $model = new UserModel();
        $users = $model->findAll();
        return view('user/index', compact('users', 'title'));
    }

    public function login()
    {
        helper(['form']);
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        if (!$email) {
            return view('user/login');
        }
        
        $session = session();
        $model = new UserModel();
        $login = $model->where('useremail', $email)->first();
        
        if ($login) {
            $pass = $login['userpassword'];
            if (password_verify($password, $pass)) {
                // Tambahkan role ke dalam array session
                $login_data = [
                    'user_id'    => $login['id'],
                    'user_name'  => $login['username'],
                    'user_email' => $login['useremail'],
                    'role'       => $login['role'], 
                    'logged_in'  => TRUE,
                ];
                $session->set($login_data);
                
                // Evaluasi arah redirect berdasarkan role
                if ($login['role'] == 'admin') {
                    return redirect()->to('/admin/artikel');
                } else {
                    return redirect()->to('/'); // User biasa diarahkan ke halaman publik
                }
            } else {
                $session->setFlashdata("flash_msg", "Password salah.");
                return redirect()->to('/user/login');
            }
        } else {
            $session->setFlashdata("flash_msg", "email tidak terdaftar.");
            return redirect()->to('/user/login');
        }
    }

    public function logout()
    {
        // Fungsi untuk menghancurkan sesi
        session()->destroy();
        return redirect()->to('/user/login');
    }
}