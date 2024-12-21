<?php
namespace App\Controllers\Admin;
use App\Models\Party;
use CodeIgniter\Controller;

class PartyController extends Controller
{
    public function index()
    {
        $partyModel = new Party();
        $session = session();
        $parties = $partyModel->findAll();
        $data = [
            "parties" => $parties,
            "validation" => $session->getFlashdata('validation'),
            "message" => $session->getFlashdata('message'),
        ];
        return view("pages/admin/party", $data);
    }
    public function add()
    {
        helper(['form']);
        $rules = [
            'partyName' => 'required|min_length[2]|max_length[50]',
            'leaderName' => 'required|min_length[2]|max_length[50]',
            'partySymbol' => 'required|min_length[2]|max_length[50]',
            'foundedYear' => 'required|min_length[4]|max_length[4]',
        ];

        if ($this->validate($rules)) {
            $partyModel = new party();
            $data = [
                'partyName' => $this->request->getVar('partyName'),
                'leaderName' => $this->request->getVar('leaderName'),
                'partySymbol' => $this->request->getVar('partySymbol'),
                'foundedYear' => $this->request->getVar('foundedYear'),
            ];
            $partyModel->save($data);
            return redirect()->to('/admin/party');
        } else {
            $session = session();
            $session->setFlashdata('validation', $this->validator);
            return redirect()->to('/admin/party');
        }
    }
    public function remove($partyID)
    {
        $partyModel = new Party();
        $partyModel->where('id', $partyID)->delete();
        $session = session();
        $session->setFlashdata('message', 'Party deleted succcessfully.');
        return redirect()->to('/admin/party');
    }
}