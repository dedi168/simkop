
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">Data Perpanjang Atau Tutup Deposito</h4>
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
				<a href="<?= base_url('detaildeposito/tambah/'); ?>" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</a> 
            </div> 	
			<table class="table table-bordered" id="myTable">
				<thead>
				<tr>
					<th>No</th>
					<th>No Deopsito</th>
					<th>Tanggal Ambil</th>  
					<th>Status</th>
                    <th>Saldo</th>
                    <th>Sistem</th>
					<th>Operator</th>  
					<th class="center">Aksi</th> 
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					foreach ($deposito as $row) {
				?>
					<tr> 
						<td class="grey-text text-darken-1"><?= $no ?></td>
                        <td class="grey-text text-darken-1"><?= $row->no_deposito; ?></td>
						<td class="grey-text text-darken-1"><?= $row->tgl_ambil; ?></td>
						<td class="grey-text text-darken-1"><?= ($row->status == '1' ? 'TUTUP':'AKTIF'); ?></td>
						<td class="grey-text text-darken-1"><?= $row->saldo; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->sistem; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->opr; ?></td>  
						<td>
							<a href="<?= base_url('deposito/edit/'.$row->no_deposito); ?>" class="btn btn-warning btn-icon-split btn-sm"> Edit </a>
							<a href="<?= base_url('deposito/delete/'.$row->no_deposito); ?>" class="btn btn-danger btn-icon-split btn-sm"> Delete </a>
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