<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer;
use App\Models\HasilKuisioner;
use App\Models\HomePage;
use App\Models\Pertanyaan;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class HomeController extends BaseController
{
    protected $home_page, $pertanyaans, $validation, $session, $customer, $results, $users;
    public function __construct()
    {
        $this->session = session();
        $this->validation = \Config\Services::validation();
        $this->users = new User();
        $this->home_page = new HomePage();
        $this->pertanyaans = new Pertanyaan();
        $this->customer = new Customer();
        $this->results = new HasilKuisioner();
    }

    public function index()
    {
        $data = [
            'home_page' => $this->home_page->first(),
            'pertanyaans' => $this->pertanyaans->findAll(),
            'kepentingan' => ['Sangat Tidak Penting', 'Tidak Penting', 'Cukup Penting', 'Penting', 'Sangat Penting'],
            'kepuasan' => ['Sangat Tidak Puas', 'Tidak Puas', 'Cukup Puas', 'Puas', 'Sangat Puas'],
            'validation' => $this->validation,
        ];

        return view('home', $data);
    }

    public function kuisioner()
    {
        $rules = [
            "kategori" => "required",
            "nama" => "required",
            "nohp" => "required",
            "perusahaan" => "required",
        ];
        if (!$this->validate($rules)) {
            $datas = [
                'validation' => $this->validator,
                'home_page' => $this->home_page->first(),
                'pertanyaans' => $this->pertanyaans->findAll(),
                'kepentingan' => ['Sangat Tidak Penting', 'Tidak Penting', 'Cukup Penting', 'Penting', 'Sangat Penting'],
                'kepuasan' => ['Sangat Tidak Puas', 'Tidak Puas', 'Cukup Puas', 'Puas', 'Sangat Puas'],
            ];
            $this->session->setFlashdata('error', '');
            return view('home', $datas);
        }

        $pertanyaans = $this->pertanyaans->findAll();
        foreach ($pertanyaans as $key => $pertanyaan) {
            $ruless = [
                $pertanyaan->IdPertanyaan . "kepentingan" => "required",
                $pertanyaan->IdPertanyaan . "kepuasan" => "required",
            ];
            if (!$this->validate($ruless)) {
                $datas = [
                    'validation' => $this->validator,
                    'home_page' => $this->home_page->first(),
                    'pertanyaans' => $this->pertanyaans->findAll(),
                    'kepentingan' => ['Sangat Tidak Penting', 'Tidak Penting', 'Cukup Penting', 'Penting', 'Sangat Penting'],
                    'kepuasan' => ['Sangat Tidak Puas', 'Tidak Puas', 'Cukup Puas', 'Puas', 'Sangat Puas'],
                ];

                $this->session->setFlashdata('error', '');
                return view('home', $datas);
            }
        }

        $this->customer->transBegin();
        try {
            $customer = [
                'NamaCustomer' => $this->request->getVar('nama'),
                'NamaPerusahaan' => $this->request->getVar('perusahaan'),
                'NoHpCustomer' => $this->request->getVar('nohp'),
                'LastTransaction' => date('Y-m-d'),
                'KategoriTransaction' => $this->request->getVar('kategori'),
                'saran' => $this->request->getVar('saran'),
            ];
            $this->customer->save($customer);
            $id = $this->customer->insertID();

            foreach ($pertanyaans as $pertanyaan) {
                $resultss = [
                    'customer_IdCustomer' => $id,
                    'pertanyaan_IdPertanyaan' => $pertanyaan->IdPertanyaan,
                    'Kepentingan' => $this->request->getVar($pertanyaan->IdPertanyaan . 'kepentingan'),
                    'Kepuasan' => $this->request->getVar($pertanyaan->IdPertanyaan . 'kepuasan'),
                ];
                $this->results->save($resultss);
            }

            $this->customer->transCommit();
            $this->session->setFlashdata("success", '');
            return redirect()->to('/');
        } catch (\Exception $e) {
            $this->customer->transRollback();
            $this->session->setFlashdata('error', '');
            return redirect()->to('/');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function loginproc()
    {
        $session = session();
        $Username = $this->request->getVar('Username');
        $password = $this->request->getVar('Password');
        $data = $this->users->where('Username', $Username)->first();
        if ($data) {
            $pass = $data->Password;
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'IdUser' => $data->IdUser,
                    'Username' => $data->Username,
                    'Role' => $data->Role,
                    'FullName' => $data->FullName,
                    'LastLogin' => $data->LastLogin,
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);


                if ($data->Role == 'customer') {
                    return redirect()->to('/');
                } else {
                    $da = [
                        'LastLogin' => date("Y-m-d h:i:sa"),
                    ];
                    $this->users->update($data->IdUser, $da);
                    return redirect()->to('/dashboard');
                }
            } else {
                $session->setFlashdata('message', 'Username atau Password Salah!');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('message', 'Username atau Password Salah!');
            return redirect()->to('/login');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function registerproc()
    {
        $rules = [
            'Username' => 'required',
            'Password' => 'required',
            'Role' => 'required',
            'FullName' => 'required',
        ];

        if (!$this->validate($rules)) {
            return view('register');
        }

        $data = [
            'Username' => trim($this->request->getVar('Username')),
            'Password' => password_hash($this->request->getVar('Password'), PASSWORD_BCRYPT),
            'Role' => trim($this->request->getVar('Role')),
            'FullName' => trim($this->request->getVar('FullName')),
        ];

        $this->users->save($data);
        session()->setFlashdata("suksess", 'Berhasil daftar.');
        return redirect()->to('/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
