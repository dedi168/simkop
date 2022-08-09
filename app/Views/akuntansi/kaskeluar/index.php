
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">KAS KELUAR</h4>
					</div>
				</div>
			</div>
			<br>
			<div class="divider"></div>
			<?php if (!empty(session()->getFlashdata('message'))) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 
    <?php endif; ?>
    <div class="col-md-2">
                <button data-toggle="modal" data-target="#tambah" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</button>
            </div> 
            <?php if ($judul!="") {?>
                <div class="col-lg-8"> 
			    <table class="table table-bordered" id ="myTable"> 
                    <tr>
                        <th><center><h2><?= strtoupper($judul); ?></h2></center> </th>
                    </tr>
                    
                </table></div>
                
            <?php } else {?>
                <div class="col-lg-8"> 
			<table class="table table-bordered" id ="myTable">
				<thead class="thead-light ">
				<tr>
					<th>No</th>
					<th>NO Jurnal</th>
					<th>Debet</th> 
					<th>Tanggal</th> 
					<th>Aksi</th> 
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 1+(10*($currentPage-1));
					foreach ($kas as $row) {
				?>
					<tr>
						<td class="grey-text text-darken-1"><?= $no ?></td>
						<td class="grey-text text-darken-1"><?= $row->no_jurnal; ?> 
						</td>
						<td class="grey-text text-darken-1"><?= $row->debet;?></td>  
						<td class="grey-text text-darken-1"><?= substr($row->created_at,0,10) ;?></td>  
						<td>
							<a href="<?= base_url('kaskeluar/delete/'.$row->nomor); ?>" class="btn btn-light  btn-icon-split btn-sm"> <img src="img/delete.png" width="20px" height="20px"alt="Delete">  </a>
						</td>	
					</tr>
					<?php
					$no++;	
                    }
                        
					?>
				</tbody>
			</table><?= $pager->links('default','custom_pager') ?> </div>
            <?php } ?>
		</div>
	</div>
</div> 


<!-- modal tambah data --> 
    <!-- Modal --> 
    <div onload="myFunction()" class="modal fade"  id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?=form_open_multipart('kaskeluar/store')?>
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
                            <div class="col-sm-11 mb-3 mb-sm-0">  
							    <label for="tanggal" class="form-control-user ">Tanggal</label>
                                <input type="text" placeholder="tanggal" id="tanggal" class="form-control form-control-user " value="<?= date('Y-m-d')?>" name="tanggal" >
                            </div> 
                        </div>
                        <div class="form-group row"> 
                            <div class="col-sm-11 mb-3 mb-sm-0"> 
                            <label for="no_jurnal" class="form-control-user ">No Jurnal</label>
                                <?php   
                                    foreach ($kas as $row) { 
                                                $kd = (int) substr($row->no_jurnal, 4, 5); 
                                                $kd++; 
                                                $kode1 = "113";
                                                $no_jurnal = $kode1 . sprintf("%05s", $kd);
                                                }
                                ?>
                                <input readonly type="text" class="form-control" name="no_jurnal" value="<?= $no_jurnal ?>">           
                         
                             </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-11 mb-3 mb-sm-0">  
							    <label for="catatan" class="form-control-user ">Catatan</label>
                                <input type="text" placeholder="catatan" id="catatan" class="form-control form-control-user " value="<?= old('catatan'); ?>" name="catatan" >
                            </div> 
                        </div>
                        <div class="form-group row"> 
                            <div class="col-sm-11 mb-3 mb-sm-0"> 
                                <label for="jumlah" class="form-control-user ">Jumlah</label>
                                <input type="text" id="jumlah" placeholder="Jumlah" class="form-control form-control-user " value="<?= old('jumlah'); ?>" name="jumlah" >
                            </div>
                        </div> 


                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"> 
                            <label for="rekening" class="form-control-user ">Rekening</label>

                                <select class="form-control" id="rekening" name="rekening">
                                    <option value="">---Pilih Akun---</option> 
                                    <?php foreach($rekening as $key):?> 
                                        <option  value="<?php echo  $key->kode_akun ?>"> 
                                        <?= $key->kode_akun; ?>
                                        </option>
                                    <?php endforeach ?>  
                                </select>                            
                        </div>
                            <div class="col-sm-6 mb-3 mb-sm-0"> 
                                <label for="namarek" class="form-control-user ">Nama Rekening</label>
                                <input type="text" readonly id="namarek" placeholder="namarek" class="form-control form-control-user " value="" name="namarek" >
                            </div>
                        </div> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Save changes</button>
                        </div> 
                    </div>
                    
                </div>
            </div> 
        </div>
        <?= form_close(); ?>
    </div>
