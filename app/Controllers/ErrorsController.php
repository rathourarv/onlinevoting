<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class ErrorsController extends Controller
{
    public function forbidden()
    {
        return view(
            'errors/html/error_403',
            ['message' => 'You are not allowed to access this page.']
        );
    }
}