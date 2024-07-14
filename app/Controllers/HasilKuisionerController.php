<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer;
use App\Models\HasilKuisioner;
use App\Models\Pertanyaan;
use Dompdf\Dompdf;

class HasilKuisionerController extends BaseController
{
    // hasil-kuisioner
    protected $validation, $datas, $customers, $hasilkuisioners, $pertanyaans;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->customers = new Customer();
        $this->hasilkuisioners = new HasilKuisioner();
        $this->pertanyaans = new Pertanyaan();
        $this->datas = [
            'current_page' => 'hasil-kuisioner',
            'title' => 'Hasil Kuisioner',
            'customers' => $this->customers->findAll(),
            'hasilkuisioners' => $this->hasilkuisioners->findAll(),
            'pertanyaans' => $this->pertanyaans->findAll(),
            'validation' => $this->validation,
        ];
    }

    public function index()
    {
        return view('auth/hasil-kuisioner/index', $this->datas);
    }

    public function filter()
    {
        $kategori = $this->request->getVar('kategori');
        $tahun = $this->request->getVar('tahun');

        try {
            $data = [
                'success' => true,
                'data' => $this->customers->where("DATE_FORMAT(LastTransaction,'%Y')", $tahun)->where('KategoriTransaction', $kategori)->findAll(),
                'kategori' => $kategori,
                'tahun' => $tahun,
            ];

            return $this->response->setJSON($data);
        } catch (\Exception $e) {
            return $this->response->setJSON($e->getMessage());
        }
    }

    public function show($kategori, $tahun)
    {
        $data = [
            'current_page' => 'hasil-kuisioner',
            'title' => 'Hasil Kuisioner',

            'hasilkuisioners' => $this->hasilkuisioners->findAll(),
            'resultSurveyTask' => $this->hasilkuisioners->resultSurveyTask($kategori, $tahun),
            'pertanyaans' => $this->pertanyaans->findAll(),
            'validation' => $this->validation,
            'datas' => $this->customers->where("DATE_FORMAT(LastTransaction,'%Y')", $tahun)->where('KategoriTransaction', $kategori)->orderBy("LastTransaction", "ASC")->findAll(),
            'kategori' => $kategori,
            'tahun' => $tahun,
            'nilaiCSI' => $this->pertanyaans->nilaiCSI(),
            'kriteriaCSI' => $this->pertanyaans->kriteriaCSI(),
        ];

        return view('auth/hasil-kuisioner/filter', $data);
    }

    public function print()
    {
        $kategori = $this->request->getVar('kategori');
        $tahun = $this->request->getVar('tahun');
        $filename = 'Hasil_Perhitungan_Kuisioner_Kategori_' . ucwords($kategori) . '_Tahun_' . $tahun;
        $data = [
            'current_page' => 'hasil-kuisioner',
            'title' => 'Hasil Kuisioner',
            'hasilkuisioners' => $this->hasilkuisioners->findAll(),
            'resultSurveyTask' => $this->hasilkuisioners->resultSurveyTask($kategori, $tahun),
            'pertanyaans' => $this->pertanyaans->findAll(),
            'validation' => $this->validation,
            'datas' => $this->customers->where("DATE_FORMAT(LastTransaction,'%Y')", $tahun)->where('KategoriTransaction', $kategori)->orderBy("LastTransaction", "ASC")->findAll(),
            'kategori' => $kategori,
            'tahun' => $tahun,
            'nilaiCSI' => $this->pertanyaans->nilaiCSI(),
            'kriteriaCSI' => $this->pertanyaans->kriteriaCSI(),
        ];

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('auth/hasil-kuisioner/pdf_view', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
    }
}
