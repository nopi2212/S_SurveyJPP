<?php

namespace App\Models;

use CodeIgniter\Model;

class Customer extends Model
{
    protected $table            = 'customers';
    protected $primaryKey       = 'IdCustomer';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'IdCustomer', 'NamaCustomer', 'NamaPerusahaan', 'NoHpCustomer', 'LastTransaction', 'KategoriTransaction', 'Saran'
    ];

    function customersWithResultSurvey()
    {
        return $this->db->table('customers')
            ->join('hasilkuisioners', 'hasilkuisioners.customer_IdCustomer=customers.IdCustomer')
            ->join('pertanyaans', 'pertanyaans.IdPertanyaan=hasilkuisioners.pertanyaan_IdPertanyaan')
            ->get()
            ->getResultObject();
    }
}
