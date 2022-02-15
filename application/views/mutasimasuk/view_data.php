               <!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Mutasi Barang Masuk</h1>
                        <?php if($this->session->userdata('level_pengguna') == 'admin'): ?>
                        <a href="<?= base_url('mutasimasuk/tambah');?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Tambah Barang Masuk</a>
                         <?php endif ?>
                    </div>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-dark">Tahun Anggaran</h6>
     </div>
     <div class="card-body">
     <div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-body">
                    <form action="<?= site_url("mutasimasuk") ?>" method="get" class="mt-3">
							<div class="form-group">
								<label for="nama">Tahun</label>
								<select name="id_tahun" required class="form-control">
									<option value="">--Pilih Tahun Anggaran--</option>
									<?php foreach($tahunanggaran as $row) { ?>
                                        <option
                                            value="<?= $row->id_tahun ?>"
                                            <?php
                                                if(isset($selected_mutasi_masuk)) {
                                                    if($selected_mutasi_masuk == $row->id_tahun) {
                                                        echo "selected";
                                                    }
                                                }
                                            ?>>
                                            <?= $row->nama_tahun ?></option>
									<?php } ?>
								</select>
							</div>
                        <input type="submit" class="btn btn-secondary" value="Cari">
                        </form>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <?php if(isset($selected_mutasi_masuk)) { ?>
                            <a
                                href="<?= site_url("Mutasimasuk/laporan_pdf/". $selected_mutasi_masuk) ?>"
                                target="_blank"
                                class="btn btn-info mt-3">Cetak PDF</a>
                        <?php } ?>
        </div>
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
                         <th>ID Barang</th>
                         <th>Nama Barang</th>
                         <th>Merk</th>
                         <th>Ukuran</th>
                         <th>Barang Dari</th>
                         <th>Tahun Anggaran</th>
                         <th>Keterangan</th>
                         <th>Ruangan</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                <?php
					$no = 1;
					foreach($mutasimasuk as $data) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['id_barang'] ?></td>
                        <td><?= $data['nama_barang'] ?></td>
                        <td><?= $data['merk'] ?></td>
                        <td><?= $data['ukuran'] ?></td>
                        <td><?= $data['nama_instansi'] ?></td>
                        <td><?= $data['nama_tahun'] ?></td>
                        <td><?= $data['keterangan'] ?></td>
                        <td><?= $data['nama_ruangan'] ?></td>
                        <td>
                        <?php if($this->session->userdata('level_pengguna') == 'admin'): ?>
                            <div class='btn-group'>
                            <a
                                href='<?= site_url("Mutasimasuk/ubah/". $data['id_barangmasuk'] ."/". $data['id_barang']) ?>'
                                class='btn btn-warning'>Ubah</a>&nbsp;
                            <a
                                class='btn btn-danger'
                                href='<?= site_url("Mutasimasuk/hapus/". $data['id_barangmasuk'] ."/". $data['id_barang']) ?>'
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
