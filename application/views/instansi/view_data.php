               <!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Instansi</h1>
                        <?php if($this->session->userdata('level_pengguna') == 'admin'): ?>
                        <a href="<?php echo base_url('instansi/tambah');?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i>Tambah Instansi</a>
                        <?php endif ?>
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
                         <th>Nama Instansi</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                <?php
					$no = 1;
					foreach($instansi as $row) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama_instansi ?></td>
                        <td>
                        <?php if($this->session->userdata('level_pengguna') == 'admin'): ?>
                            <div class='btn-group'>
                                
                                <a
                                    href="<?= site_url('instansi/ubah/'.$row->id_instansi) ?>"
                                    class="btn btn-warning">&nbsp; Edit &nbsp;</a> &nbsp;
                                <a
                                    href="<?= site_url('instansi/hapus/'.$row->id_instansi) ?>"
						            class='btn btn-danger'
                                    onclick="return confirm('Ingin menghapus data ini?')">Hapus</a>
                            </div>
                        <?php endif ?>
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
