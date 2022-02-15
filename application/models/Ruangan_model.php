<?php
	class Ruangan_model extends CI_Model{
		public function get_data(){
			$query = "select *, (select count(*) from tb_inventaris where tb_inventaris.id_ruangan = tb_ruangan.id_ruangan) as jumlah from tb_ruangan";
			return $this->db->query($query)->result();
		}

		public function get_data_byid($id){
			return $this->db->get_where("tb_ruangan", array('id_ruangan'=>$id))->row();
		}

		public function insert_data(){
			$data = [
                'nama_ruangan'=> $this->input->post('nama')
			];
			$this->db->insert("tb_ruangan", $data);
		}

		public function delete_data($id){
			$this->db->where('id_ruangan', $id);
			$this->db->delete('tb_ruangan');
		}

		public function update_data($id){
			$data = ['nama_ruangan'=> $this->input->post('nama')];
			$this->db->where('id_ruangan', $id);
			$this->db->update('tb_ruangan', $data);
		}

		public function get_data_by_id($id)
		{
			$query = "select * from tb_ruangan where id_ruangan = $id";
			return $this->db->query($query)->row();
		}

	}
