
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">Bunga Deposito</h4>
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
			<div class="col-lg-5"> 
			<table class="table table-bordered" id ="myTable">
				<thead class="thead-light ">
				<tr>
					<th>No</th>
					<th>Jangka</th>
					<th>Kurunwaktu</th>
					<th>Bunga</th> 
						<th class="center">Aksi</th> 
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 1+(10*($currentPage-1));
					foreach ($bdep as $row) {
				?>
					<tr>
						<td class="grey-text text-darken-1"><?= $no ?></td>
						<td class="grey-text text-darken-1"><?= $row->jangka; ?></td>
						<td class="grey-text text-darken-1"><?= $row->keterangan; ?></td>
						<td class="grey-text text-darken-1"><?= $row->bunga; ?> %</td> 
						<td>
							<a data-toggle="modal" data-target="#updatemodal<?= $row->id; ?>" class="btn btn-light  btn-icon-split btn-sm"><img src="img/edit.png" width="20px" height="20px"alt="Edit"> </a>
							<a href="<?= base_url('Masterbungadepsito/delete/'.$row->id); ?>" class="btn btn-light  btn-icon-split btn-sm"><img src="img/delete.png" width="20px" height="20px"alt="Delete"> </a>
						</td>				
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
            <?= $pager->links('default','custom_pager') ?>
            </div>
		</div>
	</div>
</div> 


 <!-- modal tambah data --> 
    <!-- Modal --> 
    <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?=form_open_multipart('Masterbungadeposit/store')?>
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
                                <input type="text" placeholder="jangka waktu" id="waktu" class="form-control form-control-user " value="<?= old('jangka'); ?>" name="jangka" >
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0"> 
                                <input type="text" id="bunga" placeholder="Bunga" class="form-control form-control-user " value="<?= old('bunga'); ?>" name="bunga" >
                            </div>
                        </div>
						<div class="form-group"> 
							<label class="col-form-label col-md-5 col-sm-5 label-align" for="ket">Kurun Waktu</label> 
                                    <select id="ket" name="keterangan" class="form-control" required>
                                        <option value="">-- Kurun Waktu --</option>
                                        <option value="MINGGU">Minggu</option>
                                        <option value="BULAN">BULAN</option>
                                        <option value="TAHUN">TAHUN</option> 
                                    </select> 
									
							<div class="invalid-feedback">Example invalid custom select feedback</div>
                        </div>
                         
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Save changes</button>
                        </div> 
                    </div>
                    <?= form_close(); ?>
                </div>
            </div> 
        </div>
    </div>
	
 <!-- modal ubah data --> 
    <!-- Modal --> 
	<?php
		$no = 1;
		foreach ($bdep as $row) {
	?>
    <div class="modal fade" id="updatemodal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?=form_open_multipart('Masterbungadeposit/update/'.$row->id)?>
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
                                <input type="text" placeholder="jangka waktu" id="waktu" class="form-control form-control-user " value="<?= $row->jangka; ?>" name="jangka" >
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0"> 
                                <input type="text" id="bunga" placeholder="Bunga" class="form-control form-control-user " value="<?= $row->bunga; ?>" name="bunga" >
                            </div>
                        </div>
						<div class="form-group"> 
							<label class="col-form-label col-md-5 col-sm-5 label-align" for="ket">Kurun Waktu</label> 
                                    <select id="ket" name="keterangan" class="form-control" required> 
                                        <option <?php if ($row->keterangan == "MINGGU") { echo 'selected'; }?> value="MINGGU">MINGGU</option>
                                        <option <?php if ($row->keterangan == "BULAN") { echo 'selected'; }?> value="BULAN">BULAN</option>
                                        <option <?php if ($row->keterangan == "TAHUN") { echo 'selected'; }?> value="TAHUN">TAHUN</option> 
                                    </select>  
                        </div>
                         
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Save changes</button>
                        </div> 
                    </div>
                    <?= form_close(); ?>
                </div>
            </div> 
        </div>
    </div>
	<?php
		}
	?>
<!-- akhir modal ubah data -->
 
<?= $this->endSection();?>