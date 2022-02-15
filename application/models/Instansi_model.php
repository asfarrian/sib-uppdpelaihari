<?php
	class Instansi_model extends CI_Model{
		public function get_data(){
			return $this->db->get("tb_instansi")->result();
		}

		public function get_data_byid($id){
			return $this->db->get_where("tb_instansi", array('id_instansi'=>$id))->row();
		}

		public function insert_data(){
			$data = [
                'nama_instansi'=> $this->input->post('nama')
			];
			$this->db->insert("tb_instansi", $data);
		}

		public function delete_data($id){
			$this->db->where('id_instansi', $id);
			$this->db->delete('tb_instansi');
		}

		public function update_data($id){
			$data = ['nama_instansi'=> $this->input->post('nama')];
			$this->db->where('id_instansi', $id);
			$this->db->update('tb_instansi', $data);
		}


	}
