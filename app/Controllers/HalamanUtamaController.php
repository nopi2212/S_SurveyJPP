<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HomePage;
use CodeIgniter\HTTP\ResponseInterface;

class HalamanUtamaController extends BaseController
{
    protected $home_page, $validation;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->home_page = new HomePage();
    }

    public function index()
    {
        $datas = [
            'current_page' => 'halaman-utama',
            'title' => 'Halaman Utama',
            'home_page' => $this->home_page->first(),
            'validation' => $this->validation,
        ];

        return view('auth/halaman-utama/index', $datas);
    }

    public function save()
    {
        $IdHomePage = $this->request->getVar('IdHomePage');
        $ImageHead = $this->request->getFile('ImageHead');
        $AboutImage = $this->request->getFile('AboutImage');
        $Katalog = $this->request->getFile('Katalog');

        $newNameImageHead = '';
        $newNameAboutImage = '';
        $newNameKatalog = '';

        if ($IdHomePage) {
            $data = $this->home_page->where('IdHomePage', $IdHomePage)->first();
            $newNameImageHead = $data->ImageHead;
            $newNameAboutImage = $data->AboutImage;
            $newNameKatalog = $data->Katalog;
        }

        $rules = [
            'Head' => 'required',
            'SubHead' => 'required',
            'ImageHead' => 'max_size[ImageHead,5120]|ext_in[ImageHead,jpg,jpeg,png,svg]',
            'About' => 'required',
            'AboutImage' => 'max_size[AboutImage,5120]|ext_in[AboutImage,jpg,jpeg,png,svg]',
            'Email' => 'required|valid_email',
            'Instagram' => 'required',
            'Katalog' => 'ext_in[Katalog,pdf]',
        ];

        /* Validation Unsuccess */
        if (!$this->validate($rules)) {
            $datas = [
                'validation' => $this->validator,
                'current_page' => 'halaman-utama',
                'title' => 'Halaman Utama',
                'home_page' => $this->home_page->first(),
            ];
            return view('auth/halaman-utama/index', $datas);
        }

        /* Upload ImageHead */
        if ($ImageHead) {
            if ($ImageHead->isValid() && !$ImageHead->hasMoved()) {
                /* Get Random File Name */
                $newNameImageHead = $ImageHead->getRandomName();
                /* Store File In Public Folder */
                $ImageHead->move('../public/home_page/', $newNameImageHead);
            }
        }

        /* Upload AboutImage */
        if ($AboutImage) {
            if ($AboutImage->isValid() && !$AboutImage->hasMoved()) {
                /* Get Random File Name */
                $newNameAboutImage = $AboutImage->getRandomName();
                /* Store File In Public Folder */
                $AboutImage->move('../public/home_page/', $newNameAboutImage);
            }
        }

        /* Upload Katalog */
        if ($Katalog) {
            if ($Katalog->isValid() && !$Katalog->hasMoved()) {
                /* Get Random File Name */
                $newNameKatalog = $Katalog->getRandomName();
                /* Store File In Public Folder */
                $Katalog->move('../public/home_page/', $newNameKatalog);
            }
        }

        $data = [
            'Head' => $this->request->getVar('Head'),
            'SubHead' => $this->request->getVar('SubHead'),
            'ImageHead' => $newNameImageHead,
            'About' => $this->request->getVar('About'),
            'AboutImage' => $newNameAboutImage,
            'Email' => $this->request->getVar('Email'),
            'Instagram' => $this->request->getVar('Instagram'),
            'Katalog' => $newNameKatalog,
        ];

        if ($IdHomePage) {
            $this->home_page->update($IdHomePage, $data);
        } else {
            $this->home_page->save($data);
        }
        session()->setFlashdata("message", 'Disimpan');
        return redirect()->to('/halaman-utama');
    }
}
