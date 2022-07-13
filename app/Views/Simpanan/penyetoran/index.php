
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">Setoran</h4>
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
			<a href="<?= base_url('DetailSimpanan/tambah/'); ?>" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</a> 
            </div> 
			<table class="bordered" id="barang-table">
				<thead>
				<tr>
					<th>No</th>
					<th>No Tabungan</th>
					<th>Kode</th>
					<th>Jenis Simpanan</th>
					<th>Jumlah</th>  
					<th>Operator</th>
					<th>tanggal</th> 
					<th>Total Saldo</th> 
					<th class="center">Aksi</th> 
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					foreach ($simpananD as $row) {
				?>
					<tr>
						<td class="grey-text text-darken-1"><?= $no ?></td> 
						<td class="grey-text text-darken-1"><?= $row->no_tabungan; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->kode; ?></td>
						<td class="grey-text text-darken-1"><?= $row->jenis_simpanan; ?></td>
						<td class="grey-text text-darken-1"><?= "Rp. ". number_format($row->jumlah,2,',','.') ;  ?></td>  
						<td class="grey-text text-darken-1"><?= $row->opr; ?></td>
						<td class="grey-text text-darken-1"><?= $row->tgl; ?></td>
						<td class="grey-text text-darken-1"><?="Rp. ". number_format($row->jumlah_simpanan,2,',','.') ; ?></td>
						<td>
							<a href="<?= base_url('iuran/edit/'.$row->id); ?>" class="btn btn-warning"><i class="fas fa-plus"></i> Edit</a>
							<a href="<?= base_url('iuran/delete/'.$row->id); ?>" class="btn btn-danger"><i class="fas fa-plus"></i> Delete</a>
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

<?= $this->endSection();?>
 