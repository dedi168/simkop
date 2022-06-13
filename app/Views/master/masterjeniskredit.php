
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">Jenis Kredit</h4>
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
			<table class="bordered" id="barang-table">
				<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Akun</th>
					<th>Bunga</th>
					<th>Denda</th> 
						<th class="center">Aksi</th> 
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					foreach ($jkre as $row) {
				?>
					<tr>
						<td class="grey-text text-darken-1"><?= $no ?></td>
						<td class="grey-text text-darken-1"><?= $row->nama; ?></td>
						<td class="grey-text text-darken-1"><?= $row->akun; ?></td>
						<td class="grey-text text-darken-1"><?= $row->bunga; ?></td>
						<td class="grey-text text-darken-1"><?= $row->denda; ?></td>
						<td>
							<a data-toggle="modal" data-target="#updatemodal<?= $row->id; ?>" class="btn btn-warning"><i class="fas fa-plus"></i> Edit</a>
							<a href="<?= base_url('MasterJKredit/delete/'.$row->id); ?>" class="btn btn-danger"><i class="fas fa-plus"></i> Delete</a>
						</td>				
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div> 


<!-- modal tambah data --> 
<!-- Modal --> 
	<div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<?=form_open_multipart('masterjkredit/store')?>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Jenis Kredit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">  
					<div class="form-group">   
                        <div class="form-group row">
                            <div class="col-sm-11 mb-3 mb-sm-0">  
								<label for="nama" class="col-form-label col-md-3 col-sm-3 label-align ">Nama</label>
								<input type="text" id="nama" class="form-control form-control" value="<?= old('nama'); ?>" name="nama" >
							</div>
                        </div>
                        <div class="form-group"> 
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Akun</label> 
                                    <select name="akun" class="form-control" required>
                                        <option value="">-- Pilih Akun --</option>
                                        <option value="Kredit Usaha">Kredit Usaha</option>
                                        <option value="Kredit Bagi Hasil">Kredit Bagi Hasil</option>
                                        <option value="Kredit Konsumtif">Kredit Konsumtif</option>
                                        <option value="Kredit Program">Kredit Program</option>
                                        <option value="Kredit Lain-Lain">Kredit Lain-Lain</option> 
                                    </select>   
						</div> 
                        <div class="form-group">  
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Bunga</label> 
                                    <select name="bunga" class="form-control" required>
                                        <option value="">Pilih Bunga</option>
                                        <option value="Bunga Kredit Usaha">Bunga Kredit Usaha</option>
                                        <option value="Pendapatan Kredit Bagi Hasil">Pendapatan Kredit Bagi Hasil</option>
                                        <option value="Bunga Kredit Konsumtif">Bunga Kredit Konsumtif</option>
                                        <option value="Provisi Kredit">Provisi Kredit</option>
                                        <option value="Administrasi Kredit">Administrasi Kredit</option>
                                        <option value="Pendapatan Denda">Pendapatan Denda</option>
                                        <option value="Administrasi Simpanan">Administrasi Simpanan</option>
                                        <option value="Bunga Kredit Lain">Bunga Kredit Lain</option> 
                                        <option value="Jasa PAM & Listrik">Jasa PAM & Listrik</option> 
                                        <option value="Bunga Tabungan">Bunga Tabungan</option> 
                                        <option value="Pendapatan Lain-Lain">Pendapatan Lain-Lain</option> 
                                        <option value="Pendapatan Meterai & Selisih">Pendapatan Meterai & Selisih</option> 
                                        <option value="Pendapatan Premi">Pendapatan Premi</option> 
                                    </select> 
						</div> 
                        <div class="form-group"> 
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Denda</label> 
                                    <select name="denda" class="form-control" required>
                                        <option value="">-- Denda --</option>
                                        <option value="Bunga Kredit Usaha">Bunga Kredit Usaha</option>
                                        <option value="Pendapatan Kredit Bagi Hasil">Pendapatan Kredit Bagi Hasil</option>
                                        <option value="Bunga Kredit Konsumtif">Bunga Kredit Konsumtif</option>
                                        <option value="Provisi Kredit">Provisi Kredit</option>
                                        <option value="Administrasi Kredit">Administrasi Kredit</option>
                                        <option value="Pendapatan Denda">Pendapatan Denda</option>
                                        <option value="Administrasi Simpanan">Administrasi Simpanan</option>
                                        <option value="Bunga Kredit Lain">Bunga Kredit Lain</option> 
                                        <option value="Jasa PAM & Listrik">Jasa PAM & Listrik</option> 
                                        <option value="Bunga Tabungan">Bunga Tabungan</option> 
                                        <option value="Pendapatan Lain-Lain">Pendapatan Lain-Lain</option> 
                                        <option value="Pendapatan Meterai & Selisih">Pendapatan Meterai & Selisih</option> 
                                        <option value="Pendapatan Premi">Pendapatan Premi</option> 
                                    </select> 
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" >Save changes</button>
					</div>  
					<?= form_close(); ?>
				</div>
			</div> 
		</div>
	</div>
<!-- akhrir trambah data modal -->

<!-- modal ubah data --> 
    <!-- Modal -->
    <?php
		$no = 1;
		foreach ($jkre as $row) {
	?>
	<div class="modal fade" id="updatemodal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<?=form_open_multipart('masterjkredit/update/'.$row->id)?>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Jenis Kredit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">  
					<div class="form-group">   
                        <div class="form-group row">
                            <div class="col-sm-11 mb-3 mb-sm-0">  
								<label for="nama" class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
								<input type="text" id="nama" class="form-control" value="<?= $row->nama; ?>" name="nama" >
							</div>
                        </div>
						<div class="form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align">Akun</label>
							<select name="akun" class="custom-select" required> 
                                <option <?php if ($row->akun == "Kredit Usaha") { echo 'selected'; }?> value="Kredit Usaha">Kredit Usaha</option>
                                <option <?php if ($row->akun == "Kredit Bagi Hasil") { echo 'selected'; }?> value="Kredit Bagi Hasil">Kredit Bagi Hasil</option>
                                <option <?php if ($row->akun == "Kredit Konsumtif") { echo 'selected'; }?> value="Kredit Konsumtif">Kredit Konsumtif</option>
                                <option <?php if ($row->akun == "Kredit Program") { echo 'selected'; }?> value="Kredit Program">Kredit Program</option>
                                <option <?php if ($row->akun == "Kredit Lain-Lain") { echo 'selected'; }?> value="Kredit Lain-Lain">Kredit Lain-Lain</option> 
                            </select> 
						</div>
						<div class="form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align">Bunga</label> 
                                    <select name="bunga" class="custom-select" required> 
                                        <option <?php if ($row->bunga == "Bunga Kredit Usaha") { echo 'selected'; }?> value="Bunga Kredit Usaha">Bunga Kredit Usaha</option>
                                        <option <?php if ($row->bunga == "Pendapatan Kredit Bagi Hasil") { echo 'selected'; }?> value="Pendapatan Kredit Bagi Hasil">Pendapatan Kredit Bagi Hasil</option>
                                        <option <?php if ($row->bunga == "Bunga Kredit Konsumtif") { echo 'selected'; }?> value="Bunga Kredit Konsumtif">Bunga Kredit Konsumtif</option>
                                        <option <?php if ($row->bunga == "Provisi Kredit") { echo 'selected'; }?>v value="Provisi Kredit">Provisi Kredit</option>
                                        <option <?php if ($row->bunga == "Administrasi Kredit") { echo 'selected'; }?> value="Administrasi Kredit">Administrasi Kredit</option>
                                        <option <?php if ($row->bunga == "Pendapatan Denda") { echo 'selected'; }?> value="Pendapatan Denda">Pendapatan Denda</option>
                                        <option <?php if ($row->bunga == "Administrasi Simpanan") { echo 'selected'; }?> value="Administrasi Simpanan">Administrasi Simpanan</option>
                                        <option <?php if ($row->bunga == "Bunga Kredit Lain") { echo 'selected'; }?> value="Bunga Kredit Lain">Bunga Kredit Lain</option> 
                                        <option <?php if ($row->bunga == "Jasa PAM & Listrik") { echo 'selected'; }?> value="Jasa PAM & Listrik">Jasa PAM & Listrik</option> 
                                        <option <?php if ($row->bunga == "Bunga Tabungan") { echo 'selected'; }?> value="Bunga Tabungan">Bunga Tabungan</option> 
                                        <option <?php if ($row->bunga == "Pendapatan Lain-Lain") { echo 'selected'; }?> value="Pendapatan Lain-Lain">Pendapatan Lain-Lain</option> 
                                        <option <?php if ($row->bunga == "Pendapatan Meterai & Selisih") { echo 'selected'; }?> value="Pendapatan Meterai & Selisih">Pendapatan Meterai & Selisih</option> 
                                        <option <?php if ($row->bunga == "Pendapatan Premi") { echo 'selected'; }?> value="Pendapatan Premi">Pendapatan Premi</option> 
                                    </select> 
						</div>
						<div class="form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align">Denda</label> 
                                    <select name="denda" class="custom-select" required> 
                                        <option <?php if ($row->denda == "Bunga Kredit Usaha") { echo 'selected'; }?> value="Bunga Kredit Usaha">Bunga Kredit Usaha</option>
                                        <option <?php if ($row->denda == "Pendapatan Kredit Bagi Hasil") { echo 'selected'; }?> value="Pendapatan Kredit Bagi Hasil">Pendapatan Kredit Bagi Hasil</option>
                                        <option <?php if ($row->denda == "Bunga Kredit Konsumtif") { echo 'selected'; }?> value="Bunga Kredit Konsumtif">Bunga Kredit Konsumtif</option>
                                        <option <?php if ($row->denda == "Provisi Kredit") { echo 'selected'; }?>v value="Provisi Kredit">Provisi Kredit</option>
                                        <option <?php if ($row->denda == "Administrasi Kredit") { echo 'selected'; }?> value="Administrasi Kredit">Administrasi Kredit</option>
                                        <option <?php if ($row->denda == "Pendapatan Denda") { echo 'selected'; }?> value="Pendapatan Denda">Pendapatan Denda</option>
                                        <option <?php if ($row->denda == "Administrasi Simpanan") { echo 'selected'; }?> value="Administrasi Simpanan">Administrasi Simpanan</option>
                                        <option <?php if ($row->denda == "Bunga Kredit Lain") { echo 'selected'; }?> value="Bunga Kredit Lain">Bunga Kredit Lain</option> 
                                        <option <?php if ($row->denda == "Jasa PAM & Listrik") { echo 'selected'; }?> value="Jasa PAM & Listrik">Jasa PAM & Listrik</option> 
                                        <option <?php if ($row->denda == "Bunga Tabungan") { echo 'selected'; }?> value="Bunga Tabungan">Bunga Tabungan</option> 
                                        <option <?php if ($row->denda == "Pendapatan Lain-Lain") { echo 'selected'; }?> value="Pendapatan Lain-Lain">Pendapatan Lain-Lain</option> 
                                        <option <?php if ($row->denda == "Pendapatan Meterai & Selisih") { echo 'selected'; }?> value="Pendapatan Meterai & Selisih">Pendapatan Meterai & Selisih</option> 
                                        <option <?php if ($row->denda == "Pendapatan Premi") { echo 'selected'; }?> value="Pendapatan Premi">Pendapatan Premi</option> 
                                    </select> 
						</div> 
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" >Save changes</button>
					</div>  
					<?= form_close(); ?>
				</div>
			</div> 
		</div>
	</div> 
    <?php
		}
	?>
<!-- akhrir modal update -->
<?= $this->endSection();?>
 