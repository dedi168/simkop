
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">INVENTARIS KOPERASI</h4> 	
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
				<a href="<?= base_url('inventaris/tambah/'); ?>" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</a> 
            </div> 
			<div class="col-lg-10 table-responsive"> 
			<table class="table table-bordered" id ="myTable">
				<thead class="thead-light ">
				<tr>
					<th>No</th>
					<th>Kode</th> 
					<th>Nama</th>  
                    <th>Jumlah</th>
					<th>Harga</th> 
                    <th>Tanggal Beli</th> 
					<th class="center">Aksi</th> 
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 1+(10*($currentPage-1));
					foreach ($inventaris as $row) {
				?>
					<tr> 
						<td class="grey-text text-darken-1"><?= $no ?></td>
                        <td class="grey-text text-darken-1"><?= $row->kode; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->nama; ?></td>
						<td class="grey-text text-darken-1"><?= $row->jumlah; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->nilai; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->tgl_beli; ?></td>  
						<td>
							<a href="<?= base_url('inventaris/edit/'.$row->id); ?>" class="btn btn-light  btn-icon-split btn-sm"> <img src="img/edit.png" width="20px" height="20px"alt="Edit">  </a>
							<a href="<?= base_url('inventaris/delete/'.$row->id); ?>" onClick="return confirm('Hapus data inventaris <?= $row->nama?>?')" class="btn btn-light  btn-icon-split btn-sm"> <img src="img/delete.png" width="20px" height="20px"alt="Delete"> </a>
						</td>				
					</tr>
					<?php
						$no++;	}
					?>
				</tbody>
			</table> 
			<?= $pager->links('default','custom_pager') ?>
			</div>
		</div>
	</div>
</div>  
<?= $this->endSection();?>