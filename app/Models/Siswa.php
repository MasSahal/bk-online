<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nis',
        'nama',
        'poin_pelanggaran',
        'email',
        'password',
        'kelas',
        'jurusan',
        'jenis_kelamin',
        'alamat',
        'date_created'
    ];
    protected $returnType = 'object';

    public function addData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function getData($id = FALSE)
    {
        if ($id == FALSE) {

            $deleteAll = $this->koneksi->delete();
            if ($deleteAll) {

                $this->session->setFlashdata("msg_suc", "Berhasil membersihkan data profile siswa !");
                return redirect()->to(previous_url());
            } else {
                $this->session->setFlashdata("msg_err", "Gagal membersihkan data profile siswa !");
                return redirect()->to(previous_url());
            }
        } else {

            $delete = $this->table()->where('id', $id)->delete();

            if ($delete) {
                $this->session->setFlashdata("msg_suc", "Profile siswa telah dihapus !");
                return redirect()->to(previous_url());
            } else {
                $this->session->setFlashdata("msg_err", "Profile siswa gagal dihapus !");
                return redirect()->to(previous_url());
            }
        }
    }

    public function updateData($id, $data)
    {
        $edit = $this->siswaModel->update($id, $data);
        if ($edit) {
            $this->session->setFlashdata('msg_suc', 'Memperbarui siswa berhasil !');
            return redirect()->to(previous_url());
        } else {
            $this->session->setFlashdata('msg_err', 'Gagal Memperbarui, Silahkan coba lagi atau hubungi Admin !');
            return redirect()->to(previous_url());
        }
    }

    public function deleteData($id = FALSE)
    {
        if ($id == FALSE) {

            $deleteAll = $this->table->query("DELETE FROM siswa");
            if ($deleteAll) {

                $this->session->setFlashdata("msg_suc", "Berhasil membersihkan data profile siswa !");
                return redirect()->to(previous_url());
            } else {
                $this->session->setFlashdata("msg_err", "Gagal membersihkan data profile siswa !");
                return redirect()->to(previous_url());
            }
        } else {

            $delete = $this->table()->where('id', $id)->delete();

            if ($delete) {
                $this->session->setFlashdata("msg_suc", "Profile siswa telah dihapus !");
                return redirect()->to(previous_url());
            } else {
                $this->session->setFlashdata("msg_err", "Profile siswa gagal dihapus !");
                return redirect()->to(previous_url());
            }
        }
    }
}
