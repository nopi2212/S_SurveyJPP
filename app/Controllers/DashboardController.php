<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer;
use App\Models\HasilKuisioner;
use App\Models\Pertanyaan;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    protected $pel, $per, $has, $validation, $users;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->pel = new Customer();
        $this->per = new Pertanyaan();
        $this->has = new HasilKuisioner();
        $this->users = new User();
    }

    public function index()
    {
        $datas = [
            'current_page' => 'dashboard',
            'title' => 'Dashboard',
            'pelanggan' => $this->pel->findAll(),
            'pertanyaan' => $this->per->findAll(),
            'hasil_kuisioner' => $this->has->remove_duplicate(),
            'nilaiCSI' => $this->per->nilaiCSI(),
            'kriteriaCSI' => $this->per->kriteriaCSI(),
            'datasjasa' => $this->pel->where("DATE_FORMAT(LastTransaction,'%Y')", date('Y'))->where('KategoriTransaction', 'jasa')->orderBy("LastTransaction", "ASC")->findAll(),
            'datasproduk' => $this->pel->where("DATE_FORMAT(LastTransaction,'%Y')", date('Y'))->where('KategoriTransaction', 'produk')->orderBy("LastTransaction", "ASC")->findAll(),
            'resultSurveyTaskJasa' => $this->has->resultSurveyTask('jasa', date('Y')),
            'resultSurveyTaskProduk' => $this->has->resultSurveyTask('produk', date('Y')),
        ];
        return view('auth/dashboard', $datas);
    }

    public function change($id)
    {
        $datas = [
            'current_page' => 'rubah-password',
            'title' => 'Rubah Password',
            'validation' => $this->validation,
            'id' => $id,
        ];
        return view('auth/rubah-password', $datas);
    }

    public function updatechange()
    {
        $id = $this->request->getVar('id');
        $PasswordOld = $this->request->getVar('PasswordOld');
        $PasswordNew = $this->request->getVar('PasswordNew');

        $rules = [
            'id' => 'required',
            'PasswordOld' => 'required',
            'PasswordNew' => 'required',
        ];
        if (!$this->validate($rules)) {
            $datas = [
                'current_page' => 'rubah-password',
                'title' => 'Rubah Password',
                'validation' => $this->validation,
                'id' => $id,
            ];
            return view('auth/rubah-password', $datas);
        }

        $data = $this->users->where('IdUser', $id)->first();
        if ($data) {
            $pass = $data->Password;
            $verify_pass = password_verify($PasswordOld, $pass);
            if ($verify_pass) {
                $data = [
                    'Password' => password_hash($PasswordNew, PASSWORD_BCRYPT),
                ];
                $this->users->update($id, $data);
                session()->setFlashdata("message", 'Dirubah');
                return redirect()->to('/rubah-password/' . $id);
            }

            $datas = [
                'current_page' => 'rubah-password',
                'title' => 'Rubah Password',
                'validation' => $this->validation,
                'id' => $id,
            ];
            session()->setFlashdata("msg", 'Dirubah');
            return view('auth/rubah-password', $datas);
        }
    }
}
