<?php
class Barangrusak_model extends CI_Model
{
	public function get_data($id_barang='')
    {
        if ($id_barang==''){
            // return $this->db->query("SELECT tb_inventaris.id_barang, tb_inventaris.kode_barang,tb_inventaris.nama_barang,tb_inventaris.merk,tb_inventaris.nomor_registrasi,tb_inventaris.ukuran,tb_inventaris.bahan,tb_inventaris.tahun_pembelian,tb_inventaris.asal_usul,tb_inventaris.kondisi,tb_inventaris.harga,tb_inventaris.keterangan,tb_ruangan.id_ruangan,tb_ruangan.nama_ruangan FROM tb_ruangan join tb_inventaris ON tb_ruangan.id_ruangan=tb_inventaris.id_ruangan")->result_array();

            $query = $this->db->select('tb_inventaris.*, tb_ruangan.nama_ruangan')
                                ->from('tb_inventaris')
                                ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
                                ->get()->result_array();
            return $query;

        }else {
            // return $this->db->query("SELECT tb_inventaris.id_barang, tb_inventaris.kode_barang,tb_inventaris.nama_barang,tb_inventaris.merk,tb_inventaris.nomor_registrasi,tb_inventaris.ukuran,tb_inventaris.bahan,tb_inventaris.tahun_pembelian,tb_inventaris.asal_usul,tb_inventaris.kondisi,tb_inventaris.harga,tb_inventaris.keterangan,tb_ruangan.id_ruangan,tb_ruangan.nama_ruangan FROM tb_ruangan join tb_inventaris ON tb_ruangan.id_ruangan=tb_inventaris.id_ruangan where id_barang='$id_barang'")->row_array();

            $query = $this->db->select('tb_inventaris.*, tb_ruangan.nama_ruangan')
                                ->from('tb_inventaris')
                                ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
                                ->where(['tb_inventaris.id_barang' => $id_barang])
                                ->get()->row_array();
            return $query;
        }
    }


    public function lihat_barangrusak_by_kondisi($kondisi, $status)
    {
        $query = $this->db->select('*')
                            ->from('tb_inventaris')
                            ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
                            ->where(['tb_inventaris.kondisi' => $kondisi])
                            ->where(['tb_inventaris.status' => $status])
                            ->get()->result_array();

        return $query;
    }

    public function get_data_byid($id_barang){
        return $this->db->get_where("tb_inventaris", array('id_barang'=>$id_barang))->row(); //->row_array() memanggil 1 data dengan array, cara panggil $namaVariable['nama_kolom_tabel']

    }


    public function update_data($id){
        $data = ['kondisi'=> $this->input->post('kondisi')];
		$this->db->where('id_barang', $id);
		$this->db->update('tb_inventaris', $data);
	}

    public function delete_data($id_barang)
    {
        $dataInventaris = [
            'status'=>'Usul Pemusnahan'
        ];
        $this->db->update('tb_inventaris', $dataInventaris, ['id_barang' => $id_barang]);
    }


}