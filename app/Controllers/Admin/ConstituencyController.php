<?php
namespace App\Controllers\Admin;
use App\Models\Constituency;
use CodeIgniter\Controller;

class ConstituencyController extends Controller
{
    public function index()
    {
        $constituencyModel = new Constituency();
        $session = session();
        $constituencies = $constituencyModel->findAll();
        $data = [
            "constituencies" => $constituencies,
            "validation" => $session->getFlashdata('validation'),
            "message" => $session->getFlashdata('message'),
        ];
        return view("pages/admin/constituency", $data);
    }
    public function add()
    {
        $session = session();
        helper(['form']);
        $rules = [
            'constituencyName' => 'required|min_length[2]|max_length[50]',
            'state' => 'required|min_length[2]|max_length[50]',
            'type' => 'required|min_length[2]|max_length[50]',
        ];

        if ($this->validate($rules)) {
            $constituencyModel = new Constituency();
            $data = [
                'constituencyName' => $this->request->getVar('constituencyName'),
                'state' => $this->request->getVar('state'),
                'type' => $this->request->getVar('type'),
            ];
            $constituencyModel->save($data);
            $session->setFlashdata('message', 'Constituency added succcessfully.');
            return redirect()->to('/admin/constituency');
        } else {
            $session = session();
            $session->setFlashdata('validation', $this->validator);
            return redirect()->to('/admin/constituency');
        }
    }
    public function remove($constituencyID)
    {
        $constituencyModel = new Constituency();
        $constituencyModel->where('id', $constituencyID)->delete();
        $session = session();
        $session->setFlashdata('message', 'Constituency deleted succcessfully.');
        return redirect()->to('/admin/constituency');
    }
}