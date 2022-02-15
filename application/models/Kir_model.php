<?php
class Kir_model extends CI_Model
{
	public function lihat_kir($id_barang='')
    {
        if ($id_barang==''){
            return $this->db->query("SELECT tb_inventaris.id_barang, tb_inventaris.kode_barang,tb_inventaris.nama_barang,tb_inventaris.merk,tb_inventaris.nomor_registrasi,tb_inventaris.ukuran,tb_inventaris.bahan,tb_inventaris.tahun_pembelian,tb_inventaris.asal_usul,tb_inventaris.kondisi,tb_inventaris.harga,tb_inventaris.keterangan,tb_ruangan.id_ruangan,tb_ruangan.nama_ruangan FROM tb_ruangan join tb_inventaris ON tb_ruangan.id_ruangan=tb_inventaris.id_ruangan")->result_array();
        }else {
            return $this->db->query("SELECT tb_inventaris.id_barang, tb_inventaris.kode_barang,tb_inventaris.nama_barang,tb_inventaris.merk,tb_inventaris.nomor_registrasi,tb_inventaris.ukuran,tb_inventaris.bahan,tb_inventaris.tahun_pembelian,tb_inventaris.asal_usul,tb_inventaris.kondisi,tb_inventaris.harga,tb_inventaris.keterangan,tb_ruangan.id_ruangan,tb_ruangan.nama_ruangan FROM tb_ruangan join tb_inventaris ON tb_ruangan.id_ruangan=tb_inventaris.id_ruangan where id_barang='$id_barang'")->row_array();
        }
    }

	public function get_lihat_kir($id_barang='')
    {
        if ($id_barang==''){
            return $this->db->query("SELECT tb_inventaris.id_barang, tb_inventaris.kode_barang,tb_inventaris.nama_barang,tb_inventaris.merk,tb_inventaris.nomor_registrasi,tb_inventaris.ukuran,tb_inventaris.bahan,tb_inventaris.tahun_pembelian,tb_inventaris.asal_usul,tb_inventaris.kondisi,tb_inventaris.harga,tb_inventaris.keterangan,tb_ruangan.id_ruangan,tb_ruangan.nama_ruangan FROM tb_ruangan join tb_inventaris ON tb_ruangan.id_ruangan=tb_inventaris.id_ruangan")->result_array();
        }else {
            return $this->db->query("SELECT tb_inventaris.id_barang, tb_inventaris.kode_barang,tb_inventaris.nama_barang,tb_inventaris.merk,tb_inventaris.nomor_registrasi,tb_inventaris.ukuran,tb_inventaris.bahan,tb_inventaris.tahun_pembelian,tb_inventaris.asal_usul,tb_inventaris.kondisi,tb_inventaris.harga,tb_inventaris.keterangan,tb_ruangan.id_ruangan,tb_ruangan.nama_ruangan FROM tb_ruangan join tb_inventaris ON tb_ruangan.id_ruangan=tb_inventaris.id_ruangan where id_barang='$id_barang'")->row_array();
        }
    }

    public function get_data_byid($id_barang){
        $query = $this->db->select(
                                    'tb_inventaris.*,
                                    tb_ruangan.nama_ruangan,')
                                ->from('tb_inventaris')
                                ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
                                ->where(['tb_inventaris.id_barang' => $id_barang])
                                ->get()->row_array(); //->row_array() memanggil 1 data dengan array, cara panggil $namaVariable['nama_kolom_tabel']
            return $query;
    }

    public function update_data($id_barang)
    {
        $dataInventaris = [
            'id_ruangan'=> $this->input->post('id_ruangan')
        ];

        $this->db->update('tb_inventaris', $dataInventaris, ['id_barang' => $id_barang]);

        if($this->db->affected_rows() > 0)
            $this->session->set_flashdata("pesan", "Data barang berhasil diperbaharui!");
    }

    public function cari($id_ruangan, $group_by = [])
    {
        $query = $this->db
            ->select('tb_inventaris.*, tb_ruangan.nama_ruangan')
            ->from('tb_inventaris')
            ->join('tb_ruangan', ' tb_inventaris.id_ruangan = tb_ruangan.id_ruangan', 'left')
            ->where([
                'tb_inventaris.id_ruangan' => $id_ruangan
            ])->get()->result_array();

        return $query;
    }

}
