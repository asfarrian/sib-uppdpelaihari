<?php
	class Tahunanggaran_model extends CI_Model{
		public function get_data(){
			return $this->db->get("tb_tahunanggaran")->result();
		}

		public function get_data_byid($id){
			return $this->db->get_where("tb_tahunanggaran", array('id_tahun'=>$id))->row();
		}

		public function insert_data(){
			$data = [
                'nama_tahun'=> $this->input->post('nama_tahun')
			];
			$this->db->insert("tb_tahunanggaran", $data);
		}

		public function delete_data($id){
			$this->db->where('id_tahun', $id);
			$this->db->delete('tb_tahunanggaran');
		}

		public function update_data($id){
			$data = ['nama_tahun'=> $this->input->post('nama')];
			$this->db->where('id_tahun', $id);
			$this->db->update('tb_tahunanggaran', $data);
		}


	}
