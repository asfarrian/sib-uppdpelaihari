               <!-- Begin Page Content -->
               <div class="container-fluid">
 
                   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Inventaris Barang Rusak Ringan</h1>
                        <a href="<?php echo base_url('barangrusakringan/laporan_pdf/');?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                                class="fas fa-print fa-sm text-white-50"></i>  Cetak  </a>
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
                         <th>Ruangan</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody> 
                 <?php
					$no = 1;
					foreach($barangrusakringan as $data):
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
                        <td><?php echo $data['nama_ruangan'] ?></td>
                        <td>
                        <?php if($this->session->userdata('level_pengguna') == 'admin'): ?>
                        <div class='btn-group'>
                        <a href="<?php echo base_url('barangrusakringan/ubah/'.$data['id_barang']) ?>" 
                        class='btn btn-warning'>Ubah</a> &nbsp;
                        </td>
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
