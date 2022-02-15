<?php
class Barangdimusnahkan_model extends CI_Model
{
	public function get_data($id_barang='')
    {
        if ($id_barang==''){
            // return $this->db->query("SELECT tb_inventaris.id_barang, tb_inventaris.kode_barang,tb_inventaris.nama_barang,tb_inventaris.merk,tb_inventaris.nomor_registrasi,tb_inventaris.ukuran,tb_inventaris.bahan,tb_inventaris.tahun_pembelian,tb_inventaris.asal_usul,tb_inventaris.kondisi,tb_inventaris.harga,tb_inventaris.keterangan,tb_ruangan.id_ruangan,tb_ruangan.nama_ruangan FROM tb_ruangan join tb_inventaris ON tb_ruangan.id_ruangan=tb_inventaris.id_ruangan")->result_array();

            $query = $this->db->select('tb_pemusnahan.*, tb_inventaris.id_barang, tb_inventaris.nama_barang, 
                                        tb_inventaris.*, tb_ruangan.nama_ruangan, tb_tahunanggaran.*')
                                ->from('tb_pemusnahan')
                                ->join('tb_inventaris', 'tb_inventaris.id_barang = tb_pemusnahan.id_barang', 'left')
                                ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
                                ->join('tb_tahunanggaran', 'tb_tahunanggaran.id_tahun = tb_pemusnahan.id_tahun', 'left')
                                ->get()->result_array();
            return $query;

        }else {
            // return $this->db->query("SELECT tb_inventaris.id_barang, tb_inventaris.kode_barang,tb_inventaris.nama_barang,tb_inventaris.merk,tb_inventaris.nomor_registrasi,tb_inventaris.ukuran,tb_inventaris.bahan,tb_inventaris.tahun_pembelian,tb_inventaris.asal_usul,tb_inventaris.kondisi,tb_inventaris.harga,tb_inventaris.keterangan,tb_ruangan.id_ruangan,tb_ruangan.nama_ruangan FROM tb_ruangan join tb_inventaris ON tb_ruangan.id_ruangan=tb_inventaris.id_ruangan where id_barang='$id_barang'")->row_array();

            $query = $this->db->select('tb_pemusnahan.*, tb_inventaris.id_barang, tb_inventaris.nama_barang, 
                                    tb_inventaris.*, tb_ruangan.nama_ruangan, tb_tahunanggaran.*')
                                ->from('tb_pemusnahan')
                                ->join('tb_inventaris', 'tb_inventaris.id_barang = tb_pemusnahan.id_barang', 'left')
                                ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
                                ->join('tb_tahunanggaran', 'tb_tahunanggaran.id_tahun = tb_pemusnahan.id_tahun', 'left')
                                ->where(['tb_inventaris.id_barang' => $id_barang])
                                ->get()->row_array();
            return $query;
        }
    }

    public function lihat_barangdimusnahkan_by_status($status)
    {
        $query = $this->db->select('tb_pemusnahan.*, tb_inventaris.*, tb_ruangan.*')
                            ->from('tb_pemusnahan')
                            ->join('tb_inventaris', 'tb_inventaris.id_barang = tb_pemusnahan.id_barang', 'left')
                            ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
                            ->where(['tb_inventaris.status' => $status])
                            ->get()->result_array();

        return $query;
    }

    public function cari($id_tahun)
    {
        $query = $this->db->select('tb_pemusnahan.*, tb_inventaris.id_barang, tb_inventaris.nama_barang, 
                                    tb_inventaris.*, tb_ruangan.nama_ruangan, tb_tahunanggaran.*')
        ->from('tb_pemusnahan')
        ->join('tb_inventaris', 'tb_inventaris.id_barang = tb_pemusnahan.id_barang', 'left')
        ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
        ->join('tb_tahunanggaran', 'tb_tahunanggaran.id_tahun = tb_pemusnahan.id_tahun', 'left')
            ->where(['tb_pemusnahan.id_tahun' => $id_tahun])
            ->get()->result_array();

        return $query;
    }

    public function update_data($id){
        $data = ['cara_pemusnahan'=> $this->input->post('cara_pemusnahan'),
                'id_tahun'=> $this->input->post('id_tahun')
                ];
		$this->db->where('id_barang', $id);
		$this->db->update('tb_pemusnahan', $data);
	}


}
