               <!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Mutasi Barang Keluar</h1>
                    </div>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-dark">Pilih Tahun Anggaran</h6>
     </div>
     <div class="card-body">
     <div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-body">
                    <form action="<?= site_url("mutasikeluar") ?>" method="get" class="mt-3">
							<div class="form-group">
								<label for="nama">Tahun Anggaran</label>
								<select name="id_tahun" required class="form-control">
									<option value="">--Pilih Tahun Anggaran--</option>
									<?php foreach($tahunanggaran as $row) { ?>
                                        <option
                                            value="<?= $row->id_tahun ?>"
                                            <?php
                                                if(isset($selected_mutasi_keluar)) {
                                                    if($selected_mutasi_keluar == $row->id_tahun) {
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
        <?php if(isset($selected_mutasi_keluar)) { ?>
                            <a
                                href="<?= site_url("Mutasikeluar/laporan_pdf/". $selected_mutasi_keluar) ?>"
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
                         <th>Nomor Registrasi</th>
                         <th>Ukuran</th>
                         <th>Barang Dari</th>
                         <th>Tahun Anggaran</th>
                         <th>Keterangan</th>
                         <th>Harga</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                <?php
					$no = 1;
					foreach($mutasikeluar as $data) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['id_barang'] ?></td>
                        <td><?= $data['nama_barang'] ?></td>
                        <td><?= $data['merk'] ?></td>
                        <td><?= $data['nomor_registrasi'] ?></td>
                        <td><?= $data['ukuran'] ?></td>
                        <td><?= $data['nama_instansi'] ?></td>
                        <td><?= $data['nama_tahun'] ?></td>
                        <td><?= $data['keterangan'] ?></td>
                        <td>Rp<?php echo number_format($data['harga'],2,",",".")?></td>
                        <td>
                        <?php if($this->session->userdata('level_pengguna') == 'admin'): ?>
                            <div class='btn-group'>
                            <a
                                href='<?= site_url("Mutasikeluar/ubah/". $data['id_barangkeluar']) ?>'
                                class='btn btn-warning'>Ubah</a>&nbsp;
                            <a
                                class='btn btn-danger'
                                href='<?= site_url("Mutasikeluar/hapus/". $data['id_barangkeluar'] ."/". $data['id_barang']) ?>'
                                onclick="return confirm('Ingin membatalkan mutasi keluar pada data ini?')">Batal</a>
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
