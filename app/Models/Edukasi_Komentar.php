<?php

namespace App\Models;

use CodeIgniter\Model;

class Edukasi_Komentar extends Model
{
    protected $table = 'edukasi_komentar';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_edukasi',
        'nama',
        'komentar'
    ];
    protected $returnType = 'object';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    # Create Data
    public function addData($data)
    {
        return $this->insert($data);
    }

    # Read Data
    public function getDataByIdPemutaran($id = FALSE)
    {
        if ($id == FALSE) {
            return $this->findAll();
        } else {
            return $this->where('id', $id)->find();
        }
    }

    public function getData($id = FALSE)
    {
        if ($id == FALSE) {
            return $this->findAll();
        } else {
            return $this->where('id_edukasi', $id)->findAll();
        }
    }

    # Update Data
    public function updateData($id, $data)
    {
        return $this->update($id, $data);
    }

    # Delete Data
    public function deleteData($id = FALSE, $id_akun_aktif = null)
    {
        if ($id == FALSE) {
            return $this->db->query("DELETE FROM edukasi_komentar");
        } else {
            return $this->delete($id);
        }
    }
}
