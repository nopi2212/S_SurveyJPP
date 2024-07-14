<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pertanyaan;
use CodeIgniter\HTTP\ResponseInterface;

class PertanyaanController extends BaseController
{
    protected $pertanyaans, $validation, $datas;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->pertanyaans = new Pertanyaan();
        $this->datas = [
            'current_page' => 'pertanyaan',
            'title' => 'Pertanyaan',
            'pertanyaans' => $this->pertanyaans->findAll(),
            'validation' => $this->validation,
        ];
    }

    public function index()
    {
        return view('auth/pertanyaan/index', $this->datas);
    }

    public function edit($id)
    {
        $data = [
            'current_page' => 'pertanyaan',
            'title' => 'Pertanyaan',
            'pertanyaan' => $this->pertanyaans->where('IdPertanyaan', $id)->first(),
            'validation' => $this->validation,
        ];

        return view('auth/pertanyaan/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'current_page' => 'pertanyaan',
            'title' => 'Pertanyaan',
            'pertanyaan' => $this->pertanyaans->where('IdPertanyaan', $id)->first(),
            'validation' => $this->validation,
        ];

        $rules = [
            'NamaPertanyaan' => 'required',
        ];

        if (!$this->validate($rules)) {
            return view('auth/pertanyaan/edit', $data);
        }

        $data = [
            'NamaPertanyaan' => trim($this->request->getVar('NamaPertanyaan')),
        ];

        $this->pertanyaans->update($id, $data);
        session()->setFlashdata("message", 'Disimpan');
        return redirect()->to('/pertanyaan');
    }
}
