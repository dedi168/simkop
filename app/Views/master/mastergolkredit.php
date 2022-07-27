
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
    <div class="row show-on-large hide-on-small-only">
        <div class="col s12 ">
            <div class="card">
                <div class="card-content margin" style="margin: 12px;">
                    <div class="row">
                        <div class="col s6 m6 l6">
                            <h4 class="cardbox-text light left margin">Golongan Kredit</h4>
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
                    <button data-toggle="modal" data-target="#tambah" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</button>
                </div> 
                <div class="col-lg-8"> 
                <table class="table table-bordered" id ="myTable">
                    <thead class="thead-light ">
                    <tr> 
                        <th>Id</th>
                        <th>Nama</th> 
                        <th>Bawah</th> 
                        <th>Atas</th> 
                            <th class="center">Aksi</th> 
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach ($golkre as $row) {
                    ?>
                        <tr> 
                            <td class="grey-text text-darken-1"><?= $row->id; ?></td>
                            <td class="grey-text text-darken-1"><?= $row->nama; ?></td>
                            <td class="grey-text text-darken-1"><?= $row->bawah; ?></td>
                            <td class="grey-text text-darken-1"><?= $row->atas; ?></td>
                            <td> 
                                <a data-toggle="modal" data-target="#ubahmodal<?= $row->id; ?>"class="btn btn-warning btn-icon-split btn-sm"><i class="fas fa-plus"></i><span>Edit</span> </a> 
                                
                                <a href="<?= base_url('MasterGolKredit/delete/'.$row->id); ?>" class="btn btn-danger btn-icon-split btn-sm"><i class="fas fa-plus"></i> Delete</a>
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
    </div>  
 

<!-- modal tambah data --> 
    <!-- Modal --> 
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?=form_open_multipart('MasterGolKredit/store')?>
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
							    <label for="kode" class="form-control-user ">Kode</label>
                                <input type="text" placeholder="kode" id="kode" class="form-control form-control-user " value="<?= old('kode'); ?>" name="id" >
                            </div> 
                        </div>
                        <div class="form-group row"> 
                            <div class="col-sm-11 mb-3 mb-sm-0"> 
                            <label for="nama" class="form-control-user ">Nama</label>
                                <input type="text" id="nama" placeholder="Nama" class="form-control form-control-user " value="<?= old('nama'); ?>" name="nama" >
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-6">
                            <label for="bawah" class="form-control-user ">Bawah</label>
                            <input type="text" placeholder="bawah" id="bawah" class="form-control form-control-user " value="<?= old('bawah'); ?>" name="bawah" >
                            </div> 
                            <div class="col-sm-6">
                            <label for="atas" class="form-control-user ">Atas</label>
                            <input type="text" placeholder="atas" id="atas" class="form-control form-control-user " value="<?= old('atas'); ?>" name="atas" >
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

<!-- modal ubah data --> 
    <!-- Modal -->
    <?php
		$no = 1;
		foreach ($golkre as $row) {
	?>
	<div class="modal fade" id="ubahmodal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<?=form_open_multipart('mastergolkredit/update/'.$row->id)?>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Iuran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">  
                    <div class="form-group">  
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">  
							    <label for="kode" class="form-control-user ">Kode</label>
                                <input type="text" placeholder="kode" id="kode" class="form-control form-control-user " value="<?= $row->id; ?>" name="id" >
                            </div> 
                        </div>
                        <div class="form-group row"> 
                            <div class="col-sm-11 mb-3 mb-sm-0"> 
                            <label for="nama" class="form-control-user ">Nama</label>
                                <input type="text" id="nama" placeholder="Nama" class="form-control form-control-user " value="<?= $row->nama; ?>" name="nama" >
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-6">
                            <label for="bawah" class="form-control-user ">Bawah</label>
                            <input type="text" placeholder="bawah" id="bawah" class="form-control form-control-user " value="<?= $row->bawah; ?>" name="bawah" >
                            </div> 
                            <div class="col-sm-6">
                            <label for="atas" class="form-control-user ">Atas</label>
                            <input type="text" placeholder="atas" id="atas" class="form-control form-control-user " value="<?= $row->atas; ?>" name="atas" >
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
    <?php
		}
	?>
<!-- akhrir modal update -->

<?= $this->endSection();?>