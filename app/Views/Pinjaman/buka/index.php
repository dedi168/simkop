
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
				<a href="<?= base_url('pinjaman/tambah/'); ?>" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</a> 
            </div> 	
			<div class="col-lg-12"> 
			<table class="table table-bordered" id ="myTable">
				<thead class="thead-light ">
				<tr>
					<th>No</th>
					<th>No Pinjaman</th>
					<th>Nama</th>  
					<th>Tanggal</th>
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
						<td class="grey-text text-darken-1"><?= $row->nama1; ?></td>
						<td class="grey-text text-darken-1"><?= $row->created_at; ?></td>
						<td class="grey-text text-darken-1"><?= $row->no_anggota; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->jangka_waktu; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->status; ?></td>  
						<td> 
						<a data-toggle="modal" data-target="#detailmodal<?= $row->no_pinjaman; ?>" class="btn btn-info btn-icon-split btn-sm"> Detail </a>
							<a href="<?= base_url('pinjaman/edit/'.$row->no_pinjaman); ?>" class="btn btn-warning btn-icon-split btn-sm"> Edit </a>
							<a href="<?= base_url('pinjaman/delete/'.$row->no_pinjaman); ?>" class="btn btn-danger btn-icon-split btn-sm"> Delete </a>
						</td>				
					</tr>
					<?php
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
		foreach ($pinjaman as $row) {
	?>
	<div class="modal fade" id="detailmodal<?= $row->no_pinjaman; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		 
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
							<tr><th>No Pinjaman</th><td class="grey-text text-darken-1"><?= $row->no_pinjaman; ?></td></tr>	
							</th><tr><th>Nama<td class="grey-text text-darken-1"><?= $row->nama1	; ?></td></tr>
							</th><tr><th>Alamat<td class="grey-text text-darken-1"><?= $row->alamat	; ?></td></tr>
							</th><tr><th>Pekerjaan<td class="grey-text text-darken-1"><?= $row->pekerjaan	; ?></td></tr>
							</th><tr><th>No Anggota<td class="grey-text text-darken-1"><?= $row->no_anggota	; ?></td></tr>
							</th><tr><th>Jatuh Tempo<td class="grey-text text-darken-1"><?= $row->tanggal	; ?></td></tr>
							</th><tr><th>Operator<td class="grey-text text-darken-1"><?= $row->opr	; ?></td></tr>
							</th><tr><th>Jumlah Pinjaman<td class="grey-text text-darken-1"><?= $row->jml_pinjaman	; ?></td></tr>
							</th><tr><th>Sistem Bunga<td class="grey-text text-darken-1"><?= $row->sistem_bunga	; ?></td></tr>
							</th><tr><th>Jangka Waktu<td class="grey-text text-darken-1"><?= $row->jangka_waktu	; ?></td></tr>
							</th><tr><th>Jangka Hari<td class="grey-text text-darken-1"><?= $row->jangka_harian	; ?></td></tr>
							</th><tr><th>Bunga<td class="grey-text text-darken-1"><?= $row->bunga	; ?></td></tr>
							</th><tr><th>Administrasi<td class="grey-text text-darken-1"><?= $row->administrasi	; ?></td></tr>
							</th><tr><th>Gaji<td class="grey-text text-darken-1"><?= $row->gaji	; ?></td></tr> 
							</th><tr><th>No Perjanjian<td class="grey-text text-darken-1"><?= $row->nsp	; ?></td></tr>
							</th><tr><th>Jenis<td class="grey-text text-darken-1"><?= $row->nama	; ?></td></tr>
							</th><tr><th>Status<td class="grey-text text-darken-1"><?= $row->status	; ?></td></tr> 
							</th><tr><th>Meterai<td class="grey-text text-darken-1"><?= $row->meterai	; ?></td></tr>
							</th><tr><th>Provisi<td class="grey-text text-darken-1"><?= $row->provisi	; ?></td></tr>
							</th><tr><th>Premi<td class="grey-text text-darken-1"><?= $row->premi	; ?></td></tr>
							</th><tr><th>Identitas<td class="grey-text text-darken-1"><?= $row->noid	; ?></td></tr>
							</th><tr><th>Nama Penanggung<td class="grey-text text-darken-1"><?= $row->nama2	; ?></td></tr>
							</th><tr><th>Alamat Penanggung<td class="grey-text text-darken-1"><?= $row->alamat2	; ?></td></tr>
							</th><tr><th>Pekerjaan Penanggung<td class="grey-text text-darken-1"><?= $row->pekerjaan2	; ?></td></tr>
							</th><tr><th>Gaji Penanggung<td class="grey-text text-darken-1"><?= $row->gaji2	; ?></td></tr>
							</th><tr><th>Hubungan<td class="grey-text text-darken-1"><?= $row->hub	; ?></td></tr>  
							</th><tr><th>Tempat Lahir<td class="grey-text text-darken-1"><?= $row->tmp	; ?></td></tr>
							</th><tr><th>Tanggal Lahir<td class="grey-text text-darken-1"><?= $row->tgl_lahir	; ?></td></tr> 
							</th><tr><th>Tanggal Daftar<td class="grey-text text-darken-1"><?= $row->created_at; ?></td></tr>
						 
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