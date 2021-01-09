<?php

namespace App\Models;

use CodeIgniter\Model;

class Kunjungan extends Model
{
    protected $table = 'kunjungan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama',
        'tujuan',
        'catatan'
    ];
    protected $returnType = 'object';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = false;

    # Create Data
    public function addData($data)
    {
        return $this->insert($data);
    }

    # Read Data
    public function getData($id = FALSE)
    {
        if ($id == FALSE) {
            return $this->findAll();
        } else {
            return $this->where('id', $id)->first();
        }
    }

    public function getDataToday()
    {
        return $this->where('created_at', date('Y-m-d'))->countAll();
    }

    # Update Data
    public function updateData($id, $data)
    {
        return $this->update($id, $data);
    }

    # Delete Data
    public function deleteData($id = FALSE)
    {
        if ($id == FALSE) {
            return $this->db->query("DELETE FROM admin");
        } else {
            return $this->delete($id);
        }
    }
}
