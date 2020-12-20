<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kode_admin',
        'nama',
        'email',
        'password',
        'jenis_kelamin',
        'alamat'
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
    public function getData($id = FALSE)
    {
        if ($id == FALSE) {
            return $this->findAll();
        } else {
            return $this->where('id', $id)->first();
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
            return $this->db->query("DELETE FROM admin WHERE id != $id_akun_aktif");
        } else {
            return $this->delete($id);
        }
    }
    # Update Password
    public function updatePass($id, $data)
    {
        return $this->update($id, $data);
    }
}
