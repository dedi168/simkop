
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">master jenis simpanan</h4>
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
            <a data-toggle="modal" data-target="#tambahmodal"class="btn btn-sm btn-warning btn-lg"><i class="fas fa-plus"></i><span>Edit</span> </a> 
			<table class="bordered" id="barang-table">
            <thead class="thead-light ">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Akun</th> 
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                <?php foreach($jsimp as $row) : ?>
                <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $row['kode']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['akun']; ?></td> 
                <td>
                    <a href="<?= base_url('admin/detail/'.$row['id']); ?>" class="btn btn-info">Detail</a>
                </td>
                </tr> 
                <?php endforeach; ?>
            </tbody>
			</table>
		</div>
	</div>
</div> 

<!-- modal tambah data --> 
    <!-- Modal --> 
    <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?=form_open_multipart('masteriuran/save')?>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jenis Simpanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">  
                    <div class="form-group">  
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"> 
                                <input type="text" placeholder="Kode" id="kode" class="form-control form-control-user " value="<?= old('kode'); ?>" name="pokok" >
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0"> 
                                <input type="text" id="nama" placeholder="Nama" class="form-control form-control-user " value="<?= old('nama'); ?>" name="pokok" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group mb-3"> 
                                <select class="form-control" id="akun_id" name="akun_id">
                                <option value="">
                                            <--Pilih Akun -->
                                        </option>
                                    <?php foreach($akun as $key):?>
                                        
                                        <option value="<?php echo $key['id'] ?>">
                                            <?php echo $key['akun'] ?> 
                                        </option>
                                    <?php endforeach ?>
                                </select>
                                </div>                            
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Save changes</button>
                        </div> 
                    </div>
                    <?= form_close(); ?>
                </div>
            </div> 
        </div>
    </div>
<!-- akhir modal tambah data -->
 
<?= $this->endSection();?>
