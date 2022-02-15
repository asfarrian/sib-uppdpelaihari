               <!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Instansi</h1>
						<div class="form-group">
						<a href="<?= base_url('instansi');?>" class="btn btn-secondary">
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
								<label for="nama">Nama Instansi</label>
								<input type="text" autocomplete="off" name="nama" class="form-control" value="<?php echo $instansi->nama_instansi;?>" required>
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
