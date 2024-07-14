<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilKuisioner extends Model
{
    protected $table            = 'hasilkuisioners';
    protected $primaryKey       = 'IdKuesionerHasil';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'IdKuesionerHasil', 'customer_IdCustomer', 'pertanyaan_IdPertanyaan', 'Kepentingan', 'Kepuasan'
    ];

    function remove_duplicate()
    {
        $query   = $this->db->query('SELECT DISTINCT customer_IdCustomer FROM hasilkuisioners');
        $results = $query->getResult();
        return $results;
    }

    function resultSurveyTask($kategori, $tahun)
    {
        return $this->db->table('hasilkuisioners')
            ->join('pertanyaans', 'pertanyaans.IdPertanyaan=hasilkuisioners.pertanyaan_IdPertanyaan')
            ->join('customers', 'customers.IdCustomer=hasilkuisioners.customer_IdCustomer')
            ->orderBy('pertanyaans.IdPertanyaan', 'ASC')
            ->where("DATE_FORMAT(LastTransaction,'%Y')", $tahun)
            ->where('KategoriTransaction', $kategori)
            ->get()
            ->getResultObject();
    }
}
