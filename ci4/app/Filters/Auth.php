<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // 1. Cek apakah pengguna sudah login
        if(!session()->get('logged_in')){
            return redirect()->to('/user/login');
        }

        // 2. Cek otoritas (role) pengguna jika mengakses rute admin
        $uri = service('uri');
        if ($uri->getSegment(1) == 'admin') {
            // Jika dia mencoba masuk ke /admin/... tetapi rolenya bukan admin, tendang keluar
            if (session()->get('role') != 'admin') {
                return redirect()->to('/'); 
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}