<?php
class Users_model extends CI_Model
{
    //Koneksi Database tb_mutasimasuk dengan join table tb_instansi, tb_inventaris, tb_intsansi dan tb_ruangan
	public function get_data($id_barangmasuk='')
    {
        if ($id_barangmasuk==''){

            $query = $this->db->select('tb_login.*')
                                ->from('tb_login')
                                ->get()->result_array();
            return $query;

        }else {

            $query = $this->db->select('tb_login.*')
                                ->from('tb_login')
                                ->get()->row_array();
            return $query;
        }
    }

    public function get_data_byid($id){
        $query =$this->db->select('tb_login.*')
                                ->from('tb_login')
                                ->where(['tb_login.id_login' => $id])
                                ->get()->row_array(); //->row_array() memanggil 1 data dengan array, cara panggil $namaVariable['nama_kolom_tabel']
            return $query;
    }

   
    public function cari($id_tahun)
    {
        $query = $this->db->select('tb_mutasimasuk.*, tb_inventaris.id_barang, tb_inventaris.nama_barang, 
        tb_inventaris.merk, tb_inventaris.ukuran, tb_instansi.nama_instansi,
        tb_inventaris.keterangan, tb_ruangan.nama_ruangan, tb_tahunanggaran.*')
        ->from('tb_mutasimasuk')
        ->join('tb_instansi', 'tb_instansi.id_instansi = tb_mutasimasuk.id_instansi', 'left')
        ->join('tb_inventaris', 'tb_inventaris.id_barang = tb_mutasimasuk.id_barang', 'left')
        ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
        ->join('tb_tahunanggaran', 'tb_tahunanggaran.id_tahun = tb_mutasimasuk.id_tahun', 'left')
            ->where(['tb_mutasimasuk.id_tahun' => $id_tahun])
            ->get()->result_array();

        return $query;
    }

    //Tambah Data Mutasi Barang Masuk ke Dalam Kantor UPPD Pelaihari
    public function insert_data() { 
        $nip = $this->input->post("nip", true); 
        $nama_pegawai = $this->input->post("nama", true); 
        $jabatan = $this->input->post("jabatan", true); 
        $tanggal_lahir = $this->input->post("tanggal_lahir", true); 
        $level_pengguna = $this->input->post("level", true); 
        $password = $this->input->post("tanggal_lahir", true); 
        $data = [ "nip"=> $nip, 
                  "password"=> password_hash($password, PASSWORD_BCRYPT),
                  "nama_pegawai"=> $nama_pegawai,
                  "jabatan"=> $jabatan,
                  "tanggal_lahir"=> $tanggal_lahir,
                  "level_pengguna"=> $level_pengguna, 
                ]; 
        $this->db->insert('tb_login', $data); }

    //Edit Data pada Mutasi Barang Masuk
    public function update_data($id)
    {
        $nip = $this->input->post("nip", true); 
        $nama_pegawai = $this->input->post("nama", true); 
        $jabatan = $this->input->post("jabatan", true); 
        $tanggal_lahir = $this->input->post("tanggal_lahir", true); 
        $level_pengguna = $this->input->post("level", true); 
        $password = $this->input->post("tanggal_lahir", true); 
        $data = [ "nip"=> $nip, 
                  "password"=> password_hash($password, PASSWORD_BCRYPT),
                  "nama_pegawai"=> $nama_pegawai,
                  "jabatan"=> $jabatan,
                  "tanggal_lahir"=> $tanggal_lahir,
                  "level_pengguna"=> $level_pengguna, 
                ]; 
        $this->db->update('tb_login', $data, ['id_login' => $id]); }

    public function delete_data($id_login)
    {
        $this->db->delete('tb_login', ['id_login' => $id_login]);
    }
}