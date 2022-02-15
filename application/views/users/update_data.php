               <!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
						<div class="form-group">
						<a href="<?= base_url('users');?>" class="btn btn-secondary">
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
						<form action="<?= base_url('users/ubah');?>" method="post" class="mt-3">
							<div class="form-group">
								<label for="nama">NIP</label>
								<input type="number" autocomplete="off" name="nip" 
								class="form-control" value="<?= $users['nip'] ?>" required>
							</div>
                            <div class="form-group">
								<label for="nama">Nama Pegawai</label>
								<input type="text" autocomplete="off" name="nama" 
								class="form-control" value="<?= $users['nama_pegawai'] ?>" required>
							</div>
                            <div class="form-group">
								<label for="nama">Jabatan</label>
								<input type="text" autocomplete="off" name="jabatan" 
								class="form-control" value="<?= $users['jabatan'] ?>" required>
							</div>
                            <div class="form-group">
								<label for="nama">Tanggal Lahir</label>
								<input type="date" autocomplete="off" name="tanggal_lahir" 
								class="form-control" value="<?= $users['tanggal_lahir'] ?>" required>
							</div>
							<div class="form-group">
								<label for="nama">Level Pengguna</label>
								<select name="level_pengguna" required class="form-control">
									<option value="" >--Pilih Level--</option>
									<?php foreach($levelpengguna as $level) { ?>
										<option value="<?= $level ?>" <?= $level == $users['level_pengguna'] ? 'selected': '' ?>><?= $level ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
							<button type="submit" name="ubah" class="btn btn-primary" ><i class="fas fa-save"></i> Simpan
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