<!-- akhir modal tambah data -->
 
<!-- modal ubah data --> 
    <!-- Modal -->
    <?php
		$no = 1;
		foreach ($kas as $row) {
	?>
	<div class="modal fade" id="updatemodal<?= $row->nomor; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<?=form_open_multipart('masterjkredit/update/'.$row->nomor)?>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Jenis Kredit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">  
                <div class="form-group">  
                        <div class="form-group row">
                            <div class="col-sm-11 mb-3 mb-sm-0">  
							    <label for="tanggal" class="form-control-user ">Tanggal</label>
                                <input type="text" placeholder="tanggal" id="tanggal" class="form-control form-control-user " value="<?= date('Y-m-d')?>" name="tanggal" >
                            </div> 
                        </div>
                        <div class="form-group row"> 
                            <div class="col-sm-11 mb-3 mb-sm-0"> 
                            <label for="no_jurnal" class="form-control-user ">No Jurnal</label>
                            <input type="text" readonly id="no_jurnal" placeholder="no_jurnal" class="form-control form-control-user " value="<?= $row->no_jurnal; ?>" name="no_jurnal" >

                             </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-11 mb-3 mb-sm-0">  
							    <label for="catatan" class="form-control-user ">Catatan</label>
                                <input type="text" placeholder="catatan" id="catatan" class="form-control form-control-user " value="<?= $row->catatan; ?>" name="catatan" >
                            </div> 
                        </div>
                        <div class="form-group row"> 
                            <div class="col-sm-11 mb-3 mb-sm-0"> 
                                <label for="jumlah" class="form-control-user ">Jumlah</label>
                                <input type="text" id="jumlah" placeholder="Jumlah" class="form-control form-control-user " value="<?= $row->debet; ?>" name="jumlah" >
                            </div>
                        </div> 


                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"> 
                            <label for="rekening" class="form-control-user ">Rekening</label>

                                <select class="form-control" id="rekening1" name="rekening">
                                    <option value="">---Pilih Akun---</option> 
                                    <?php foreach($rekening as $key):?> 
                                        <option <?php if ($row->kode_akun == $key->kode_akun) { echo 'selected'; }?>  value="<?php echo  $key->kode_akun ?>"> 
                                        <?= $key->kode_akun; ?>
                                        </option>
                                    <?php endforeach ?>  
                                </select>                            
                        </div>
                            <div class="col-sm-6 mb-3 mb-sm-0"> 
                                <label for="namarek" class="form-control-user ">Nama Rekening</label>
                                <script>
                                    
                                </script>
                                <input type="text" readonly id="namarek1" placeholder="namarek" class="form-control form-control-user " value="" name="namarek" >
                            </div>
                        </div>  
                    </div>
					
				</div>
                
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" >Save changes</button>
					</div>  
			</div> 
		</div>
        <?= form_close(); ?>
	</div> 
    <?php
		}
	?>
<!-- akhrir modal update -->
  
<script>
function myFunction() { 
}
</script> 

<script src="<?= base_url(); ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery-ui.min.js"></script>
 
   <script type="text/javascript"> 
    
        $('#rekening').on('change',function(){
            let id = $(this).val() 
            $.ajax({
                url: "http://localhost:8080/kaskeluar/getrekening/" + id,
                type: 'get', 
                success: function(data) { 
                    var pinj=JSON.parse(data) 
                        console.log(pinj.nama_akun); 
                        $('#namarek').val(pinj.nama_akun) 
                }
            })
        })  
    </script> 

<?= $this->endSection();?>