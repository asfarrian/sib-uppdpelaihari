<?php if($this->session->userdata('level_pengguna') == 'admin'): ?>
<!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
                        <a href="<?php echo base_url('users/tambah');?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Tambah User</a>
                    </div>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Table</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>NIP</th>
                         <th>Nama Pegawai</th>
                         <th>Jabatan</th>
                         <th>Tanggal Lahir</th>
                         <th>Level</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                <?php
					$no = 1;
					foreach($users as $data) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nip'] ?></td>
                        <td><?= $data['nama_pegawai'] ?></td>
                        <td><?= $data['jabatan'] ?></td>
                        <td><?= $data['tanggal_lahir'] ?></td>
                        <td><?= $data['level_pengguna'] ?></td>
                        <td>
                            <div class='btn-group'>
                            <a
                                href='<?= site_url("users/ubah/". $data['id_login']) ?>'
                                class='btn btn-warning'>Ubah</a>&nbsp;
                            <a
                                class='btn btn-danger'
                                href='<?= site_url("users/hapus/". $data['id_login']) ?>'
                                onclick="return confirm('Ingin menghapus data ini?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                 </tbody>
             </table>
         </div>
     </div>
 </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php endif ?>
