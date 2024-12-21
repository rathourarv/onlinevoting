<?php
namespace App\Controllers;
use App\Models\Election;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        $elections = new Election();

        $current_elections = $elections->where('endDate >= current_date() and startDate <= current_date()')->findAll();
        $upcoming_elections = $elections->where('startDate > current_date()')->findAll();

        $data = [
            "username" => $session->get("first_name"),
            "is_logged_in" => $session->get("isLoggedIn"),
            "message" => $session->getFlashdata('message'),
            "warning" => $session->getFlashdata('warning'),
            "current_elections" => $current_elections,
            "upcoming_elections" => $upcoming_elections
        ];
        return view("pages/home", $data);
    }
}