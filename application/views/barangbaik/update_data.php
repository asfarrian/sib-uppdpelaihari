               <!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kondisi Barang</h1>
						<div class="form-group">
						<a href="<?= base_url('barangbaik');?>" class="btn btn-secondary">
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
									value="<?= $barangbaik['id_barang'] ?>" required>
							</div>
                        <div class="form-group">
								<label for="nama">Nama Barang</label>
								<input disabled
									class="form-control"
									type="text"
									name="nama_barang"
									value="<?= $barangbaik['nama_barang'] ?>" required>
							</div>
                            <div class="form-group">
								<label for="nama">Merk</label>
								<input disabled
									class="form-control"
									type="text"
									name="merk"
									value="<?= $barangbaik['merk'] ?>" required>
							</div>
                            <div class="form-group">
								<label for="nama">Ukuran</label>
								<input disabled
									class="form-control"
									type="text"
									name="ukuran"
									value="<?= $barangbaik['ukuran'] ?>" required>
							</div>
						<div class="form-group">
								<label for="nama">Kondisi</label>
								<select name="kondisi" required class="form-control">
									<option value="" >--Pilih Kondisi--</option>
									<?php foreach($kondisi as $kon) { ?>
										<option value="<?= $kon ?>" <?= $kon == $barangbaik['kondisi'] ? 'selected': '' ?>><?= $kon ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
							<button type="submit" name="ubah" class="btn btn-primary" ><i class="fas fa-save"
							onclick="return alert('Data Berhasil Di Ubah')"></i> Simpan
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
