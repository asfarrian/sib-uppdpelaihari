               <!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tahun Anggaran</h1>
						<div class="form-group">
						<a href="<?= base_url('tahunanggaran');?>" class="btn btn-secondary">
						<i class="far fa-arrow-alt-circle-left"></i> Kembali</a>
						</div>
                    </div>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
     </div>
     <div class="card-body">
     <div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-body">
						<form action="<?= base_url('tahunanggaran/tambah');?>" method="post" class="mt-3">
							<div class="form-group">
								<label for="nama">Tahun</label>
								<input type="number" autocomplete="off" name="nama_tahun" class="form-control" required>
							</div>
							<div class="form-group">
								<button type="submit" name="simpan" class="btn btn-primary" 
								onclick="return alert('Data Berhasil Di Simpan')"><i class="fas fa-save"></i> Simpan
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
