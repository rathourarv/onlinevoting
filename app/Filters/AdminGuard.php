<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/signin');
        } else if (!$session->get('is_admin')) {
            return redirect('errors/forbidden');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}