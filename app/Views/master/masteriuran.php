
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">Iuran</h4>
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

			<table class="bordered" id="barang-table">
				<thead>
				<tr>
					<th>No</th>
					<th>Pokok</th>
					<th>Wajib</th> 
						<th class="center">Aksi</th> 
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					foreach ($iuran as $row) {
				?>
					<tr>
						<td class="grey-text text-darken-1"><?= $no ?></td>
						<td class="grey-text text-darken-1"><?= number_format($row->pokok, 2); ?></td>
						<td class="grey-text text-darken-1"><?= number_format($row->wajib, 2); ?></td>
						<td> <a data-toggle="modal" data-target="#ubahmodal<?= $row->id; ?>"class="btn btn-sm btn-warning btn-lg"><i class="fas fa-plus"></i><span>Edit</span> </a> </td>  
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div> 


<!-- modal ubah data --> 
<!-- Modal -->
	<?php
		$no = 1;
		foreach ($iuran as $row) {
	?>
	<div class="modal fade" id="ubahmodal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<?=form_open_multipart('masteriuran/update/'.$row->id)?>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Iuran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">  
					<div class="form-group"> 
						<input type="hidden" name="id" value="<?= $row->id; ?>">
						<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0"> 
								<label for="pokok" class="form-control-user ">Iuran Pokok</label>
								<input type="text" id="pokok" class="form-control form-control-user " value="<?= $row->pokok; ?>" name="pokok" >
							</div>
							<div class="col-sm-6">
							<label for="wajib" class="form-control-user ">Iuran Wajib</label>

								<input type="text" id="wajib" class="form-control form-control-user " name="wajib" value="<?= $row->wajib; ?>">                                </div>
							</div> 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" >Save changes</button>
						</div> 
					</div>
					<?= form_close(); ?>
				</div>
			</div>
			<?php
				}
			?>
		</div>
	</div>
<!-- akhrir modal update -->
<?= $this->endSection();?>