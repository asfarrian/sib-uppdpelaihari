               <!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kartu Inventaris Barang</h1>
						<div class="form-group">
						<a href="<?= base_url('dashboard');?>" class="btn btn-secondary">
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
								<label for="nama">Kode Barang</label>
								<input type="text" autocomplete="off" name="kode_barang" class="form-control" value="<?php echo $dashboard['kode_barang']?>">
							</div>
							<div class="form-group">	
								<label for="nama">Nama Barang</label>
								<input type="text" autocomplete="off" name="nama_barang" class="form-control" value="<?php echo $dashboard['nama_barang']?>">
							</div>
							<div class="form-group">
								<label for="nama">Merk</label>
								<input type="text" autocomplete="off" name="merk" class="form-control" value="<?php echo $dashboard['merk']?>">
								</div>
							<div class="form-group">
								<label for="nama">Nomor Registrasi</label>
								<input type="text" autocomplete="off" name="nomor_registrasi" class="form-control" value="<?php echo $dashboard['nomor_registrasi']?>">
								</div>
							<div class="form-group">
								<label for="nama">Ukuran</label>
								<input type="text" autocomplete="off" name="ukuran" class="form-control" value="<?php echo $dashboard['ukuran']?>">
							</div>
							<div class="form-group">
								<label for="nama">Bahan</label>
								<input type="text" autocomplete="off" name="bahan" class="form-control" value="<?php echo $dashboard['bahan']?>">
							</div>
							<div class="form-group">
								<label for="nama">Tahun Pembelian</label>
								<input type="text" autocomplete="off" name="tahun_pembelian" class="form-control" value="<?php echo $dashboard['tahun_pembelian']?>">
							</div>
							<div class="form-group">
								<label for="nama">Asal-Usul</label>
								<input type="text" autocomplete="off" name="asal_usul" class="form-control" value="<?php echo $dashboard['asal_usul']?>">
							</div>
							<div class="form-group">
								<label for="nama">Kondisi</label>
								<select name="kondisi" required class="form-control">
									<option value="" >--Pilih Kondisi--</option>
									<?php foreach($kondisi as $kon) { ?>
										<option value="<?= $kon ?>" <?= $kon == $dashboard['kondisi'] ? 'selected': '' ?>><?= $kon ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="nama">Harga</label>
								<input type="text" autocomplete="off" name="harga" class="form-control" value="<?php echo $dashboard['harga']?>">
							</div>
							<div class="form-group">
								<label for="nama">Keterangan</label>
								<input type="text" autocomplete="off" name="keterangan" class="form-control" value="<?php echo $dashboard['keterangan']?>">
							</div>
							<div class="form-group">
								<label for="nama">--Pilih Ruangan--</label>
								<select name="ruangan"  class="form-control">
									<option value="<?php echo $dashboard['id_ruangan']?>"><?php echo $dashboard['nama_ruangan']?></option>
									<?php
										foreach($ruangan as $row){
											echo "<option value='$row->id_ruangan' $select>$row->nama_ruangan</option>";
										}
										?>
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
