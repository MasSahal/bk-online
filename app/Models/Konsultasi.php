<?php

namespace App\Models;

use CodeIgniter\Model;

class Konsultasi extends Model
{
    protected $table = 'konsultasi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nis_siswa',
        'nama',
        'subjek',
        'lampiran',
        'deskripsi'
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
            return $this->where('id_pemutaran', $id)->first();
        }
    }

    public function getDataByDateName($tgl_awal, $tgl_akhir, $nama)
    {
        $query = "SELECT * FROM $this->table WHERE created_at >='$tgl_awal' AND created_at <='$tgl_akhir' AND nama='$nama' ORDER BY created_at ASC";
        $data = $this->db->query($query)->getResultObject();
        return $data;
    }

    public function getDataByDate($tgl_awal, $tgl_akhir)
    {
        $query = "SELECT * FROM $this->table WHERE created_at >='$tgl_awal' AND created_at <='$tgl_akhir' ORDER BY created_at ASC";
        $data = $this->db->query($query)->getResultObject();
        return $data;
    }

    public function getDataByName($nama)
    {
        return $this->where('nama', $nama)->orderBy('created_at', 'ASC')->find();
    }

    # Update Data
    public function updateData($id, $data)
    {
        return $this->update($id, $data);
    }

    # Delete Data berdasarkan id pemutaran
    public function deleteData($id = FALSE)
    {
        if ($id == FALSE) {
            return $this->db->query("DELETE FROM konsultasi");
        } else {
            return $this->delete($id);
        }
    }
}
