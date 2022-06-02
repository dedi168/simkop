
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
 
			<table class="bordered" id="barang-table">
				<thead>
				<tr>
					<th>No</th>
					<th>Bunga</th>
					<th>Batas</th> 
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
						<td> <a data-toggle="modal" data-target="#ubahmodal<?= $row->id; ?>"class="btn btn-sm btn-warning btn-lg"><i class="fas fa-plus"></i><span>Edit</span> </a>
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

<!-- modal ubah data --> 
<!-- Modal -->
<?php
					$no = 1;
					foreach ($iuran as $row) {
				?>
<div class="modal fade" id="ubahmodal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<?=form_open_multipart('bungasimpanan/edit'.$row->id)?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bunga Simpanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
            <div class="form-group"> 
				<input type="hidden" name="id" value="<?= $row->id; ?>">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"> 
                                    <input type="text" id="bunga" class="form-control form-control-user " value="<?= number_format($row->pokok, 2); ?>" name="pokok" >
                                </div>
                                <div class="col-sm-6">
								<input type="text" id="batas" class="form-control form-control-user " name="wajib" value="<?= number_format($row->wajib, 2); ?>; ?>">                                </div>
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
<?= $this->endSection();?>
