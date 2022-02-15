               <!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Barang Telah Dimusnahkan</h1>
                    </div>

                    <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Tahun Anggaran</h6>
     </div>
     <div class="card-body">
     <div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-body">
                    <form action="<?= site_url("barangdimusnahkan") ?>" method="get" class="mt-3">
							<div class="form-group">
								<label for="nama">Tahun</label>
								<select name="id_tahun" required class="form-control">
									<option value="">--Pilih Tahun Anggaran--</option>
									<?php foreach($tahunanggaran as $row) { ?>
                                        <option
                                            value="<?= $row->id_tahun ?>"
                                            <?php
                                                if(isset($selected_pemusnahan)) {
                                                    if($selected_pemusnahan == $row->id_tahun) {
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
        <?php if(isset($selected_pemusnahan)) { ?>
                            <a
                                href="<?= site_url("Barangdimusnahkan/laporan_pdf/". $selected_pemusnahan) ?>"
                                target="_blank"
                                class="btn btn-info mt-3">Cetak PDF</a>
                        <?php } ?>
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
                         <th>ID Barang</th>
                         <th>Kode Barang</th>
                         <th>Nama Barang</th>
                         <th>Merk</th>
                         <th>Nomor Registrasi</th>
                         <th>Ukuran</th>
                         <th>Bahan</th>
                         <th>Tahun</th>
                         <th>Asal-Usul</th>
                         <th>Kondisi</th>
                         <th>Harga</th>
                         <th>Keterangan</th>
                         <th>Cara Pemusnahan</th>
                         <th>Tahun Anggaran</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody> 
                 <?php
					$no = 1;
					foreach($barangdimusnahkan as $data):
                    ?>
					 <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['id_barang'] ?></td>
                        <td><?php echo $data['kode_barang'] ?></td>
                        <td><?php echo $data['nama_barang'] ?></td>
                        <td><?php echo $data['merk'] ?></td>
                        <td><?php echo $data['nomor_registrasi'] ?></td>
                        <td><?php echo $data['ukuran'] ?></td>
                        <td><?php echo $data['bahan'] ?></td>
                        <td><?php echo $data['tahun_pembelian'] ?></td>
                        <td><?php echo $data['asal_usul'] ?></td>
                        <td><?php echo $data['kondisi'] ?></td>
                        <td>Rp<?php echo number_format($data['harga'],2,",",".")?></td>
                        <td><?php echo $data['keterangan'] ?></td>
                        <td><?php echo $data['cara_pemusnahan'] ?></td>
                        <td><?php echo $data['nama_tahun'] ?></td>
                        <td>
                        <?php if($this->session->userdata('level_pengguna') == 'admin'): ?>
                        <a href="<?php echo base_url('barangdimusnahkan/ubah/'.$data['id_barang']) ?>" 
                                class='btn btn-warning'>Ubah
                        </a></td>
                        <?php endif ?>
                        </tr>
               <?php
                   endforeach;
               ?>
                 </tbody>
             </table>
         </div>
     </div>
 </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
