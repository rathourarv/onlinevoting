<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        $session = session();
        $data = [
            "username" => $session->get("first_name"),
            "is_logged_in" => $session->get("isLoggedIn"),
        ];
        return view("pages/aboutUs", $data);
    }
}