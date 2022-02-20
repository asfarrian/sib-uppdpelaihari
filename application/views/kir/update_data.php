               <!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kartu Inventaris Ruangan</h1>
						<div class="form-group">
						<a href="<?= base_url('kir');?>" class="btn btn-secondary">
						<i class="far fa-arrow-alt-circle-left"></i> Kembali</a>
						</div>
                    </div>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
     </div>
     <div class="card-body">
     <div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-body">
						<form action="" method="post" class="mt-3">
						<div class="form-group">
								<label for="nama">ID Barang</label>
								<input disabled
									class="form-control"
									type="text"
									name="nama_barang"
									value="<?= $kir['id_barang'] ?>" required>
							</div>
                        <div class="form-group">
								<label for="nama">Nama Barang</label>
								<input disabled
									class="form-control"
									type="text"
									name="nama_barang"
									value="<?= $kir['nama_barang'] ?>" required>
							</div>
                            <div class="form-group">
								<label for="nama">Merk</label>
								<input disabled
									class="form-control"
									type="text"
									name="merk"
									value="<?= $kir['merk'] ?>" required>
							</div>
                            <div class="form-group">
								<label for="nama">Ukuran</label>
								<input disabled
									class="form-control"
									type="text"
									name="ukuran"
									value="<?= $kir['ukuran'] ?>" required>
							</div>
                            <div class="form-group">
								<label for="nama">Ruangan</label>
								<select name="id_ruangan" required class="form-control">
									<option value="">--Pilih Ruangan--</option>
									<?php foreach($ruangan as $row) { ?>
										<option value="<?= $row->id_ruangan ?>" <?= $row->id_ruangan == $kir['id_ruangan'] ? 'selected': '' ?>> <?= $row->nama_ruangan ?> </option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<button type="submit" name="ubah" class="btn btn-primary" 
								onclick="return alert('Data Berhasil Di Ubah')"><i class="fas fa-save"></i> Simpan
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>	
     </div>
 </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
