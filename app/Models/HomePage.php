<?php

namespace App\Models;

use CodeIgniter\Model;

class HomePage extends Model
{
    protected $table            = 'homepage';
    protected $primaryKey       = 'IdHomePage';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'IdHomePage', 'Head', 'SubHead', 'ImageHead', 'About', 'AboutImage', 'Email', 'Instagram', 'Katalog'
    ];
}
