
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">Data simpanan</h4>
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
				<a href="<?= base_url('simpanan/tambah/'); ?>" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</a> 
            </div> 	
			<div class="col-lg-12"> 
			<table class="table table-bordered" id ="myTable">
				<thead class="thead-light ">
				<tr>
					<th>No</th>
					<th>No Tabungan</th>
					<th>Nama</th>  
					<th>Alamat</th>
                    <th>Pekerjaan</th>
					<th>Telepon</th> 
                    <th>Status</th> 
					<th class="center">Aksi</th> 
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					foreach ($simpanan as $row) {
				?>
					<tr> 
						<td class="grey-text text-darken-1"><?= $no ?></td>
                        <td class="grey-text text-darken-1"><?= $row->no_tabungan; ?></td>
						<td class="grey-text text-darken-1"><?= $row->nama; ?></td>
						<td class="grey-text text-darken-1"><?= $row->alamat; ?></td>
						<td class="grey-text text-darken-1"><?= $row->pekerjaan; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->telp; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->status; ?></td>  
						<td>
							<a data-toggle="modal" data-target="#detailmodal<?= $row->no_tabungan; ?>" class="btn btn-light btn-icon-split btn-sm"> <img src="img/detail.png" width="20px" height="20px"alt="Detail"> </a>
							<a href="<?= base_url('simpanan/edit/'.$row->no_tabungan); ?>" class="btn btn-light btn-icon-split btn-sm"> <img src="img/edit.png" width="20px" height="20px"alt="Edit"> </a>
							<a href="<?= base_url('simpanan/delete/'.$row->no_tabungan); ?>" class="btn btn-light btn-icon-split btn-sm"><img src="img/delete.png" width="20px" height="20px"alt="Delete"></a>
						</td> 					
			
					</tr>
					<?php
					$no++;	
					}
					?>
				</tbody>
			</table></div>
		</div>
	</div>
</div> 
 <!-- modal detail data --> 
<!-- Modal -->
	<?php 
		foreach ($simpanan as $row) {
	?>
	<div class="modal fade" id="detailmodal<?= $row->no_tabungan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		 
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">  
					<table class="table table-bordered" id="barang-table"> 
						<thead> 
						</thead>
						<tbody> 
						<tr><th>No Tabungan</th><td class="grey-text text-darken-1"><?= $row->no_tabungan; ?></td></tr>
						<tr><th>Operator</th><td class="grey-text text-darken-1"><?= $row->operator; ?></td></tr>
						<tr><th>Nama</th> <td class="grey-text text-darken-1"><?= $row->nama; ?></td></tr>
						<tr><th>Alamat</th><td class="grey-text text-darken-1"><?= $row->alamat; ?></td> </tr>
						<tr><th>Pekerjaan</th> <td class="grey-text text-darken-1"><?= $row->pekerjaan; ?></td></tr>
						<tr><th>No Anggota</th><td class="grey-text text-darken-1"><?= $row->no_anggota; ?></td> </tr>
						<tr><th>Telepon</th> <td class="grey-text text-darken-1"><?= $row->telp; ?></td></tr>
						<tr><th>Status</th><td class="grey-text text-darken-1"><?= $row->status; ?></td> </tr>
						<tr><th>Bunga</th><td class="grey-text text-darken-1"><?= $row->bunga; ?></td> </tr>
						<tr><th>Jenis</th><td class="grey-text text-darken-1"><?= $row->jenis; ?></td></tr>
						<tr><th>Jangka Waktu</th> <td class="grey-text text-darken-1"><?= $row->jk; ?> Bulan</td> </tr>
						<tr><th>Jatuh Tempo</th><td class="grey-text text-darken-1"><?= $row->jt; ?></td></tr>
						<tr><th>Setoran</th><td class="grey-text text-darken-1"><?= $row->setoran; ?></td></tr>
						<tr><th>Nilai</th><td class="grey-text text-darken-1"><?= $row->nilai; ?></td></tr>
						<tr><th>Tangal Lahir</th><td class="grey-text text-darken-1"><?= $row->tgl_lahir; ?></td></tr>
						<tr><th>Tangal Daftar</th><td class="grey-text text-darken-1"><?= $row->created_at; ?></td></tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
			<?php
				}
			?>
<!-- akhrir modal update -->
<?= $this->endSection();?>