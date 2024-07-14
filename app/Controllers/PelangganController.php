<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer;
use App\Models\HasilKuisioner;
use App\Models\Pertanyaan;
use CodeIgniter\HTTP\ResponseInterface;

class PelangganController extends BaseController
{
    protected $customers, $validation, $result, $pertanyaans;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->customers = new Customer();
        $this->result = new HasilKuisioner();
        $this->pertanyaans = new Pertanyaan();
    }

    public function index()
    {
        $datas = [
            'current_page' => 'pelanggan',
            'title' => 'Pelanggan',
            'customers' => $this->customers->findAll(),
            'validation' => $this->validation,
        ];

        return view('auth/pelanggan/index', $datas);
    }
    public function delete($id)
    {
        $this->customers->transStart();
        foreach ($this->result->findAll() as $result) {
            if ($result->customer_IdCustomer == $id) {
                $this->result->where('customer_IdCustomer', $id)->delete();
            }
        }
        $this->customers->where('IdCustomer', $id)->delete();
        $this->customers->transComplete();

        session()->setFlashdata("message", 'Hapus');
        return redirect()->to('/pelanggan');
    }
}
