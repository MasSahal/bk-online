<?php

namespace App\Models;

use CodeIgniter\Model;

class Edukasi extends Model
{
    protected $table = 'edukasi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_pemutaran',
        'author',
        'judul',
        'link_video',
        'deskripsi'
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
    public function getData($id_pemutaran = FALSE)
    {
        if ($id_pemutaran == FALSE) {
            return $this->findAll();
        } else {
            return $this->where('id_pemutaran', $id_pemutaran)->first();
        }
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
