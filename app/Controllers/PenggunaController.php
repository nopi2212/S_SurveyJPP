<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class PenggunaController extends BaseController
{
    protected $users, $validation, $datas;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->users = new User();
        $this->datas = [
            'current_page' => 'pengguna',
            'title' => 'Pengguna',
            'users' => $this->users->findAll(),
            'validation' => $this->validation,
        ];
    }

    public function index()
    {
        return view('auth/pengguna/index', $this->datas);
    }

    public function create()
    {
        return view('auth/pengguna/create', $this->datas);
    }

    public function save()
    {
        $rules = [
            'Username' => 'required',
            'Role' => 'required',
            'FullName' => 'required',
        ];

        if (!$this->validate($rules)) {
            return view('auth/pengguna/create', $this->datas);
        }

        $data = [
            'Username' => trim($this->request->getVar('Username')),
            'Password' => password_hash($this->request->getVar('Role') . '123#', PASSWORD_BCRYPT),
            'Role' => trim($this->request->getVar('Role')),
            'FullName' => trim($this->request->getVar('FullName')),
            'LastLogin' => date("Y-m-d h:i:sa"),
        ];

        $this->users->save($data);
        session()->setFlashdata("message", 'Disimpan');
        return redirect()->to('/pengguna');
    }

    public function edit($id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'user' => $this->users->where('IdUser', $id)->first(),
            'current_page' => 'pengguna',
            'title' => 'Pengguna',
        ];
        return view('auth/pengguna/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'Username' => 'required',
            'Role' => 'required',
            'FullName' => 'required',
        ];

        if (!$this->validate($rules)) {
            $data = [
                'validation' => \Config\Services::validation(),
                'user' => $this->users->where('IdUser', $id)->first(),
                'current_page' => 'pengguna',
                'title' => 'Pengguna',
            ];
            return view('auth/pengguna/edit', $data);
        }

        $data = [
            'Username' => trim($this->request->getVar('Username')),
            'FullName' => trim($this->request->getVar('FullName')),
            'Role' => trim($this->request->getVar('Role')),
        ];

        $this->users->update($id, $data);
        session()->setFlashdata("message", 'Disimpan');
        return redirect()->to('/pengguna');
    }

    public function delete($id)
    {
        $this->users->where('IdUser', $id)->delete();
        session()->setFlashdata("message", 'Hapus');
        return redirect()->to('/pengguna');
    }
}
