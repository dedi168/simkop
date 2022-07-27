
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
			<a href="<?= base_url('iuran/tambah/'); ?>" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</a> 
            </div> 
			<div class="col-lg-12"> 
			<table class="table table-bordered" id ="myTable">
				<thead class="thead-light ">
				<tr>
					<th>No</th>
					<th>no_anggota</th>
					<th>tgl_bayar</th>
					<th>jenis_simpanan</th>
					<th>jumlah_bln</th> 
					<th>bln_m</th>
					<th>thn_m</th>
					<th>jumlah</th>
					<th>pokok</th>
					<th>wajib</th>
					<th>opr</th>
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
						<td class="grey-text text-darken-1"><?= $row->no_anggota; ?></td>
						<td class="grey-text text-darken-1"><?= $row->tgl_bayar; ?></td>
						<td class="grey-text text-darken-1"><?= $row->jenis_simpanan; ?></td>
						<td class="grey-text text-darken-1"><?= $row->jumlah_bln; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->bln_m; ?></td>
						<td class="grey-text text-darken-1"><?= $row->thn_m; ?></td>
						<td class="grey-text text-darken-1"><?= $row->jumlah; ?></td>
						<td class="grey-text text-darken-1"><?= $row->pokok; ?></td>
						<td class="grey-text text-darken-1"><?= $row->wajib; ?></td>
						<td class="grey-text text-darken-1"><?= $row->opr; ?></td>
						<td>
							<a href="<?= base_url('iuran/edit/'.$row->id); ?>" class="btn btn-warning btn-icon-split btn-sm"><i class="fas fa-plus"></i> Edit</a>
							<a href="<?= base_url('iuran/delete/'.$row->id); ?>" class="btn btn-danger btn-icon-split btn-sm"><i class="fas fa-plus"></i> Delete</a>
						</td>				
					</tr>
					<?php
					$no++;	
					}
						
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>  

<?= $this->endSection();?>
 