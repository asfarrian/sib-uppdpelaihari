<?php
class Dashboard_model extends CI_Model
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

    public function lihat_dashboard_by_status($status)
    {
        $query = $this->db->select('*')
                            ->from('tb_inventaris')
                            ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
                            ->where(['tb_inventaris.status' => $status])
                            ->get()->result_array();

        return $query;
    }

    public function lihat_dashboard_by_tahun($tahun)
    {
        $query = $this->db->select('*')
                            ->from('tb_inventaris')
                            ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
                            ->where(['tb_inventaris.tahun_pembelian' => $tahun])
                            ->get()->result_array();

        return $query;
    }

    public function update_data($id_barang){
        $dataInventaris = [
            'kode_barang'=> $this->input->post('kode_barang'),
            'nama_barang'=> $this->input->post('nama_barang'),
            'merk'=> $this->input->post('merk'),
            'nomor_registrasi'=> $this->input->post('nomor_registrasi'),
            'ukuran'=> $this->input->post('ukuran'),
            'bahan'=> $this->input->post('bahan'),
            'tahun_pembelian'=> $this->input->post('tahun_pembelian'),
            'asal_usul'=> $this->input->post('asal_usul'),
            'kondisi'=> $this->input->post('kondisi'),
            'harga'=> $this->input->post('harga'),
            'keterangan'=> $this->input->post('keterangan'),
            'id_ruangan'=> $this->input->post('ruangan')
        ];
        $this->db->update('tb_inventaris', $dataInventaris, ['id_barang' => $id_barang]);
    }

    public function move_Data($id_barang)
    {
        $dataMutasikeluar = [
            'id_barang'=> $id_barang,
            'id_instansi'=> $this->input->post('id_instansi'),
            'id_tahun'=> $this->input->post('id_tahun')
            ];
            $this->db->insert("tb_mutasikeluar", $dataMutasikeluar);
            
        $dataInventaris = [
            'status'=>'Mutasi Barang Keluar'
            ];
            $this->db->update('tb_inventaris', $dataInventaris, ['id_barang' => $id_barang]);
        }

}
