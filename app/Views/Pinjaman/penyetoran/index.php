
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">Setoran Pinjaman</h4>
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
			<a href="<?= base_url('DetailPinjaman/tambah/'); ?>" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</a> 
            </div> 
			<div class="col-lg-12"> 
			<table class="table table-bordered" id ="myTable">
				<thead class="thead-light ">
				<tr>
					<th>No</th>
					<th>No Pinjaman</th>
					<th>Nama</th>
					<th>Pinjaman Awal</th>
					<th>Angsuran</th>   
					<th>Sisa Pinjaman</th> 
					<th>Angsuran Ke</th> 
					<th class="center">Aksi</th> 
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					foreach ($pinjamanD as $row) {
				?>
					<tr>
						<td class="grey-text text-darken-1"><?= $no ?></td> 
						<td class="grey-text text-darken-1"><?= $row->no_pinjaman; ?></td>
						<td class="grey-text text-darken-1"><?= $row->nama1; ?></td> 
						<td class="grey-text text-darken-1"><?= "Rp. ". number_format($row->jml_pinjaman,2,',','.') ;  ?></td>
						<td class="grey-text text-darken-1"><?= "Rp. ". number_format($row->bayar,2,',','.') ;  ?></td>   
						<td class="grey-text text-darken-1"><?="Rp. ". number_format($row->sisa,2,',','.') ; ?></td>
						<td class="grey-text text-darken-1"><?=$row->bayarke ; ?></td>
						<td>
							<a href="<?= base_url('DetailPinjaman/edit/'.$row->id); ?>" class="btn btn-light btn-icon-split btn-sm"><img src="img/edit.png" width="20px" height="20px"alt="Edit"></a>
							<a href="<?= base_url('DetailPinjaman/delete/'.$row->id); ?>" class="btn btn-light btn-icon-split btn-sm"><img src="img/delete.png" width="20px" height="20px"alt="Delete"></a>
							<a href="<?= base_url('DetailPinjaman/bukti/'.$row->id); ?>" class="btn btn-light btn-icon-split btn-sm"><img src="img/print.png" width="20px" height="20px"alt="Bukti"> </a>						
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
 