
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">ANGGOTA KOPERASI</h4> 	
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
				<a href="<?= base_url('anggota/tambah/'); ?>" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</a> 
            </div> 
			<table class="table table-bordered" id ="myTable">
				<thead>
				<tr>
					<th>No</th>
					<th>No Anggota</th> 
					<th>Nama</th>  
                    <th>Alamat</th>
					<th>Telepon</th> 
                    <th>Username</th> 
					<th class="center">Aksi</th> 
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 1+(10*($page-1));
					foreach ($anggota as $row) {
				?>
					<tr> 
						<td class="grey-text text-darken-1"><?= $no ?></td>
                        <td class="grey-text text-darken-1"><?= $row->no_anggota; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->nama; ?></td>
						<td class="grey-text text-darken-1"><?= $row->alamat; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->telp; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->username; ?></td>  
						<td>
							<a data-toggle="modal" data-target="#detailmodal<?= $row->no_anggota; ?>" class="btn btn-info btn-icon-split btn-sm"> Detail </a>
							<a href="<?= base_url('Anggota/edit/'.$row->no_anggota); ?>" class="btn btn-warning btn-icon-split btn-sm"> Edit </a>
							<a href="<?= base_url('Anggota/delete/'.$row->no_anggota); ?>" class="btn btn-danger btn-icon-split btn-sm"> Delete </a>
						</td>				
					</tr>
					<?php
						$no++;	}
					?>
				</tbody>
			</table> 
			<?= $pager->Links('default', 'custom_pager') ?>
		</div>
	</div>
</div> 
 <!-- modal detail data --> 
<!-- Modal -->
	<?php
		$no = 1;
		foreach ($anggota as $row) {
	?> 
	<div class="modal fade" id="detailmodal<?= $row->no_anggota; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		 
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>				 
				<div class="modal-body">  
                                    <div class="form-group row"> 
                                            <div class="input-group mb-2 mr-sm-2"> 
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Anggota</div>
                                                </div>
                                                <input Readonly type="text" id="notab" class="form-control" name="no_anggota" placeholder="no simpanan" value="<?= $row->no_anggota ?>">           
                                            </div>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Tanggal</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->created_at ?>">                                             	</div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Kolektor</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->opr ?>">                                               </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Status Keanggotaan</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->st ?>">   												</div>
                                        	 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Nama</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->nama ?>">                                               </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Identitas</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->no_identitas ?>">                                               </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Tempat Lahir</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->tempat ?>">                                               </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">TGL Lahir</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->tanggal_lahir ?>">                                               </div>  
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jenis Kelamin</div>
                                                </div> 
                                                <div class="radio-inline"> 
												<input Readonly type="text" class="form-control"  value="<?= $row->jk ?>">                                                   </div> 
                                            </div>  
                                        	<div class="input-group mb-2 mr-sm-2 ">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Status</div>
                                                </div>  
												<input Readonly type="text" class="form-control"  value="<?= $row->status ?>">    
                                            </div>  
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Alamat/Banjar</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->alamat ?>">                                               </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Desa</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->desa ?>">                                               </div>  
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Kecamatan</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->kecamatan ?>">                                               </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Telepon</div>
                                                </div> 
												<input Readonly type="text" class="form-control"  value="<?= $row->telp ?>">                                               </div>   
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Pekerjaan</div>
                                                </div>
                                                <input Readonly type="text" class="form-control"  value="<?= $row->pekerjaan ?>">           
                                            </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Username Terdaftar</div>
                                                </div>
                                                <input Readonly type="text" id="notab" class="form-control" placeholder="no simpanan" value="<?= $row->username ?>">           
                                        	</div>
                                    </div>  
				</div>
			</div>
			
		</div>
	</div>
	<?php
				}
			?>
<!-- akhrir modal update -->
<?= $this->endSection();?>