<?php

namespace App\Models;

use CodeIgniter\Model;

class Faq extends Model
{
    protected $table = 'faq';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pertanyaan',
        'jawaban'
    ];
    protected $returnType = 'object';
}
