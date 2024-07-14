<?php

namespace App\Models;

use CodeIgniter\Model;

class Pertanyaan extends Model
{
    protected $table            = 'pertanyaans';
    protected $primaryKey       = 'IdPertanyaan';
    protected $useAutoIncrement = false;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'IdPertanyaan', 'NamaPertanyaan'
    ];

    public function nilaiCSI()
    {
        return [
            '81% - 100%', '66% - 80.99%', '51% - 65.99%', '35% - 50.99%', '0 - 34.99%'
        ];
    }

    public function kriteriaCSI()
    {
        return [
            'Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas'
        ];
    }
}
