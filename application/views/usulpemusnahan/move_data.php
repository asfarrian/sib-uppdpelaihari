               <!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Proses Pemusnahan Barang</h1>
						<div class="form-group">
						<a href="<?= base_url('usulpemusnahan');?>" class="btn btn-secondary">
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
                                type="text" 
                                autocomplete="off" 
                                name="id_barang" 
                                class="form-control" 
                                value="<?php echo $usulpemusnahan['id_barang']?>">
							</div>
							<div class="form-group">	
								<label for="nama">Nama Barang</label>
								<input disabled 
                                type="text" 
                                autocomplete="off" 
                                name="nama_barang" 
                                class="form-control" 
                                value="<?php echo $usulpemusnahan['nama_barang']?>">
							</div>
							<div class="form-group">
								<label for="nama">Merk</label>
								<input disabled type="text" 
                                autocomplete="off" 
                                name="merk" 
                                class="form-control" value="<?php echo $usulpemusnahan['merk']?>">
							</div>
                            <div class="form-group">
								<label for="nama">Ruangan</label>
								<input disabled type="text" 
                                autocomplete="off" 
                                name="id_ruangan" 
                                class="form-control" value="<?php echo $usulpemusnahan['nama_ruangan']?>">
							</div>
                            <div class="form-group">
								<label for="nama">Tahun Anggaran</label>
								<select name="id_tahun" required class="form-control">
									<option value="">Pilih Tahun</option>
									<?php
										foreach($tahunanggaran as $row){
											echo "<option value='$row->id_tahun'>$row->nama_tahun</option>";
										}
										?>
								</select>
                            </div>
                            <div class="form-group">
								<label for="nama">Cara Pemusnahan</label>
								<select name="cara_pemusnahan" required class="form-control">
									<option value="">Pilih Cara Pemusnahan</option>
                                    <option value="Dibakar">Dibakar</option>
									<option value="Ditimbun">Ditimbun</option>
							    </select>
							</div>
							<div class="form-group">
								<button type="submit" name="simpan" class="btn btn-primary" ><i class="fas fa-save"></i> Simpan
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
