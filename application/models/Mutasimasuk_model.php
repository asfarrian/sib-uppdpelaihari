<?php
class Mutasimasuk_model extends CI_Model
{
    //Koneksi Database tb_mutasimasuk dengan join table tb_instansi, tb_inventaris, tb_intsansi dan tb_ruangan
	public function get_data($id_barangmasuk='')
    {
        if ($id_barangmasuk==''){

            $query = $this->db->select('tb_mutasimasuk.*, tb_inventaris.id_barang, tb_inventaris.nama_barang, 
                                        tb_inventaris.merk, tb_inventaris.ukuran, tb_instansi.nama_instansi,
                                        tb_inventaris.keterangan, tb_ruangan.nama_ruangan')
                                ->from('tb_mutasimasuk')
                                ->join('tb_instansi', 'tb_instansi.id_instansi = tb_mutasimasuk.id_instansi', 'left')
                                ->join('tb_inventaris', 'tb_inventaris.id_barang = tb_mutasimasuk.id_barang', 'left')
                                ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
                                ->get()->result_array();
            return $query;

        }else {

            $query = $this->db->select('tb_mutasimasuk.*, tb_inventaris.id_barang, tb_inventaris.nama_barang, 
                                        tb_inventaris.merk, tb_inventaris.ukuran, tb_instansi.nama_instansi,
                                        tb_inventaris.keterangan, tb_ruangan.nama_ruangan')
                                ->from('tb_mutasimasuk')
                                ->join('tb_instansi', 'tb_instansi.id_instansi = tb_mutasimasuk.id_instansi', 'left')
                                ->join('tb_inventaris', 'tb_inventaris.id_barang = tb_mutasimasuk.id_barang', 'left')
                                ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
                                ->where(['tb_mutasimasuk.id_barangmasuk' => $id_barangmasuk])
                                ->get()->row_array();
            return $query;
        }
    }

    public function get_data_byid($id){
        $query = $this->db->select(
                                    'tb_mutasimasuk.*,

                                    tb_inventaris.id_barang,
                                    tb_inventaris.id_ruangan,
                                    tb_inventaris.nama_barang,
                                    tb_inventaris.merk,
                                    tb_inventaris.ukuran,
                                    tb_inventaris.keterangan,
                                    tb_instansi.nama_instansi,
                                    tb_ruangan.nama_ruangan,
                                    tb_tahunanggaran.*')
                                ->from('tb_mutasimasuk')
                                ->join('tb_instansi', 'tb_instansi.id_instansi = tb_mutasimasuk.id_instansi', 'left')
                                ->join('tb_inventaris', 'tb_inventaris.id_barang = tb_mutasimasuk.id_barang', 'left')
                                ->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_inventaris.id_ruangan', 'left')
                                ->join('tb_tahunanggaran', 'tb_tahunanggaran.id_tahun = tb_mutasimasuk.id_tahun', 'left')
                                ->where(['tb_mutasimasuk.id_barangmasuk' => $id])
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
    public function insert_data(){
        $this->db->select('RIGHT(tb_mutasimasuk.id_barang,5) as id_barang', FALSE);
        $this->db->order_by('id_barang','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_mutasimasuk');
            if($query->num_rows() <> 0){      
                 $data = $query->row();
                 $kode = intval($data->id_barang) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "BM".$batas; 


        $data = [
            'id_barang'=>$kodetampil,
            'id_instansi'=> $this->input->post('id_instansi'),
            'id_tahun'=> $this->input->post('id_tahun')
        ];
        $this->db->insert("tb_mutasimasuk", $data);
        
        $data2 = [
            'id_barang'=>$kodetampil,
            'nama_barang'=> $this->input->post('nama_barang'),
            'merk'=> $this->input->post('merk'),
            'ukuran'=> $this->input->post('ukuran'),
            'status'=>'Unit Pelayanan Pendapatan Daerah Pelaihari',
            'id_ruangan'=> $this->input->post('id_ruangan')
        ];
        $this->db->insert("tb_inventaris", $data2);

        if($this->db->affected_rows()>0){
            $this->session->set_flashdata("pesan", "Data ruangan berhasil disimpan!");
        }
    }

    //Edit Data pada Mutasi Barang Masuk
    public function update_data($id_barangmasuk, $id_barang)
    {
        $dataMutasiMasuk = [
            'id_instansi'=> $this->input->post('id_instansi'),
            'id_tahun'=> $this->input->post('id_tahun')
        ];

        $dataInventaris = [
            'nama_barang'=> $this->input->post('nama_barang'),
            'merk'=> $this->input->post('merk'),
            'ukuran'=> $this->input->post('ukuran'),
            'id_ruangan'=> $this->input->post('id_ruangan')
        ];

        $this->db->update('tb_mutasimasuk', $dataMutasiMasuk, ['id_barangmasuk' => $id_barangmasuk]);
        $this->db->update('tb_inventaris', $dataInventaris, ['id_barang' => $id_barang]);
    }

    public function delete_data($id_barangmasuk, $id_barang)
    {
        $this->db->delete('tb_mutasimasuk', ['id_barangmasuk' => $id_barangmasuk]);
        $this->db->delete('tb_inventaris', ['id_barang' => $id_barang]);
    }
}