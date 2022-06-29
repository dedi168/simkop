
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">master jenis simpanan</h4>
					</div>
				</div>
			</div>
			<br>
			<div class="divider"></div>
			<?php if (!empty(session()->getFlashdata('message'))) : ?>
    			<div class="alert alert-success alert-dismissible fade show" role="alert">
        			<?php echo session()->getFlashdata('message'); ?>
        			<button type="button" class="close" data-dismiss="alert"varia-label="Close">
            			<span aria-hidden="true">&times;</span>
        			</button>
    			</div>
    		<?php endif; ?>
            <div class="col-md-2">
                <button data-toggle="modal" data-target="#tambahmodal" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</button>
            </div> 
			<table class="table table-bordered" id="barang-table">
            <thead class="thead-light ">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Akun</th> 
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
					$no = 1;
					foreach ($jsimp as $row) {
				?>
					<tr>
						<td><?= $no ?></td>     
                <td><?= $row->kode  ; ?></td>
                <td><?= $row->nama; ?></td>
                <td><?= $row->akun; ?></td> 
                <td>
                    <a data-toggle="modal" data-target="#updatemodal<?= $row->id; ?>" class="btn btn-warning  btn-sm"><i class="fas fa-plus"></i> Edit</a>
                    <a href="<?= base_url('MasterJSimp/delete/'.$row->id); ?>" class="btn btn-danger  btn-sm"><i class="fas fa-plus"></i> Delete</a>
                </td>
                </tr> 
                <?php $no++;
            } ?>
            </tbody>
			</table>
		</div>
	</div>
</div> 

<!-- modal tambah data --> 
    <!-- Modal --> 
    <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?=form_open_multipart('MasterJSimp/store')?>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jenis Simpanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">  
                    <div class="form-group">  
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"> 
                                <input type="text" placeholder="kode" id="kode" class="form-control form-control-user " value="<?= old('kode'); ?>" name="kode" >
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0"> 
                                <input type="text" id="nama" placeholder="Nama" class="form-control form-control-user " value="<?= old('nama'); ?>" name="nama" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group mb-3"> 
                                <select class="form-control" id="akun" name="akun">
                                    <option value="">---Pilih Akun---</option> 
                                    <option value="Tabungan Sukarela">Tabungan Sukarela</option> 
                                    <option value="Simpanan Berjangka">Simpanan Berjangka</option> 
                                    <option value="Simpanan Taberna">Simpanan Taberna</option> 
                                    <option value="Hutang Gaji">Hutang Gaji</option> 
                                    <option value="Dana Pengembangan Wilayah Kerja">Dana Pengembangan Wilayah Kerja</option> 
                                    <option value="Dana Sosial Kemasyarkatan">Dana Sosial Kemasyarkatan</option> 
                                    <option value="Dana Pendidikan">Dana Pendidikan</option> 
                                    <option value="BungaTabungan Yang Belum Di Bayar">BungaTabungan Yang Belum Di Bayar</option> 
                                    <option value="SHU Yang Belum Dibagi">SHU Yang Belum Dibagi</option> 
                                    <option value="Dana Titipan Br. Kebon">Dana Titipan Br. Kebon</option> 
                                    <option value="Jasa Karyawan Yang Belum Dibayar">Jasa Karyawan Yang Belum Dibayar</option> 
                                    <option value="Jasa Pengurus  & Pengawas  Blm Dibayar">Jasa Pengurus  & Pengawas  Blm Dibayar</option> 
                                    <option value="Tabungan">Tabungan</option> 
                                
                                </select>
                                </div>                            
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Save changes</button>
                        </div> 
                    </div>
                    
                </div>
            </div> 
        </div>
        <?= form_close(); ?>
    </div>
<!-- akhir modal tambah data -->
 
<!-- modal ubah data --> 
    <!-- Modal --> 
    <?php
					$no = 1;
					foreach ($jsimp as $row) {
				?>
    <div class="modal fade" id="updatemodal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?=form_open_multipart('MasterJSimp/update/'.$row->id)?>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jenis Simpanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">  
                    <div class="form-group">  
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"> 
                                <input type="text" placeholder="kode" id="kode" class="form-control form-control-user " value="<?= $row->kode ?>" name="kode" >
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0"> 
                                <input type="text" id="nama" placeholder="Nama" class="form-control form-control-user " value="<?= $row->nama ?>" name="nama" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group mb-3"> 
                                <select class="form-control" id="akun" name="akun">
                                    <option value="">---Pilih Akun---</option> 
                                    <option <?php if ($row->akun == "Tabungan Sukarela") { echo 'selected'; }?> value="Tabungan Sukarela">Tabungan Sukarela</option> 
                                    <option <?php if ($row->akun == "Simpanan Berjangka") { echo 'selected'; }?> value="Simpanan Berjangka">Simpanan Berjangka</option> 
                                    <option <?php if ($row->akun == "Simpanan Taberna") { echo 'selected'; }?> value="Simpanan Taberna">Simpanan Taberna</option> 
                                    <option <?php if ($row->akun == "Hutang Gaji") { echo 'selected'; }?> value="Hutang Gaji">Hutang Gaji</option> 
                                    <option <?php if ($row->akun == "Dana Pengembangan Wilayah Kerja") { echo 'selected'; }?> value="Dana Pengembangan Wilayah Kerja">Dana Pengembangan Wilayah Kerja</option> 
                                    <option <?php if ($row->akun == "Dana Sosial Kemasyarkatan") { echo 'selected'; }?> value="Dana Sosial Kemasyarkatan">Dana Sosial Kemasyarkatan</option> 
                                    <option <?php if ($row->akun == "Dana Pendidikan") { echo 'selected'; }?> value="Dana Pendidikan">Dana Pendidikan</option> 
                                    <option <?php if ($row->akun == "BungaTabungan Yang Belum Di Bayar") { echo 'selected'; }?> value="BungaTabungan Yang Belum Di Bayar">BungaTabungan Yang Belum Di Bayar</option> 
                                    <option <?php if ($row->akun == "SHU Yang Belum Dibagi") { echo 'selected'; }?> value="SHU Yang Belum Dibagi">SHU Yang Belum Dibagi</option> 
                                    <option <?php if ($row->akun == "Dana Titipan Br. Kebon") { echo 'selected'; }?> value="Dana Titipan Br. Kebon">Dana Titipan Br. Kebon</option> 
                                    <option <?php if ($row->akun == "Jasa Karyawan Yang Belum Dibayar") { echo 'selected'; }?> value="Jasa Karyawan Yang Belum Dibayar">Jasa Karyawan Yang Belum Dibayar</option> 
                                    <option <?php if ($row->akun == "Jasa Pengurus  & Pengawas  Blm Dibayar") { echo 'selected'; }?> value="Jasa Pengurus  & Pengawas  Blm Dibayar">Jasa Pengurus  & Pengawas  Blm Dibayar</option> 
                                    <option <?php if ($row->akun == "Tabungan") { echo 'selected'; }?> value="Tabungan">Tabungan</option> 
                                
                                </select>
                                </div>                            
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Save changes</button>
                        </div> 
                    </div>
                    
                </div>
            </div> 
        </div>
        <?= form_close(); ?>
    </div>
    <?php
		}
	?>
<!-- akhir modal tambah data -->
<?= $this->endSection();?>
