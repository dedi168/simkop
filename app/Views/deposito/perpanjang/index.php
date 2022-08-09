
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
			<div class="col-lg-12"> 
			<table class="table table-bordered" id ="myTable">
				<thead class="thead-light ">
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
					$no = 1+(10*($currentPage-1));
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
							<a href="<?= base_url('detaildeposito/edit/'.$row->id); ?>" class="btn btn-light  btn-icon-split btn-sm"> <img src="img/edit.png" width="20px" height="20px"alt="Edit">  </a>
							<a href="<?= base_url('detaildeposito/delete/'.$row->id); ?>" class="btn btn-light  btn-icon-split btn-sm"> <img src="img/delete.png" width="20px" height="20px"alt="Delete">  </a>
							<a href="<?= base_url('detaildeposito/bukti/'.$row->id); ?>" class="btn btn-light btn-icon-split btn-sm"><img src="img/print.png" width="20px" height="20px"alt="Bukti"> </a>						

						</td>				
					</tr>
					<?php
					$no++;	
					}
					?>
				</tbody>
			</table><?= $pager->links('default','custom_pager') ?></div>
		</div>
	</div>
</div> 
  
<?= $this->endSection();?>