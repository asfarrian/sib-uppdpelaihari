<?php
	class Login_model extends CI_Model
	{
	public function login($nip, $password)
    {
        $this->db->where('nip', $nip);
        $query = $this->db->get('tb_login');

        if ($query->num_rows() > 0) {
            $hash = $query->row('password');

            if (password_verify($password, $hash)) {
                foreach ($query->result() as $x) {
                    $sess = [
                        "id" => $x->id,
                        'nip' => $x->nip,
						"nama_pegawai" => $x->nama_pegawai,
						"jabatan" => $x->jabatan,
						"username" => $x->username,
                        'level_pengguna' => $x->level_pengguna,
                        "status" => "login",
					];
                }

                $this->session->set_userdata($sess);

                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('info', 'Nomor Induk Pegawai dan Password Anda Salah !');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('info', 'Nomor Induk Pegawai tidak terdaftar !');
            redirect('Login');
        }
    }

	}
