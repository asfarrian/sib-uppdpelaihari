               <!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kartu Inventaris Ruangan</h1>
                    </div>
                    <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-dark">Pilih Ruangan</h6>
     </div>
     <div class="card-body">
     <div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-body">
						<form action="<?= site_url("Kir") ?>" method="get" class="mt-3">
							<div class="form-group">
								<label for="nama">Nama Ruangan</label>
								<select name="id_ruangan" required class="form-control">
									<option value="">--Pilih Ruangan--</option>
									<?php foreach($ruangan as $row) { ?>
                                        <option
                                            value="<?= $row->id_ruangan ?>"
                                            <?php
                                                if(isset($selected_id_ruangan)) {
                                                    if($selected_id_ruangan == $row->id_ruangan) {
                                                        echo "selected";
                                                    }
                                                }
                                            ?>>
                                            <?= $row->nama_ruangan ?></option>
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
        <?php if(isset($selected_id_ruangan)) { ?>
                            <a
                                href="<?= site_url("Kir/laporan_pdf/". $selected_id_ruangan) ?>"
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
                         <th>Kode Barang</th>
                         <th>Nama Barang</th>
                         <th>Merk</th>
                         <th>Ukuran</th>
                         <th>Tahun</th>
                         <th>Keterangan</th>
                         <th>Ruangan</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                 <?php
					$no = 1;
					foreach($kir as $data):
                    ?>
					 <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['id_barang'] ?></td>
                        <td><?php echo $data['kode_barang'] ?></td>
                        <td><?php echo $data['nama_barang'] ?></td>
                        <td><?php echo $data['merk'] ?></td>
                        <td><?php echo $data['ukuran'] ?></td>
                        <td><?php echo $data['tahun_pembelian'] ?></td>
                        <td><?php echo $data['keterangan'] ?></td>
                        <td><?php echo $data['nama_ruangan'] ?></td>
                        <td><div class='btn-group'>
                            <a
                                href="<?php echo base_url('kir/ubah/'.$data['id_barang']) ?>"
                                class='btn btn-warning'>Ubah</a>
                        </td>
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
