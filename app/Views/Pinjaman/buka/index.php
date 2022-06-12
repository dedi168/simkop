
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">Data Peminjam</h4>
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
                <button data-toggle="modal" data-target="<?= base_url('pinjaman/tambah');?>" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</button>
            </div> 
			<table class="table table-bordered" id="barang-table">
				<thead>
				<tr>
					<th>No</th>
					<th>No Pinjaman</th>
					<th>Tanggal</th>
					<th>Nama</th>  
                    <th>No Anggota</th>
					<th>Jangka Waktu</th> 
                    <th>Status</th> 
					<th class="center">Aksi</th> 
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					foreach ($pinjaman as $row) {
				?>
					<tr> 
						<td class="grey-text text-darken-1"><?= $no ?></td>
                        <td class="grey-text text-darken-1"><?= $row->no_pinjaman; ?></td>
						<td class="grey-text text-darken-1"><?= $row->created_at; ?></td>
						<td class="grey-text text-darken-1"><?= $row->nama; ?></td>
						<td class="grey-text text-darken-1"><?= $row->no_anggota; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->jangka_waktu; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->status; ?></td>  
						<td> 
							<a data-toggle="modal" data-target="#detailmodal<?= $row->no_pinjaman; ?>" class="btn btn-warning btn-icon-split btn-sm"> Edit </a>
							<a href="<?= base_url('pinjaman/delete/'); ?>" class="btn btn-danger btn-icon-split btn-sm"> Delete </a>
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
<?= $this->endSection();?>