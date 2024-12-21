<?php
namespace App\Controllers\Admin;
use App\Models\Voter;
use CodeIgniter\Controller;

class VoterController extends Controller
{
    public function index()
    {
        $voterModel = new Voter();
        $session = session();
        $voters = $voterModel->findAll();
        $data = [
            "voters" => $voters,
            "validation" => $session->getFlashdata('validation'),
            "message" => $session->getFlashdata('message'),
        ];
        return view("pages/admin/voter", $data);
    }
    public function get($userID)
    {
        $voterModel = new Voter();
        $session = session();
        $voters = $voterModel->where('userID', $userID)->find();
        $data = [
            "voters" => $voters,
            "validation" => $session->getFlashdata('validation'),
            "message" => $session->getFlashdata('message'),
        ];
        return view("pages/admin/adminProfile", $data);
    }
    public function remove($voterID)
    {
        $voterModel = new voter();
        $voterModel->where('id', $voterID)->delete();
        $session = session();
        $session->setFlashdata('message', 'voter deleted succcessfully.');
        return redirect()->to('/admin/voter');
    }
}